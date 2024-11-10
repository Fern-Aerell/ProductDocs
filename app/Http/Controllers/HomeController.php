<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $products = Product::with(['features'])->get();
        $content = '';
        return view('home', compact(['products', 'content']));
    }

    public function index2(string $product) {
        $products = Product::with(['features'])->get();

        return view('home', compact(['products']));
    }

    public function index3(string $product, string $feature) {
        $products = Product::with(['features'])->get();

        $content = Product::where('route', $product)
            ->with(['features' => function ($query) use ($feature) {
                $query->where('route', $feature);
            }])
            ->first()
            ?->features
            ?->first()
            ?->content;

        if(!$content) {
            return abort(404);
        }

        return view('home', compact(['products', 'content']));
    }
}
