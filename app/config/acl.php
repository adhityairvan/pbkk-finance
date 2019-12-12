<?php

$role = [
    'Guests',
    'LoggedIn',
];
$resources = [
    'auth' => [
        'showLogin',
        'login',
        'showRegister',
        'register',
        'logout',
    ],
    'kategori_mutasi' => [
        'index'
    ],
    'mutasi' => [
        'showPengeluaran',
        'showPemasukan',
        'createPengeluaran',
        'storePengeluaran',
        'pengeluaranApi',
        'createPemasukan',
        'storePemasukan',
        'pemasukanApi'
    ],
    'home' => [
        'index',
    ],
    'index' => [
        'index',
    ]
];
$allowed = [
    'Guests' => [
        'auth' => [
            'showLogin',
            'login',
            'showRegister',
            'register',
        ]
    ],
    'LoggedIn' => [
        'home' => [
            'index',
        ],
        'mutasi' => [
            '*',
        ],
        'kategori_mutasi' =>[
            '*'
        ],
        'index' => [
            '*'
        ]
    ]
];

$roles = [
    'Guests' => [
        'auth' => [
            'showLogin',
            'login',
            'showRegister',
            'register',
        ],
    ],
    'LoggedIn' => [
        'auth' => [
            'logout'
        ],
        'mutasi' => [
            '*'
        ],
        'kategori_mutasi' => [
            '*'
        ],
        'index' => [
            '*'
        ]
    ]
];