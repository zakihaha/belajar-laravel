@extends('templates/master')
@section('content')
<div class="container py-5">
    <form action=" {{ route('menu.update', $menu->id) }} " method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Input your restaurant name" value="{{$menu->name}}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="description"
                placeholder="Input your restaurant description">{{$menu->description}}</textarea>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">price</label>
            <input class="form-control" name="price" id="price" placeholder="Input your restaurant price" value="{{$menu->price}}">
        </div>
        <button class="btn btn-kenyang" type="submit">Submit</button>
    </form>
</div>
@endsection