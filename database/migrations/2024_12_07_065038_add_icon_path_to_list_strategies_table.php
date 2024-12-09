<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIconPathToListStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('list_strategies', function (Blueprint $table) {
            $table->string('icon_path')->nullable(); // Replace `existing_column_name` with the column you want `icon_path` to come after
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('list_strategies', function (Blueprint $table) {
            $table->dropColumn('icon_path');
        });
    }
}
