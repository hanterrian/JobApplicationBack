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

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->unsignedBigInteger('selected_user_id')->nullable();

            $table->string('type')->nullable(false);

            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);

            $table->string('service_provision')->nullable(false);

            $table->float('price')->nullable(false);
            $table->unsignedBigInteger('currency_id')->nullable();

            $table->date('desired_date')->nullable(false);
            $table->time('desired_time_from')->nullable(false);
            $table->time('desired_time_to')->nullable(false);

            $table->text('execution_address')->nullable();

            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->text('address')->nullable(false);

            $table->text('executor_comment')->nullable(true);
            $table->text('customer_comment')->nullable(true);

            $table->string('status')->nullable(false);

            $table->timestamp('working_at')->nullable();
            $table->timestamp('closed_at')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('selected_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('set null');

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
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
