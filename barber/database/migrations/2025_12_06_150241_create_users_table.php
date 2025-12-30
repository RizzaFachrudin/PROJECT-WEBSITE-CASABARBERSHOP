<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama', 255);
            $table->bigInteger('number')->nullable();
            $table->string('email', 255);
            $table->text('password');
            $table->timestamp('RegDate')->useCurrent();
            $table->text('verif_code');
            $table->string('reset_code', 100)->nullable();
            $table->tinyInteger('is_verified')->default(0);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};