<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('admin.items.index', compact('items'));
    }

    public function create()
    {
        return view('admin.items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ]);

        Item::create($request->all());
        return redirect()->route('admin.items.index')->with('success', 'Item added successfully.');
    }

    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'price' => 'required|numeric|min:1',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|string',
        ]);

        $item->update($request->all());
        return redirect()->route('admin.items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('admin.items.index')->with('success', 'Item deleted successfully.');
    }
}
