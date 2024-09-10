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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description');
            $table->smallInteger('surface')->unsigned();
            $table->string('image');
            $table->tinyInteger('n_room')->unsigned();
            $table->tinyInteger('n_bed')->unsigned();
            $table->tinyInteger('n_bath')->unsigned();
            $table->string('address');
            $table->decimal('latitude', 10, 6);
            $table->decimal('longitude', 10, 6);
            $table->smallInteger('price')->unsigned();
            $table->boolean('visible')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
