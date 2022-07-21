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
            $table->foreignId('job_id')->nullable()->constrained()->onDelete('No ACTION');
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('No ACTION');
            $table->foreignId('center_id')->nullable()->constrained()->onDelete('No ACTION');
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
            $table->dropColumn('job_id');
            $table->dropColumn('customer_id');
            $table->dropColumn('center_id');
        });
    }
};
