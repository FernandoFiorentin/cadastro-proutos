<?php

use App\Config\ENV;

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => ENV::get('DB_CONNECTION'),
            'host' => ENV::get('DB_HOST'),
            'name' => ENV::get('DB_DATABASE'),
            'user' => ENV::get('DB_USER'),
            'pass' => ENV::get('DB_PASSWORD'),
            'port' => ENV::get('DB_PORT'),
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => ENV::get('DB_CONNECTION'),
            'host' => ENV::get('DB_HOST'),
            'name' => ENV::get('DB_DATABASE'),
            'user' => ENV::get('DB_USER'),
            'pass' => ENV::get('DB_PASSWORD'),
            'port' => ENV::get('DB_PORT'),
            'charset' => 'utf8',
        ],
        'testing' => [
            'adapter' => ENV::get('DB_CONNECTION'),
            'host' => ENV::get('DB_HOST'),
            'name' => ENV::get('DB_DATABASE') . '_TEST',
            'user' => ENV::get('DB_USER'),
            'pass' => ENV::get('DB_PASSWORD'),
            'port' => ENV::get('DB_PORT'),
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
