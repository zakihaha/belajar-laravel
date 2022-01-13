<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $data = Restaurant::all();
        return view('index', [
            'restaurants' => $data
        ]);
    }

    public function show(Restaurant $restaurant)
    {
        $menus = $restaurant->menus;

        return view('restaurant.show', [
            'restaurant' => $restaurant,
            'menus' => $menus
        ]);
    }

    public function create()
    {
        return view('restaurant.create');
    }

    public function store()
    {
        // dd(request()->file('picture'));

        // return request()->all();
        $slug = \Str::slug(request()->name);

        // memasukkan ke database
        Restaurant::create([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'rating' => request()->rating,
            'picture' => request()->picture,
            'category' => request()->category,
        ]);

        return redirect()->route('index');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', [
            'restaurant' => $restaurant
        ]);
    }

    public function update(Restaurant $restaurant)
    {
        $slug = \Str::slug(request()->name);

        $restaurant->update([
            'name' => request()->name,
            'slug' => $slug,
            'description' => request()->description,
            'rating' => request()->rating,
            'picture' => request()->picture,
            'category' => request()->category,
        ]);

        return redirect()->route('index');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        return redirect()->route('index');

    }
}
