<?php

namespace App\Http\Controllers;

use App\Models\Bought;
use App\Models\Menu;
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
    
    public function addToCart()
    {
        $menu = Menu::where('id', request()->menu_id)->first()->price;
        $subprice = request()->quantity * $menu;

        auth()->user()->carts()->create([
            'menu_id' => request()->menu_id,
            'note' => request()->note,
            'quantity' => request()->quantity,
            'subprice' => $subprice
        ]);

        return redirect()->route('cart.index');
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
            'total' => auth()->user()->carts->sum('subprice')
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
        $boughts = Bought::where('invoice_id', $invoice->id)->get();
        
        return view('invoice', [
            'boughts' => $boughts
        ]);
    }
}
