<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class printInvoiceController extends Controller
{

    public function index(Request $request)
    {
        $invoice = Invoice::with('item')->findOrFail($request->InvoiceId);

        $pdf = Pdf::loadView('pages/invoice', compact('invoice'));

        return $pdf->download('factura_' . $invoice->id . '.pdf');
    }
}