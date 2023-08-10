<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->unsignedBigInteger('user_id');
            $table->json('animal')->comment('animal information');
            $table->longText('payment_id');
            $table->text('card_number');
            $table->string('amount');
            $table->string('name')->comment('customer name');
            $table->string('email');
            $table->string('phone');
            $table->string('city');
            $table->string('post_code');
            $table->string('shipping_address');
            $table->string('status')->default(App\Enums\OrderStatusEnum::PENDING);
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
};
