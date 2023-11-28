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
      $table->string('sender_customer_id', 15);
      $table->string('receiver_customer_id', 15);
      $table->double('total_weight', 10, 2);
      $table->double('total_shipping_cost', 10, 2);
      $table->timestamp('created_at');
      $table->unsignedBigInteger('status_id');
      $table
        ->foreign('sender_customer_id')
        ->references('national_id')
        ->on('customers')
        ->onDelete('cascade');
      $table
        ->foreign('receiver_customer_id')
        ->references('national_id')
        ->on('customers')
        ->onDelete('cascade');

      $table
        ->foreign('status_id')
        ->references('status_id')
        ->on('request_statuses')
        ->onDelete('cascade');
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
