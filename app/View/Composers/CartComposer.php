<?php

namespace App\View\Composers;

use App\Contracts\CartContract;
use Illuminate\View\View;

class CartComposer
{
    public function __construct(protected CartContract $cart)
    {
    }

    public function compose(View $view): void
    {
        $view->with('totalQuantity', $this->cart->getTotalQuantity());
    }
}
