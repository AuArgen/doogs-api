<?php
namespace App\Http\Controllers;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'sku' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'is_published' => 'required|boolean',
        ]);

        $good = Good::create($request->all());

        return response()->json($good, 201);
    }
    public function index(Request $request)
    {
        $query = Good::query();

        if ($request->has('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->has('stock_id')) {
            $query->whereHas('stocks', function ($q) use ($request) {
                $q->where('id', $request->stock_id)->where('count', '>', 0);
            });
        }

        if ($request->has('price_min') && $request->has('price_max')) {
            $query->whereHas('prices', function ($q) use ($request) {
                $q->where('price', '>=', $request->price_min)
                    ->where('price', '<=', $request->price_max);
            });
        }

        if ($request->has('characteristic_name') && $request->has('characteristic_value')) {
            $query->whereHas('characteristics', function ($q) use ($request) {
                $q->where('name', $request->characteristic_name)
                    ->where('value', $request->characteristic_value);
            });
        }

        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by);
        }

        $goods = $query->paginate(14, $request->get('fields', ['*']));

        return response()->json($goods);
    }
}
?>
