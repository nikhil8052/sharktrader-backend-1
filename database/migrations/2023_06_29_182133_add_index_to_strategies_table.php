<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('strategies', function (Blueprint $table) {
            $table->index('active_until');
        });
    }

    public function down()
    {
        Schema::table('strategies', function (Blueprint $table) {
            $table->dropIndex('strategies_active_until_index');
        });
    }
};
