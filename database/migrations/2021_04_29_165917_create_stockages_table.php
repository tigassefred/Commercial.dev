<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stockages', function (Blueprint $table) {
            $table->id();
            $table->string('ref', 45)->unique();
            $table->string('name')->unique();
            $table->string('prix_vente', 45)->default('0');
            $table->string('prix_achat', 45)->default('0');
            $table->string('nombre_paquet', 45)->default('1');
            $table->string('qte_magasin', 45)->default('0');
            $table->string('qte_boutique', 45)->default('0');
            $table->string('qte_seuil', 45)->default('3');
            $table->boolean('statut')->default();
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
        Schema::dropIfExists('stockages');
    }
}
