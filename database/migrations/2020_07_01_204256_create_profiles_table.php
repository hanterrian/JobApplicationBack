<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('country_id')->nullable(true);
            $table->unsignedBigInteger('region_id')->nullable(true);
            $table->unsignedBigInteger('city_id')->nullable(true);

            $table->string('name')->nullable(true);
            $table->string('last_name')->nullable(true);
            $table->string('patronymic')->nullable(true);
            $table->text('description')->nullable(true);

            $table->integer('gender')->nullable(true);
            $table->string('photo')->nullable(true);
            $table->date('date_of_birth')->nullable(true);

            $table->string('company_type')->nullable(true);
            $table->string('company_name')->nullable(true);
            $table->string('company_site')->nullable(true);

            $table->dateTime('last_activity')->nullable(true);
            $table->boolean('is_verified')->default(true);

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('profiles');
    }
}
