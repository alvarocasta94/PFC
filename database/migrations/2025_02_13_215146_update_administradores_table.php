<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('administradores', function (Blueprint $table) {
            $table->string('usuario')->unique()->change();
        });
    }

    public function down()
    {
        Schema::table('administradores', function (Blueprint $table) {
            $table->string('usuario')->change();
        });
    }
};
