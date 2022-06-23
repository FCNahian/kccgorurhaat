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
        Schema::create('tax_collections', function (Blueprint $table) {
            $table->id();
            $table->integer('seriel_id')->unique();
            $table->mediumInteger('soldby_user_id');
            $table->string('seller_name');
            $table->string('seller_father_name')->nullable();
            $table->string('seller_village')->nullable();
            $table->mediumInteger('seller_district_id')->nullable();
            $table->mediumInteger('seller_subdistrict_id')->nullable();
            $table->string('buyer_name');
            $table->string('buyer_father_name')->nullable();
            $table->string('buyer_village')->nullable();
            $table->mediumInteger('buyer_district_id')->nullable();
            $table->mediumInteger('buyer_subdistrict_id')->nullable();
            $table->mediumInteger('cattletype_id')->nullable();
            $table->mediumInteger('cattlecolor_id')->nullable();
            $table->decimal('sale_price', 12, 2);
            $table->decimal('tax_rate');
            $table->decimal('tax', 10, 2);
            $table->mediumInteger('pole_count');
            $table->decimal('pole_cost_rate');
            $table->decimal('pole_cost');
            $table->decimal('total_cost', 10, 2);
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
        Schema::dropIfExists('tax_collections');
    }
};