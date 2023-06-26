<?php

namespace App\Services;

use App\Contracts\CartContract;
use App\Models\Product;

class CartSession implements CartContract
{
    protected array $items;

    public function __construct()
    {
        $this->items = session('cart') ?? [];
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function add(Product $product)
    {
        if (array_key_exists($product->id, $this->items)) {
            $this->items[$product->id]['quantity'] += 1;
        } else {
            $this->items[$product->id] = [
                'name' => $product->name,
                'price' =>  $product->price,
                'quantity' => 1
            ];
        }

        session(['cart' => $this->items]);
    }

    public function getTotalQuantity(): int
    {
        return array_reduce($this->items, function($carry, $item) {
            return $carry + $item['quantity'];
        }, 0);
    }

    public function getTotalPrice(): float
    {
        return array_reduce($this->items, function($carry, $item) {
            return $carry + round($item['quantity'] * $item['price'], 2);
        }, 0);
    }

    public function destroy()
    {
        session()->forget('cart');
    }
}
