<?php

namespace App\Services\Shopify;

use PHPShopify\AuthHelper;
use App\Services\Shopify\Traits\BootShopifyTrait;

class Auth
{
    use BootShopifyTrait;

    public function __construct()
    {
        self::configure();
    }

    public function getAuthorizationUrl(): string
    {
        return AuthHelper::createAuthRequest(config('shopify.scopes'), config('shopify.redirect_url'), null, null, true);
    }

    public function getAccessToken(): string
    {
        return AuthHelper::getAccessToken();
    }
}
