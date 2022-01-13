@extends('templates/master')

@section('content')
<section class="menu">
    <section class="container">

        <div class="row">
            <div class="col-md-12">
                <h2 class="righteous"><span><img src="img/line.png" alt=""></span> Daftar Restoran</h2>
            </div>
        </div>
        <div class="row">
            @foreach ($restaurants as $restaurant)
            <div class="col-md-3">
                <a href="#">
                    <div class="card">
                        <img src="img/menu.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text p-300">0.5 km</p>
                            <h5 class="card-title p-700">{{ $restaurant->name }}</h5>
                            <p class="card-text"><span><img class="star" src="img/ic-star.png" alt=""></span> {{
                                $restaurant->rating }}</p>
                        </div>
                        <a href=" {{ route('restaurant.edit', $restaurant->slug) }}" class="btn btn-kenyang">Edit</a>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
    @endsection