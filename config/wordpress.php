<?php

// config/wordpress.php

return [

    // Public blog base on the same domain
    // On production: https://qalbit.com/blog
    // On local MAMP: http://qalbit.test/blog
    'base_url' => 'https://qalbit.com/blog',

    // REST API base
    'api_base' => 'https://qalbit.com/blog/wp-json/wp/v2',

    // Request timeout in seconds (best-effort)
    'timeout'  => 3,
];
