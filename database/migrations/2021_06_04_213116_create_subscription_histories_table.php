<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_histories', function (Blueprint $table) {
            $table->id();
            $table->string('subscription_id');
            $table->string('from_product_id');
            $table->BigInteger('from_number_of_users')->nullable();
            $table->string('to_product_id');
            $table->BigInteger('to_number_of_users')->nullable();
            $table->string('action');
            $table->datetime('action_date');
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
        Schema::dropIfExists('subscription_histories');
    }
}
