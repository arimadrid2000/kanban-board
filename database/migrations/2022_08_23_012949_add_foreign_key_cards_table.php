<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->after('name');
            $table->foreign('user_id')
                 ->references('id')->on('users');
            $table->integer('panel_id')->unsigned()->after('end_date');
            $table->foreign('panel_id')
                 ->references('id')->on('panels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            //
        });
    }
}
