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
        Schema::create('cash_collections', function (Blueprint $table) {
            $table->id();
            $table->integer("cash_receipt_seriel_number");
            $table->integer('tax_collector_user_id');
            $table->integer('cash_receipt_generator_user_id');
            $table->integer('cash_collector_user_id')->nullable();
            $table->integer('tax_collection_seriel_start');
            $table->integer('tax_collection_seriel_end');
            $table->integer('pole_count');
            $table->decimal('pole_cost');
            $table->decimal('tax', 10, 2);
            $table->decimal('total_cash', 10, 2);
            $table->boolean('cash_collection_receipt_generated')->nullable();
            $table->boolean('cash_collection_completed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cash_collections');
    }
};