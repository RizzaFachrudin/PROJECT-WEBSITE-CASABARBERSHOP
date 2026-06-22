<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tblpage', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('PageType', 200)->nullable();
            $table->mediumText('PageTitle')->nullable();
            $table->mediumText('PageDescription')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tblpage');
    }
};