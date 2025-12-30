<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tblservices', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('ServiceName', 200)->nullable();
            $table->mediumText('ServiceDescription')->nullable();
            $table->integer('Cost')->nullable();
            $table->string('Image', 200)->nullable();
            $table->timestamp('CreationDate')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblservices');
    }
};
