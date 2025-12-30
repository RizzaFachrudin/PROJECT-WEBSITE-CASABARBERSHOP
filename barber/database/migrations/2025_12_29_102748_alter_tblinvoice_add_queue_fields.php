<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('tblinvoice', function (Blueprint $table) {

            // ubah BillingId jadi string
            $table->string('BillingId', 50)->change();

            // status antrian
            $table->enum('Status', ['waiting', 'process', 'completed'])
                  ->default('waiting')
                  ->after('PostingDate');

            // status pembayaran
            $table->boolean('Paid')
                  ->default(0)
                  ->after('Status');

            // total pembayaran
            $table->integer('Total')
                  ->default(0)
                  ->after('Paid');

            // timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('tblinvoice', function (Blueprint $table) {
            $table->dropColumn(['Status', 'Paid', 'Total', 'created_at', 'updated_at']);
        });
    }
};
