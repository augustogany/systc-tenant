<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->char('active',10);
            $table->string('slug');
            $table->string('currency')->default('usd');
            $table->string('interval')
                       ->default('month')
                       ->comment('La frecuencia con la que se factura una suscripción. Uno de day, week, montho year.');
            $table->string('nickname')
                     ->comment('Una breve descripción del plan, oculto a los clientes.')
                     ->nullable();
            $table->float('amount')->comment('La cantidad en centavos que se cobrará en el intervalo especificado.');
            $table->boolean('s3')->default(false);
            $table->json('meta')->nullable(); 
            $table->foreignId('currency_id')
                        ->constrained()
                        ->onDelete('cascade');
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
        Schema::dropIfExists('plans');
    }
}
