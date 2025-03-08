<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class CatalogController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('user.catalog', compact('items'));
    }
}
