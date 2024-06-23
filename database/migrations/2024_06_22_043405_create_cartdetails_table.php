<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cartdetails', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cartheader_id');
            $table->unsignedBigInteger('item_id');
            $table->integer('qty');
            $table->foreign('cartheader_id')->references('id')->on('cartheaders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartdetails');
    }
};
