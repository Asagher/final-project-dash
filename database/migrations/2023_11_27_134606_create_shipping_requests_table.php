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
    Schema::create('shipping_requests', function (Blueprint $table) {
      $table->id('request_id');
      $table->unsignedBigInteger('sender_customer_id');
      $table->unsignedBigInteger('receiver_customer_id');
      $table->timestamp('shipping_date');
      $table->date('shipping_delivery');
      $table->unsignedBigInteger('status_id');
      $table->unsignedBigInteger('address_id');
      $table
        ->foreign('address_id')
        ->references('id')
        ->on('addresses')
        ->onDelete('cascade');
      $table
        ->foreign('sender_customer_id')
        ->references('id')
        ->on('customers')
        ->onDelete('cascade');
      $table
        ->foreign('receiver_customer_id')
        ->references('id')
        ->on('customers')
        ->onDelete('cascade');

      $table
        ->foreign('status_id')
        ->references('status_id')
        ->on('request_statuses')
        ->onDelete('cascade');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('shipping_requests');
  }
};
