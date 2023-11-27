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
    Schema::create('invoices', function (Blueprint $table) {
      $table->id('invoice_id');

      $table->unsignedBigInteger('request_id');

      $table->string('sender_customer_id', 15);
      $table->string('receiver_customer_id', 15);

      $table->timestamp('invoice_date');
      $table->date('due_date');
      $table->double('total_amount', 10, 2);
      $table->string('payer');

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
        ->foreign('request_id')
        ->references('request_id')
        ->on('shipping_requests')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('invoices');
  }
};
