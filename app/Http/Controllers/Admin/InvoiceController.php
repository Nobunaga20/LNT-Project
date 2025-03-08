<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\User;

class InvoiceController extends Controller
{
    public function index()
    {
        // Fetch all invoices with user details
        $invoices = Invoice::with('user')->get(); 

        return view('admin.invoices.index', compact('invoices')); // ✅ Passes $invoices to view
    }

    public function show($id)
    {
        $invoice = Invoice::with('invoiceItems.item')->findOrFail($id);
        return view('admin.invoices.show', compact('invoice'));
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->delete();

        return redirect()->route('admin.invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
