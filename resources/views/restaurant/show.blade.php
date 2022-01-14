@extends('templates/master')
@section('content')
<div class="container py-5">
    <h1>{{ $restaurant->name }}</h1>
    <p>{{ $restaurant->description }}</p>
    <p>{{ $restaurant->rating }}</p>

    <div class="mt-4">
        <a href="{{route('menu.create', $restaurant->slug)}}">Tambah menu</a>
    </div>

    <div class="row">
        @foreach ($menus as $menu)
        <div class="col-md-3">
            <div class="card">
                <img src="{{asset('img/menu.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title p-700">{{ $menu->name }}</h5>
                    <p class="card-text p-300">{{ $menu->description }}</p>
                    <p class="card-text p-300">{{ $menu->sold }}</p>

                    @if (Auth::user())
                    <form action="{{ route('addToCart', $menu->id) }}" method="post">
                        @csrf
                        <input type="number" name="quantity" id="quantity">
                        
                        <button class="btn btn-kenyang">Add to cart</button>
                    </form>
                    @endif

                    <a class="btn btn-kenyang" href="{{route('menu.edit', $menu->id)}}">Edit</a>
                    <form action="{{route('menu.destroy', $menu->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-kenyang" type="submit">Delete</button>
                    </form>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection