@extends('templates/master')
@section('content')
<div class="container">
    <h1 class="py-4">Checkout</h1>
    <form action="{{ route('create.invoice')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">address</label>
            <textarea class="form-control" name="address" id="address" rows="3" placeholder="masukkan alamat"></textarea>
        </div>

        @foreach ($carts as $cart)
            <h2>{{$cart->menu->name}}</h2>
            <p>Quantity: {{$cart->quantity}}</p>
            <p>Price: {{$cart->menu->price}}</p>
            <p>Sub total {{$cart->quantity * $cart->menu->price}}</p>
            <p>Catatan: {{$cart->note}}</p>
        @endforeach

        <h1 class="mt-5">Total: {{$total}}</h1>
        <input type="hidden" name="total" value="{{$total}}">

        <button class="btn btn-kenyang" type="submit">Pesan sekarang</button>
    </form>
</div>
@endsection