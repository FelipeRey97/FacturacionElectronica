<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{   
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {

            $table->id();
            $table->string('client_name');
            $table->string('client_document');
            $table->decimal('subtotal', 10, 2); // suma de todos los items sin impuestos
            $table->decimal('tax_total', 10, 2); // suma del impuesto total
            $table->decimal('total', 10, 2); // subtotal + impuesto
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('store_Name');
            $table->timestamps();
            });

        Schema::create('items', function (Blueprint $table) {

            $table->id();
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade');
            $table->string('product_name');
            $table->integer('quantity');
            $table->decimal('unit_price', 10, 2);
            $table->decimal('tax', 10, 2); // impuesto por unidad o total, según lo manejes
            $table->decimal('total', 10, 2); // (quantity * unit_price) + impuesto
            $table->timestamps();
            });
        }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
        Schema::dropIfExists('items');
    }
};
