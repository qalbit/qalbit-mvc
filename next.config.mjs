/** @type {import('next').NextConfig} */
const nextConfig = {
  trailingSlash: true,
  reactStrictMode: true,
  images: {
    remotePatterns: [
      { protocol: "https", hostname: "qalbit.com" },
      { protocol: "https", hostname: "staging.qalbit.com" },
      { protocol: "https", hostname: "secure.gravatar.com" },
    ],
  },
  async redirects() {
    return [
      {
        source: "/contact/thank-you/",
        destination: "/contact-us/thank-you/",
        permanent: true,
      },
      {
        source: "/apply",
        destination: "/career/apply/",
        permanent: true,
      },
      {
        source: "/contact",
        destination: "/contact-us/",
        permanent: true,
      },
    ];
  },
};

export default nextConfig;
