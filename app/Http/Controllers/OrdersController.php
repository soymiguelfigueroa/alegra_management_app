<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class OrdersController extends Controller
{
    public function index(): View
    {
        $response = Http::get(env('API_BENEFICIARY_ENDPOINT') . 'orders/');

        $orders = $response->json()['data'];

        return view('orders.index', compact('orders'));
    }
}
