<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class StockController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'good_id' => 'required|exists:goods,id',
            'count' => 'required|integer',
            'address' => 'required|string|max:255',
        ]);

        $stock = Stock::create($request->all());

        return response()->json($stock, 201);
    }
}

