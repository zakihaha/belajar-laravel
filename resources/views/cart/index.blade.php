@extends('templates/master')
@section('content')
<div class="container">
    <h1 class="py-4">Cart</h1>
    @foreach ($carts as $cart)
        <div class="mb-4">
            <form action="{{ route('cart.update', $cart->id) }}" method="post">
                @csrf
                @method('put')
                <h2>{{$cart->menu->name}}</h2>
                <p>Quantity: {{$cart->quantity}}</p>
                <p>Price: {{$cart->menu->price}}</p>
                {{-- <p>Sub total {{$cart->quantity * $cart->menu->price}}</p> --}}

                <div class="row">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="note" id="note" value="{{$cart->note}}" placeholder="Input your note">
                        @error('note')
                            <div class="small text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-kenyang">Add note</button>
                    </div>
                </div>
            </form>
        </div>
    @endforeach
    <h1 class="mt-5">Total: {{$total}}</h1>

    <a class="btn btn-kenyang" href="{{ route('cart.checkout') }}">Checkout</a>
</div>
@endsection