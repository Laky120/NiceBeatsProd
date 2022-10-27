<?php
return [
    '' => [
        'controller' => 'main',
        'action' => 'index',
    ],

    'register' => [
        'POST' => [
            'controller' => 'account',
            'action' => 'register',
        ]
    ],
    'login' => [
        'POST' => [
            'controller' => 'account',
            'action' => 'login',
        ]
    ],

    'products' => [
        '' => [
            'POST' => [
                'controller' => 'products',
                'action' => 'create',
            ],
            'GET' => [
                'controller' => 'products',
                'action' => 'getAll',
            ],
        ],
        '{id}' => [
            'GET' => [
                'controller' => 'products',
                'action' => 'getById',
            ],
            'PUT' => [
                'controller' => 'products',
                'action' => 'update',
            ],
            'DELETE' => [
                'controller' => 'products',
                'action' => 'delete',
            ],
        ],
    ],

];
