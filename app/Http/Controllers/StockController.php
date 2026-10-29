<?php

namespace App\Http\Controllers;

use App\Http\Requests\StockRequest;
use App\Models\Stock;

class StockController extends Controller
{
    public function index()
    {
        return view('stock.index', ['stock' => Stock::latest()->paginate(15)]);
    }

    public function create()
    {
        return view('stock.create');
    }

    public function store(StockRequest $request)
    {
        Stock::create($request->validated());

        return redirect()->route('stock.index')->with('success', 'Stock creado correctamente.');
    }

    public function show(Stock $stock)
    {
        return view('stock.show', compact('stock'));
    }

    public function edit(Stock $stock)
    {
        return view('stock.edit', compact('stock'));
    }

    public function update(StockRequest $request, Stock $stock)
    {
        $stock->update($request->validated());

        return redirect()->route('stock.index')->with('success', 'Stock actualizado correctamente.');
    }

    public function destroy(Stock $stock)
    {
        $stock->delete();

        return redirect()->route('stock.index')->with('success', 'Stock eliminado correctamente.');
    }
}
