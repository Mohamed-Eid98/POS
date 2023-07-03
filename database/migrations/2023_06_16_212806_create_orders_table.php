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

            $table->unsignedBigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->unsigned()->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->string('invoice_no',50)->nullable();
            $table->string('invoice_delivery',50)->nullable();
            $table->enum('status',['Pending', 'InProgress','Delivered','Paid','Rejected','Cancelled'])->default('Pending');

            $table->string('discount_type')->nullable();
            $table->decimal('discount_value', 15, 4)->default(0)->comment('discount value applied by user');
            $table->decimal('discount_amount', 15, 4)->default(0)->comment('amount calculated based on type and value');
            $table->decimal('grand_total', 15, 4)->nullable()->comment('amount only');
            $table->decimal('profit_total', 15, 4)->nullable()->comment('profit only');
            $table->decimal('user_shipping_fee', 15, 4)->nullable()->comment('User Shipping Fee profit');
            $table->decimal('shipping_cost', 15, 4)->nullable()->comment('shipping Cost');
            $table->decimal('final_total', 15, 4)->default(0.0000)->comment('( amount - discount amount ) + profit + shipping Cost');
            $table->text('note')->nullable();
            $table->timestamps();
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
