<?php
namespace App\Http\Controllers\User; 

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::id())->get(); 
        return view('user.invoice', compact('invoices'));
    }

    public function show(Invoice $invoice)
    {
        if ($invoice->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        return view('user.invoiceitem', compact('invoice'));
    }
}
