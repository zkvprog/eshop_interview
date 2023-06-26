<?php

namespace App\Services;

use App\Contracts\CartContract;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class CartUser implements CartContract
{
    protected ?Cart $cart;

    public function __construct()
    {
        $this->cart = Cart::with('products')->where('user_id', auth()->user()->id)->latest()->first();
    }

    public function getItems(): array
    {
        foreach ($this->cart->products as $product) {
            $cartItems[$product->id] = [
                'name' => $product->name,
                'price' =>  $product->price,
                'quantity' => $product->pivot->quantity
            ];
        }

        return $cartItems;
    }

    public function add(Product $product)
    {
        if (is_null($this->cart)) {
            $this->cart = Cart::create(['user_id' => auth()->user()->id]);
        }

        if ($this->cart->products->contains($product->id)) {
            $productInCart = $this->cart->products->sole('id', $product->id);
            $this->cart->products()->updateExistingPivot($product->id, ['quantity' => $productInCart->pivot->quantity + 1]);
        } else {
            $this->cart->products()->attach($product->id, ['quantity' => 1]);
        }

        $this->cart->load('products');
    }

    public function getTotalQuantity(): int
    {
        return $this->cart?->products->sum('pivot.quantity') ?? 0;
    }

    public function getTotalPrice(): float
    {
        return $this->cart?->products->sum(function (Product $product) {
                return $product->pivot->quantity * $product->price;
            }) ?? 0;
    }

    public function destroy()
    {
        $this->cart->delete();
    }
}
