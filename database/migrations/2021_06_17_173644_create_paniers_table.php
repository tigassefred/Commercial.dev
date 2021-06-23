<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paniers', function (Blueprint $table) {
            $table->id();
            $table->string('ref',15)->unique();
            $table->bigInteger('id_vendeurs');
            $table->unsignedBigInteger('id_client')->default(1);
            $table->unsignedInteger('valeurs',)->default(0);
            $table->unsignedInteger('remise')->default(0);
            $table->enum('status',['traite','non traite','abandonne'])->default('non traite');
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
        Schema::dropIfExists('paniers');
    }
}
