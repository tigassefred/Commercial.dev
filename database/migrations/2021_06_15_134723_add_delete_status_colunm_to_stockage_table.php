<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeleteStatusColunmToStockageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stockages', function (Blueprint $table) {
            $table->enum('delete',[0,1])->default(0)->after('statut');
            $table->string('delete_by')->nullable()->after('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stockages', function (Blueprint $table) {
            $table->dropColumn('delete');
            $table->dropColumn('delete_by');
        });
    }
}
