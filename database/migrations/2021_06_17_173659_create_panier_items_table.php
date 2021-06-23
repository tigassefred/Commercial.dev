<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePanierItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panier_items', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('ref_vente');
            $table->string('ref_article',45);
            $table->unsignedInteger('valeur')->default(0);
            $table->unsignedInteger('quantite')->default(0);
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
        Schema::dropIfExists('panier_items');
    }
}
