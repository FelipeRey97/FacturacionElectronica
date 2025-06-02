@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    
    <h1>Facturas</h1>

            <table border="1" cellpadding="8" cellspacing="0">
    <thead>
        <tr>
           <th>Id</th>
           <th>Created Date</th>
           <th>Cliente</th>
           <th>Cliente Id</th>
           <th>Subtotal</th>
           <th>Total Impuestos</th>
           <th>Total</th>
           <th>Imprimir</th>
          <!-- <th>Detalle</th> -->
        </tr>
    </thead>
    <tbody>
        @foreach ($invoices as $invoice)
            <tr>
                <td>{{ $invoice->id }}</td>
                <td>{{ $invoice->created_at }}</td>
                <td>{{ $invoice->client_name }}</td>
                <td>{{ $invoice->client_document }}</td>
                <td>{{ number_format($invoice->subtotal, 2) }}</td>
                <td>{{ number_format($invoice->tax_total, 2) }}</td>
                <td>{{ number_format($invoice->total, 2) }}</td>
               <td>
                    <form action="{{ route('printInvoice')}}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $invoice->id }}" name=InvoiceId>
                        <button type="submit" class="pdf">Imprimir</button>
                    </form>
                </td> 
                <!-- <td>
                    <a href="">
                        <button class="Detail">Ver</button>
                    </a>
                </td> -->
            </tr>
        @endforeach
    </tbody>
</table>
@endsection('content')