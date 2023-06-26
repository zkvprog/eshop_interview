@extends('layouts.master')

@section('content')
<div x-data="cart()">
    <h1 class="mb-4 text-3xl font-bold leading-none tracking-tight text-gray-900 dark:text-white">Catalog</h1>

    <div x-cloak x-show="errors" class="error-panel">
        <span x-text="errors"></span>
        <button @click="errors = false">close</button>
    </div>

    <div class="product-catalog" >
        @foreach ($products as $product)
            <div class="product-wrap">
                <div class="product-item">
                    <img src="./img.png">
                    <div class="product-buttons">
                        <button class="button" @click="add({{ $product->id }})">Add cart</button>
                    </div>
                </div>
                <div class="product-bottom">
                    <div class="product-title">{{ $product->name }}</div>
                    <span class="product-price">{{ $product->price }}</span>
                </div>
            </div>
        @endforeach
    </div>
    {{ $products->links() }}
</div>

@endsection
