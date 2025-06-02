@extends('layouts.app')

@section('content')
    <h2>Factura ID_00{{ $invoice->id }}</h2>
    <p>Cliente: {{ $invoice->client_name }}</p>
    <p>Documento: {{ $invoice->client_document }}</p>
    <p>Fecha: {{ $invoice->created_at->format('d/m/Y') }}</p>

    <h4>Items</h4>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoice->item as $item)
                <tr>
                    <td>{{ $item->product_name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->unit_price, 2) }}</td>
                    <td>${{ number_format($item->quantity * $item->unit_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p><strong>Subtotal:</strong> ${{ number_format($invoice->subtotal, 2) }}</p>
    <p><strong>Impuesto:</strong> ${{ number_format($invoice->tax, 2) }}%</p>
    <p><strong>Total Impuestos:</strong> ${{ number_format($invoice->tax_total, 2) }}</p>
    <p><strong>Total:</strong> ${{ number_format($invoice->total, 2) }}</p>
@endsection('content')