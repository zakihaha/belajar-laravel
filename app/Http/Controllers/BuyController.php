<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use App\Models\Cart;
use App\Models\Menu;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function index()
    {
        $carts = auth()->user()->carts;
        $total = auth()->user()->carts->sum('subprice');

        return view('cart.index', [
            'carts' => $carts,
            'total' => $total
        ]);
    }
    
    public function addToCart(Menu $menu)
    {
        // return $menu->price;
       $subprice = request()->quantity * $menu->price;

        // $userCart = auth()->user()->carts->where('menu_id', $menu->id);

        // // kalau menu sudah ada
        // if (count($userCart) == 1) {
        //     $userCart->update([
        //         'quantity' => $userCart[1]->quantity += request()->quantity,
        //     ]);
            
        // } else {
            auth()->user()->carts()->create([
                'menu_id' => $menu->id,
                'quantity' => request()->quantity,
                'subprice' => $subprice
            ]);
        // }

        return redirect()->route('cart.index');
    }

    public function update(Cart $cart)
    {
        // request()->validate([
        //     'note' => ['required', 'min:2']
        // ]);

        $cart->update([
            'note' => request()->note
        ]);

        return redirect()->back();
    }
    
    public function checkout()
    {
        $carts = auth()->user()->carts;
        $total = auth()->user()->carts->sum('subprice');
        
        return view('cart.checkout', [
            'carts' => $carts,
            'total' => $total
        ]);
    }

    public function createInvoice()
    {
        $carts = auth()->user()->carts;

        $invoice = auth()->user()->invoices()->create([
            'address' => request()->address,
            'total' => request()->total
        ]);

        foreach ($carts as $cart) {
            auth()->user()->boughts()->create([
                'invoice_id' => $invoice->id,
                'menu_id' => $cart->menu_id,
                'note' => $cart->note,
                'quantity' => $cart->quantity,
                'subprice' => $cart->subprice
            ]);
        }

        auth()->user()->carts()->delete();
                                // $invoice->id
        $boughts = Bought::where('invoice_id', 24)->get();
        
        return view('invoice', [
            'boughts' => $boughts,
            'invoice' => $invoice
        ]);
    }
}
