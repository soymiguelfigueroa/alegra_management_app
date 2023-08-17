<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ReceiptsController extends Controller
{
    public function index(): View
    {
        $response = Http::get(env('API_KITCHEN_ENDPOINT') . 'receipts');
        $receipts = $response->json();
        return view('receipts.index', compact('receipts'));
    }

    public function show(Request $request): View
    {
        $receipt_id = $request->receipt_id;

        $response = Http::get(env('API_KITCHEN_ENDPOINT') . 'ingredients', [
            'receipt_id' => $receipt_id
        ]);

        $receipt = $response->json()['receipt'];
        $ingredients = $response->json()['ingredients_receipt'];

        return view('receipts.show', compact('receipt', 'ingredients'));
    }
}
