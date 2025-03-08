<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|min:5|max:80',
            'price' => 'required|integer',
            'stock' => 'required|integer',
            'image' => 'nullable|image|max:2048',
        ]);

        $item = new Item($request->all());

        if ($request->hasFile('image')) {
            $item->image = $request->file('image')->store('items', 'public');
        }

        $item->save();
        return redirect()->route('items.index')->with('success', 'Item added successfully!');
    }
}

