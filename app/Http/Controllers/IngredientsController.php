<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IngredientsController extends Controller
{
    public function index()
    {
        $response = Http::get(env('API_WAREHOUSE_ENDPOINT') . 'ingredients');

        $ingredients = $response->json();

        return view('ingredients.index', compact('ingredients'));
    }
}
