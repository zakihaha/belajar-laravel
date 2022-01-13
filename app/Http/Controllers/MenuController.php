<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(Restaurant $restaurant)
    {
        return view('menu.create',[
            'restaurant' => $restaurant
        ]);
    }

    public function store(Restaurant $restaurant)
    {
        $restaurant->menus()->create([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
        ]);

        return redirect()->route('index');
    }

    public function edit(Menu $menu)
    {
        return view('menu.edit', [
            'menu' => $menu
        ]);
    }

    public function update(Menu $menu)
    {
        $menu->update([
            'name' => request()->name,
            'description' => request()->description,
            'price' => request()->price,
        ]);

        return redirect()->route('index');
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->back();
    }
}
