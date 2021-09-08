<?php

namespace App\Services\Shopify;

use App\Services\Shopify\Traits\BootShopifyTrait;

class Product
{
    use BootShopifyTrait;

    public function list(array $params): array
    {
        return $this->shopifyInstance()->Product->get($params);
    }

    public function count(): int
    {
        return $this->shopifyInstance()->Product->count();
    }

    public function retrive(int $id): array
    {
        try {
            return $this->shopifyInstance()->Product($id)->get();
        } catch (\Throwable $th) {
            throw new \Exception(__('errors.invalid_book_id'));
        }
    }
}
