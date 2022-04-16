<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrinhoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrinho', function (Blueprint $table) {
            $table->id();
            $table->string('nome_produto', 100)->nullable();
            $table->string('id_produto',10)->nullable();
            $table->decimal('valor_produto', 12,2)->nullable();
            $table->string('qtd_produto', 10)->nullable();
            $table->decimal('valor_total_compra', 12,2)->nullable();
            $table->ipAddress('ip_usuario', 20)->nullable();
            $table->timestamps();
        });
    }
/**'id_produto',
        'nome_produto',
        'valor_produto',
        'qtd_produto',
        'valor_total_compra', */
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrinho');
    }
}
