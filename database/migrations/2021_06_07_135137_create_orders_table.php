<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('delivery_method_id')->default(1)->constrained('delivery_methods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('order_status_id')->default(1)->constrained('order_statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->string('city', 100)->nullable()->default(NULL);
            $table->string('address', 100)->nullable()->default(NULL);
            $table->string('index', 6)->nullable()->default(NULL);
            $table->text('note')->nullable()->default(NULL);
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
