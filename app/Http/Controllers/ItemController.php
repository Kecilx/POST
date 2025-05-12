<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }
    public function create()
    {
        return view('item.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        Item::create($request->all());

        return redirect()->route('item.index')->with('success', 'Item berhasil ditambahkan.');
    }

    public function edit(Item $item)
    {
        return view('item.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $item->update($request->all());

        return redirect()->route('item.index')->with('success', 'Item berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);

        // Cek apakah ada relasi ke transaction_details
        if ($item->transactionDetails()->exists()) {
            return redirect()->back()->with('error', 'Item tidak bisa dihapus karena masih digunakan dalam transaksi.');
        }

        $item->delete(); // Ini akan melakukan soft delete
        return redirect()->route('item.index')->with('success', 'Item berhasil dihapus.');
    }

}
