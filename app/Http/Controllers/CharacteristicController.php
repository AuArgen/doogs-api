<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Characteristic;

class CharacteristicController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'good_id' => 'required|exists:goods,id',
            'name' => 'required|string|max:255',
            'value' => 'required|string|max:255',
        ]);

        $characteristic = Characteristic::create($request->all());

        return response()->json($characteristic, 201);
    }
}
