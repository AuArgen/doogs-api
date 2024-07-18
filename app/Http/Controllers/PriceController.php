<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Price;

class PriceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'good_id' => 'required|exists:goods,id',
            'old' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $price = Price::create($request->all());

        return response()->json($price, 201);
    }
}
