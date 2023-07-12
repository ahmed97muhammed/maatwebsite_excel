<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items_allergens', function (Blueprint $table) {
            $table->id();
            $table->integer('create_id')->nullable()->index();
            $table->integer('update_id')->nullable()->index();
            $table->integer('delete_id')->nullable()->index();
            $table->integer('allergen_id')->index();
            $table->integer('item_id')->index();
            $table->double('unit')->index();
            $table->string('unit_category',5)->index();
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
        Schema::dropIfExists('items_allergens');
    }
};
