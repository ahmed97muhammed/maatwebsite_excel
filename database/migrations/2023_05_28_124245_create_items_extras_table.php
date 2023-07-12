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
        Schema::create('items_extras', function (Blueprint $table) {
            $table->id();
            $table->integer('create_id')->nullable()->index();
            $table->integer('update_id')->nullable()->index();
            $table->integer('delete_id')->nullable()->index();
            $table->string('currency_ar', 5)->index();
            $table->string('currency_en', 5)->index();
            $table->double('price')->index();
            $table->integer('extra_id')->index();
            $table->integer('item_id')->index();
            $table->integer('brand_id')->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items_extras');
    }
};
