<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string ('Nombre')->nullable();
            $table->string ('CodigoB')->nullable();
            $table->string ('StockMin')->nullable();
            $table->string ('StockMax')->nullable();
            $table->string ('Precio')->nullable();
            $table->string ('P1')->nullable();
            $table->string ('P2')->nullable();
            $table->string ('P3')->nullable();
            $table->string ('P4')->nullable();
            $table->string ('P5')->nullable();
            $table->string ('P6')->nullable();
            $table->string ('P7')->nullable();
            $table->string ('P8')->nullable();
            $table->string ('P9')->nullable();
            $table->string ('P10')->nullable();
            $table->string ('Clv1')->nullable();
            $table->string ('Clv2')->nullable();
            $table->string ('Clv3')->nullable();
            $table->string ('Clv4')->nullable();
            $table->string ('IVA')->nullable();
            $table->string ('A1')->nullable();
            $table->string ('A2')->nullable();
            $table->string ('A3')->nullable();
            $table->string ('A4')->nullable();
            $table->string ('A5')->nullable();
            $table->string ('A6')->nullable();
            $table->string ('A7')->nullable();
            $table->string ('A8')->nullable();
            $table->string ('A9')->nullable();
            $table->string ('A10')->nullable();
            $table->string ('S1')->nullable();
            $table->string ('S2')->nullable();
            $table->string ('S3')->nullable();
            $table->string ('S4')->nullable();
            $table->string ('S5')->nullable();
            $table->string ('S6')->nullable();
            $table->string ('S7')->nullable();
            $table->string ('S8')->nullable();
            $table->string ('S9')->nullable();
            $table->string ('S10')->nullable();
            $table->string ('Estatus')->nullable();
            $table->unsignedBigInteger("marca_id")->nullable();
            $table->foreign("marca_id")->references("id")->on("marcas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("categoria_id")->nullable();
            $table->foreign("categoria_id")->references("id")->on("categorias")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("unidad_id")->nullable();
            $table->foreign("unidad_id")->references("id")->on("unidad_medidas")->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger("proveedor_id")->nullable();
            $table->foreign("proveedor_id")->references("id")->on("proveedors")->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
