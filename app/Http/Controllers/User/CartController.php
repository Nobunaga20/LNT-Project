<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('user.cart', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $request->quantity;
        } else {
            $item = Item::findOrFail($id);
            $cart[$id] = [
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $request->quantity,
                'image' => $item->image
            ];
        }

        session()->put('cart', $cart); 

        return redirect()->back()->with('success', 'Item added to cart!');
    }

    public function removeFromCart($id)
    {
        $cart = session('cart', []);
        unset($cart[$id]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Item removed from cart!');
    }
}
