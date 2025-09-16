<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Search Driver
    |--------------------------------------------------------------------------
    |
    | This option controls the default search driver that will be used to
    | index and search your models. You may set this to any of the
    | connections defined in the "connections" array below.
    |
    */

    'driver' => env('SCOUT_DRIVER', 'elastic'),

    /*
    |--------------------------------------------------------------------------
    | Index Prefix
    |--------------------------------------------------------------------------
    |
    | Here you may specify a prefix that will be applied to all search index
    | names used by Scout. This prefix may be useful if you have multiple
    | "tenants" or applications sharing the same Elasticsearch cluster.
    |
    */

    'prefix' => env('SCOUT_PREFIX', ''),

    /*
    |--------------------------------------------------------------------------
    | Queue Data Syncing
    |--------------------------------------------------------------------------
    |
    | This option allows you to control if the operations that sync data with
    | your search engines are queued or not. When this is set to "true"
    | then all automatic data syncing will get queued for better performance.
    |
    */

    'queue' => false,

    /*
    |--------------------------------------------------------------------------
    | Elasticsearch Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the settings for your Elasticsearch driver,
    | including the hosts and any other options supported by the client.
    |
    */

    'elasticsearch' => [
        'index' => env('ELASTICSEARCH_INDEX', 'financial_transactions'),
        'hosts' => [
            env('ELASTICSEARCH_HOST', 'http://localhost:9200'),
        ],
    ],

];
