<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\StockTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocks = Stock::all();
        return view('stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'item_name' => 'required|string|max:255',
            'price'     => 'required|numeric',
            'quantity'  => 'required|integer',
        ]);
    
        Stock::create($validatedData);
    
        return redirect()->route('stock.index')->with('success', 'Stock item created successfully.');
    

    }

        public function increase(Request $request, $id)
            {
                $quantityToAdd = $request->input('quantity', 1); // Default to 1 if quantity is not specified
            
                $item = Stock::findOrFail($id);
                $quantity = $request->input('quantity');
                $item->quantity += $quantityToAdd;
                $item->save();

                // Log the stock increase in stock_transactions
                StockTransaction::create([
                    'item_id' => $item->id,
                    'user_name' => Auth::user()->username, // Assuming you have authentication
                    'quantity_change' => $quantity,
                ]);
            
                // Redirect back to the stock index page with a success message
                return redirect()->route('stock.index')->with('success', 'Item quantity increased.');
            }
        
        public function decrease(Request $request, $id)
            {
                $quantityToSubtract = $request->input('quantity', 1); // Default to 1 if quantity is not specified
            
                $item = Stock::findOrFail($id);
                $quantity = $request->input('quantity');
            
                // Ensure the quantity doesn't go below zero
                $item->quantity = max(0, $item->quantity - $quantityToSubtract);
                
                $item->save();

                
                // Log the stock decrease in stock_transactions
                StockTransaction::create([
                    'item_id' => $item->id,
                    'user_name' => Auth::user()->username, // Assuming you have authentication
                    'quantity_change' => -$quantity,
                ]);
            
                // Redirect back to the stock index page with a success message
                return redirect()->route('stock.index')->with('success', 'Item quantity decreased.');
            }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
