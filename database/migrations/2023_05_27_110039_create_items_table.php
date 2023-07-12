<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->integer('create_id')->nullable()->index();
            $table->integer('update_id')->nullable()->index();
            $table->integer('delete_id')->nullable()->index();
            $table->string('name_ar', 45)->nullable()->index();
            $table->string('name_en', 45)->nullable()->index();
            $table->string('description_ar', 200)->index();
            $table->string('description_en', 200)->index();
            $table->string('currency_ar', 20)->index();
            $table->string('currency_en', 20)->index();
            $table->boolean('status')->default(1)->nullable()->index();
            $table->double('price')->index();
            $table->double('kcal')->index();
            $table->integer('offer_id')->nullable()->index();
            $table->integer('brand_id')->index();
            $table->integer('menu_category_id')->index();
            $table->integer('order')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
