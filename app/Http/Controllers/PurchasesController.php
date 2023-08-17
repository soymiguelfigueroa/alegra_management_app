<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class PurchasesController extends Controller
{
    public function index(): View
    {
        $response = Http::get(env('API_WAREHOUSE_ENDPOINT') . 'purchases');

        $purchases = $response->json();

        return view('purchases.index', compact('purchases'));
    }
}
