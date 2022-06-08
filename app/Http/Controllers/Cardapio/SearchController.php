<?php

namespace App\Http\Controllers\Cardapio;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class SearchController extends Controller
{
    public $aHead = [
        'Content-Type' => 'application/json; charset=UTF-8',
        'charset' => 'utf-8'
    ];
    
    public function index()
    {
        $categories = Category::with('products')
        ->has('products')
        ->IsActive()
        ->take(10)
        ->get();
        
        return view('cardapio.search', ['categories' => $categories]);
    }

    public function findProduct(Request $request)
    {
        $products = Product::where('name', 'like', '%'.$request->route()->parameters()['product'].'%')
        ->get();

        return response()->json($products->toArray(), 200, $this->aHead, JSON_UNESCAPED_UNICODE);
    }
}
