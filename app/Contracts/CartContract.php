<?php

namespace App\Contracts;

use App\Models\Product;

interface CartContract
{
    public function getItems(): array;

    public function add(Product $product);

    public function getTotalQuantity(): int;

    public function getTotalPrice(): float;

    public function destroy();
}
