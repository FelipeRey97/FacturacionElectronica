<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;

class invoiceRegisterController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        return view('pages/invoiceRegister');
    }

    public function store(Request $request){


        $validated = $request->validate([
            'store_name' => 'required|string|max:100',
            'name' => 'required|string|max:100',
            'doc' => 'required',
            'tax' => 'required|numeric|min:0',
            'item' => 'required|array|min:1',
            'item.*' => 'required|string|max:100',
            'cantidad' => 'required|array|min:1',
            'cantidad.*' => 'required|numeric|min:1',
            'precio' => 'required|array|min:1',
            'precio.*' => 'required|numeric|min:0.01',
        ]);

        if($validated){
            
            $item = $request->item;
            $cantidad = $request->cantidad;
            $precio = $request->precio;
            $tax = $request->tax;
            $totalFactura = 0;

            for ($i = 0; $i < count($item); $i++) {

                $subtotal = $cantidad[$i] * $precio[$i];
                $totalFactura += $subtotal;

                $valorImpuesto = $totalFactura * ($tax / 100);
                $totalConImpuesto = $totalFactura + $valorImpuesto;

            }

            $invoice = new Invoice();

            $invoice->client_name = $request->name;
            $invoice->client_document = $request->doc;
            $invoice->subtotal = $totalFactura;
            $invoice->tax_total = $valorImpuesto;
            $invoice->total = $totalConImpuesto;
            $invoice->user_id = $request->user_id;
            $invoice->store_Name = $request->store_name;
            $invoice->save();

            for ($i = 0; $i < count($item); $i++) {

                $subtotal = $cantidad[$i] * $precio[$i];

                $valorImpuesto = $subtotal * ($tax / 100);
                $total = $subtotal + $valorImpuesto;

                $itemModel = new Item();
                $itemModel->invoice_id = $invoice->id;
                $itemModel->product_name = $item[$i];
                $itemModel->quantity = $cantidad[$i];
                $itemModel->unit_price = $precio[$i];
                $itemModel->tax = $valorImpuesto;
                $itemModel->total = $total;
                $itemModel->save();

            }

            return redirect()->route('mainPage');
        }
    }
}