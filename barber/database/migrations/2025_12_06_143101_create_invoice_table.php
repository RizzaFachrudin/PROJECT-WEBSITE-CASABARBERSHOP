<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tblinvoice', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Userid')->nullable();
            $table->integer('ServiceId')->nullable();
            $table->integer('BillingId')->nullable();
            $table->timestamp('PostingDate')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblinvoice');
    }
};
