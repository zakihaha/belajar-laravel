@extends('templates/master')
@section('content')
<div class="container py-5">
    <form action=" {{ route('restaurant.update', $restaurant->slug) }} " method="post">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $restaurant->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description" >{{ $restaurant->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="rating" class="form-label">Rating</label>
            <input class="form-control" name="rating" id="rating"  value="{{ $restaurant->rating }}">
        </div>
        <div class="mb-3">
            <label for="picture" class="form-label">Picture</label>
            <input class="form-control" name="picture" id="picture" value="{{ $restaurant->picture }}">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control" name="category" id="category">
                <option {{ $restaurant->category == "promo" ? 'selected' : '' }} value="promo">Banyak Promo</option>
                <option {{ $restaurant->category == "populer" ? 'selected' : '' }} value="populer">Toko Ter-Populer</option>
                <option {{ $restaurant->category == "rekomendasi" ? 'selected' : '' }} value="rekomendasi">Rekomendasi</option>
            </select>
        </div>
        <button class="btn btn-kenyang" type="submit">Submit</button>
    </form>
</div>
@endsection