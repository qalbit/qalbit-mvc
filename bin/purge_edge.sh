#!/usr/bin/env bash
#
# Purge the Cloudflare edge cache.
#
# Since the "Cache HTML for anonymous visitors" cache rule went in, HTML is
# held at the edge for as long as the origin's max-age says (currently 1 hour
# via ExpiresDefault in public/.htaccess). Clearing storage/cache/pages and
# re-warming only refreshes the origin copy — without this step a deploy can
# take up to an hour to become visible to anyone served from a warm PoP.
#
# So the deploy sequence is now:
#   git pull --ff-only origin staging
#   rm -rf storage/cache/pages/*
#   php bin/warm_cache.php
#   bin/purge_edge.sh          <-- run from a machine holding the API token
#
# Reads the token from CF_API_TOKEN, or from the file named by
# CF_API_TOKEN_FILE, defaulting to ~/.cf-qalbit-token. The token needs
# Zone → Cache Purge → Purge on the qalbit.com zone.
#
# Usage:
#   bin/purge_edge.sh                     # purge everything
#   bin/purge_edge.sh /about-us/ /services/   # purge specific paths
set -euo pipefail

ZONE_NAME="${CF_ZONE_NAME:-qalbit.com}"
SITE_ORIGIN="${CF_SITE_ORIGIN:-https://qalbit.com}"
TOKEN_FILE="${CF_API_TOKEN_FILE:-$HOME/.cf-qalbit-token}"

TOKEN="${CF_API_TOKEN:-}"
if [ -z "$TOKEN" ]; then
    if [ ! -r "$TOKEN_FILE" ]; then
        echo "No API token. Set CF_API_TOKEN, or put one in $TOKEN_FILE" >&2
        exit 1
    fi
    TOKEN="$(cat "$TOKEN_FILE")"
fi

api() {
    curl -sS --max-time 30 -H "Authorization: Bearer $TOKEN" -H "Content-Type: application/json" "$@"
}

ZONE_ID="$(api "https://api.cloudflare.com/client/v4/zones?name=$ZONE_NAME" \
    | python3 -c 'import sys,json; d=json.load(sys.stdin); print(d["result"][0]["id"] if d.get("result") else "")')"

if [ -z "$ZONE_ID" ]; then
    echo "Could not resolve zone '$ZONE_NAME' — check the token's zone scope." >&2
    exit 1
fi

if [ "$#" -eq 0 ]; then
    BODY='{"purge_everything":true}'
    WHAT="everything"
else
    BODY="$(SITE_ORIGIN="$SITE_ORIGIN" python3 -c '
import json, os, sys
origin = os.environ["SITE_ORIGIN"].rstrip("/")
urls = [p if p.startswith("http") else origin + "/" + p.lstrip("/") for p in sys.argv[1:]]
print(json.dumps({"files": urls}))' "$@")"
    WHAT="$# path(s)"
fi

api -X POST "https://api.cloudflare.com/client/v4/zones/$ZONE_ID/purge_cache" --data "$BODY" \
    | python3 -c '
import sys, json
d = json.load(sys.stdin)
if d.get("success"):
    print("Edge cache purged.")
else:
    print("Purge failed:", json.dumps(d.get("errors"))[:300], file=sys.stderr)
    sys.exit(1)'

echo "Purged: $WHAT ($ZONE_NAME)"
