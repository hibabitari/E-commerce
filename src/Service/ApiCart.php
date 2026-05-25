<?php

namespace App\Service;

use App\Entity\Product;

class ApiCart implements CartInterface
{
    public function add(Product $product): void
    {
        dd('API CART ADD');
    }

    public function remove(int $productId): void
    {
        dd('API CART REMOVE');
    }

    public function getCart(): array
    {
        dd('API CART GET');

        return [];
    }

    public function clearCart(): void
    {
        dd('API CART CLEAR');
    }
}
