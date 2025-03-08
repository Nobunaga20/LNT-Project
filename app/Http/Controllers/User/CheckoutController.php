<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Invoice;
use App\Models\Item;
use App\Models\InvoiceItem;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $cart = session('cart', []);
        return view('user.checkout', compact('cart'));
    }

    public function processCheckout(Request $request)
    {
        \Log::info('Checkout process started', ['session_cart' => session('cart')]);

        if (empty(session('cart'))) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $request->validate([
            'shipping_address' => 'required|min:10|max:100',
            'postal_code' => 'required|string|size:5',
        ]);

        $invoice = Invoice::create([
            'user_id' => Auth::id(),
            'invoice_number' => 'INV-' . time(),
            'total_price' => 0,
            'shipping_address' => $request->shipping_address,
            'postal_code' => $request->postal_code,
        ]);

        $total = 0;
        foreach (session('cart', []) as $cartItem) {
            $item = Item::find($cartItem['id']);

            if ($item->quantity < $cartItem['quantity']) {
                return redirect()->back()->with('error', 'Some items are out of quantity.');
            }

            $subtotal = $item->price * $cartItem['quantity'];
            $total += $subtotal;

            $item->quantity -= $cartItem['quantity'];
            $item->save(); // ✅ 

            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'item_id' => $cartItem['id'],
                'quantity' => $cartItem['quantity'],
                'subtotal' => $subtotal,
            ]);
        }

        $invoice->update(['total_price' => $total]);

        session()->forget('cart');

        return redirect()->route('user.invoices.show', $invoice->id)->with('success', 'Checkout successful!');
    }


        
}
