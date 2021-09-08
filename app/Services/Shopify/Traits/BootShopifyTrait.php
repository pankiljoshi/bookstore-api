<?php

namespace App\Services\Shopify\Traits;

use App\Helpers\Settings;
use PHPShopify\ShopifySDK;

trait BootShopifyTrait
{
    public static function configure()
    {
        return ShopifySDK::config(config('shopify.config'));
    }

    public function shopifyInstance()
    {
        $access_token = Settings::get('access_token');
        if (!$access_token) {
            throw new \Exception(__('errors.generate_access_token', ['link' => route('shopify.authorize')]));
        }
        return (new ShopifySDK(['ShopUrl' => config('shopify.config.ShopUrl'), 'AccessToken' => $access_token]));
    }
}
