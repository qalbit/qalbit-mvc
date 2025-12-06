<?php

return [
    // Top header navigation
    'main' => [
        [
            'label' => 'Services',
            'url'   => '/services/',
            'child' => [
                [
                    'label' => 'AI Solutions',
                    'url'   => '/services/ai-solutions/',
                    'child' => [],
                ],
                [
                    'label' => 'Software Development',
                    'url'   => '/services/custom-software-development/',
                    'child' => [],
                ],
                [
                    'label' => 'Web Development',
                    'url'   => '/services/custom-web-development/',
                    'child' => [],
                ],
                [
                    'label' => 'Cloud-Based Solutions',
                    'url'   => '/services/cloud-based-solutions/',
                    'child' => [],
                ],
                [
                    'label' => 'SaaS Product Development',
                    'url'   => '/services/saas/',
                    'child' => [],
                ],
                [
                    'label' => 'Mobile App Development',
                    'url'   => '/services/mobile-development/',
                    'child' => [],
                ],
                [
                    'label' => 'E-Commerce Solutions',
                    'url'   => '/services/e-commerce/',
                    'child' => [],
                ],
                [
                    'label' => 'Mobile App Backend',
                    'url'   => '/services/mobile-app-backend/',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Technologies',
            'url'   => '/technologies/',
            'child' => [
                [
                    'label' => 'React.js Development',
                    'url'   => '/technologies/reactjs/',
                    'child' => [],
                ],
                [
                    'label' => 'Node.js Development',
                    'url'   => '/technologies/nodejs/',
                    'child' => [],
                ],
                [
                    'label' => 'Laravel Development',
                    'url'   => '/technologies/laravel/',
                    'child' => [],
                ],
                [
                    'label' => 'Nest.js Development',
                    'url'   => '/technologies/nestjs/',
                    'child' => [],
                ],
                [
                    'label' => 'Flutter Development',
                    'url'   => '/technologies/flutter/',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Industries',
            'url'   => '/industries/',
            'child' => [
                [
                    'label' => 'E-Commerce',
                    'url'   => '/industries/e-commerce/',
                    'child' => [],
                ],
                [
                    'label' => 'Fintech',
                    'url'   => '/industries/fintech/',
                    'child' => [],
                ],
                [
                    'label' => 'Healthcare',
                    'url'   => '/industries/healthcare/',
                    'child' => [],
                ],
                [
                    'label' => 'Travel',
                    'url'   => '/industries/travel/',
                    'child' => [],
                ],
                [
                    'label' => 'Business',
                    'url'   => '/industries/business/',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Portfolio',
            'url'   => '/portfolio/',
        ],
        [
            'label' => 'Our Process',
            'url'   => '',
            'child' => [
                [
                    'label' => 'Start-up MVP',
                    'url'   => '/start-up-mvp/',
                    'child' => [],
                ],
                [
                    'label' => 'Product Scaling Team',
                    'url'   => '/product-scaling/',
                    'child' => [],
                ],
                [
                    'label' => 'Digital Transformation',
                    'url'   => '/digital-transformation/',
                    'child' => [],
                ],
                [
                    'label' => 'Engagement Model',
                    'url'   => '/engagement-model/',
                    'child' => [],
                ],
            ]
        ],
        [
            'label' => 'Blog',
            'url'   => '/blog/',
        ],
    ],

    // Footer navigation (grouped in columns)
    'footer' => [
        'company' => [
            'label' => 'Company',
            'links' => [
                ['label' => 'About Us',        'url' => '/about-us/'],
                ['label' => 'Our Team',        'url' => '/our-team/'],
                ['label' => 'Career',          'url' => '/career/'],
                ['label' => 'Contact Us',      'url' => '/contact-us/'],
            ],
        ],

        'services' => [
            'label' => 'Services',
            'links' => [
                ['label' => 'Custom Software Development', 'url' => '/services/custom-software-development/'],
                ['label' => 'Web Development',             'url' => '/services/custom-web-development/'],
                ['label' => 'Mobile App Development',      'url' => '/services/mobile-development/'],
                ['label' => 'E-commerce Solutions',        'url' => '/services/e-commerce/'],
                ['label' => 'SaaS Development',            'url' => '/services/saas/'],
                ['label' => 'API Development',             'url' => '/services/api-development/'],
            ],
        ],

        'industries' => [
            'label' => 'Industries',
            'links' => [
                ['label' => 'E-Commerce',      'url' => '/industries/e-commerce/'],
                ['label' => 'Fintech',         'url' => '/industries/fintech/'],
                ['label' => 'Healthcare',      'url' => '/industries/healthcare/'],
                ['label' => 'Education',       'url' => '/industries/education/'],
                ['label' => 'Travel',          'url' => '/industries/travel/'],
                ['label' => 'Business',        'url' => '/industries/business/'],
            ],
        ],

        'hire' => [
            'label' => 'Hire Developers',
            'links' => [
                ['label' => 'Hire Node.js Developers',    'url' => '/hire-nodejs-developers/'],
                ['label' => 'Hire Laravel Developers',    'url' => '/hire-laravel-developers/'],
            ],
        ],
    ]
];