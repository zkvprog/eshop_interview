@extends('layouts.master')

@section('content')
    @if (empty($cartItems))
        <p>Cart empty</p>
    @else
        <div class="flex-1">
            <table class="w-full text-sm lg:text-base">
                <thead>
                <tr class="h-12 uppercase">
                    <th class="text-left">Name</th>
                    <th class="pl-5 text-right">Quantity</th>
                    <th class="text-right md:table-cell"> price</th>
                </tr>
                </thead>
                <tbody>
                @foreach  ($cartItems as $cartItem)
                    <tr>
                        <td class="py-2">
                            <span>
                                {{ $cartItem['name']}}
                            </span>
                        </td>
                        <td class="py-2 text-right justify-center">
                            <span class="">{{ $cartItem['quantity'] }}</span>
                        </td>
                        <td class="py-2 text-right">
                            <span class="text-sm font-medium">${{ $cartItem['price'] }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="flex flex-row-reverse">
                <span class="whitespace-nowrap text-lg font-semibold text-black">Total: ${{ $totalPrice }}</span>
            </div>
            <div class="mt-10">
                <form action="/order" method="POST">
                    @csrf
                    <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="submit">Create order</button>
                </form>
            </div>

        </div>
    @endif

@endsection
