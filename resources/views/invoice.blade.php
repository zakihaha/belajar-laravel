@extends('templates/master')
@section('content')
<div class="container py-5">
    @foreach ($boughts as $bought)
        <div class="mb-5">
            <p>Toko {{ $bought->menu->restaurant->name }}</p>
            <p>Menu {{ $bought->menu->name }}</p>
            <p>Quantity {{ $bought->quantity }}</p>
        </div>
    @endforeach

    <p>{{$invoice->total}}</p>
</div>
@endsection