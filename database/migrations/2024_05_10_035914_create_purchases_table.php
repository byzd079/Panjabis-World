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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->date('purchaseDate');
            $table->integer('purchaseQuantity');
            $table->unsignedBigInteger('Item_itemID');
            $table->unsignedBigInteger('Users_userID');
            $table->double('payAmount');
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('Item_itemID')->references('itemID')->on('items');
            $table->foreign('Users_userID')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
