<?php

return [
    'config' => [
        'ShopUrl' => env('SHOPIFY_SHOP_URL'),
        'ApiKey' => env('SHOPIFY_APP_API_KEY'),
        'SharedSecret' => env('SHOPIFY_APP_SHARED_SECRET'),
    ],
    'scopes' => env('SHOPIFY_ALLOWED_SCOPES'),
    'redirect_url' => env('SHOPIFY_REDIRECT_URL')
];