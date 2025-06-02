@extends('layouts.dashboard')

@section('title', 'Nueva Factura')

@section('content')
    <section class="InvoiceFormSection">
        <h2>Registrar Factura</h2>
        
        <form class="InvoiceForm" action="{{ route('invoiceRegister')}}" method="POST">
            @csrf

            <label for="store_name">Nombre Establecimiento:</label>
            <input type="text" id="store_name" name="store_name" >

            <label for="name">Nombre Cliente:</label>
            <input type="text" id="name" name="name" >

            <label for="doc">Documento Cliente:</label>
            <input type="text" id="doc" name="doc" >

            <div class="Ingredientes" id="Ingredient_List">
                <label for="ingrediente">Productos</label>
                
                <div class="Ingrediente" id="Ingredient_content">
                    <input type="text" name="item[]" id="item" value="" placeholder="producto">
                    <input type="number" name="cantidad[]" id="cantidad" value="" placeholder="Cantidad">
                    <input type="number" name="precio[]" id="precio" value="" placeholder="Precio">
                    <button type="button" class="remove_ingrediente" id="remove_ingrediente" >X</button>
                </div>
                
                <button type="button" id="add_ingrediente" > + Nuevo Producto</button>
            </div>
            
            <label for="tax">Impuesto:</label>
            <input type="number" id="tax" name="tax" >

            @auth
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @endauth

            <button type="submit">Crear Factura</button>
        </form>
    </section>
@endsection('content')