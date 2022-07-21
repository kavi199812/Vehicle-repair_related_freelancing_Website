<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offer_accepts', function (Blueprint $table) {
            $table->foreignId('offer_id')->nullable()->constrained()->onDelete('No ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offer_accepts', function (Blueprint $table) {
            $table->dropColumn('offer_id');
        });
    }
};
