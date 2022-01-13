@extends('templates/master')
@section('content')
<div class="container">
    @foreach ($carts as $cart)
        <h2>{{$cart->menu->name}}</h2>
        <p>Quantity: {{$cart->quantity}}</p>
        <p>Price: {{$cart->menu->price}}</p>
        <p>Sub total {{$cart->quantity * $cart->menu->price}}</p>
        <p>Note: {{$cart->note ?? 'Tidak ada catatan'}}</p>

    @endforeach
    <h1 class="mt-5">Total: {{$total}}</h1>

    <a class="btn btn-kenyang" href="{{ route('cart.checkout') }}">Checkout</a>
</div>
@endsection