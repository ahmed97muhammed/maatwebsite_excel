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
        Schema::create('extras', function (Blueprint $table) {
            $table->id();
            $table->integer('create_id')->nullable()->index();
            $table->integer('update_id')->nullable()->index();
            $table->integer('delete_id')->nullable()->index();
            $table->string('name_ar', 45);
            $table->string('name_en', 45);
            $table->tinyInteger('type')->index();
            $table->integer('brand_id')->default(1)->index();
            $table->boolean('status')->default(1)->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extras');
    }
};
