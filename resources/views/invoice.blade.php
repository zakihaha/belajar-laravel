@extends('templates/master')
@section('content')
<div class="container py-5">
    @foreach ($boughts as $bought)
        <p>{{ $bought->menu->name }}</p>
    @endforeach
</div>
@endsection