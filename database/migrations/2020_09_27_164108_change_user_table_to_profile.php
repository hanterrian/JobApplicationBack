<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserTableToProfile extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('country_id')->nullable(true);
            $table->unsignedBigInteger('region_id')->nullable(true);
            $table->unsignedBigInteger('city_id')->nullable(true);

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

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('country_id');
            $table->dropForeign('region_id');
            $table->dropForeign('city_id');

            $table->dropColumn('country_id');
            $table->dropColumn('region_id');
            $table->dropColumn('city_id');

            $table->dropColumn('last_name');
            $table->dropColumn('patronymic');
            $table->dropColumn('description');

            $table->dropColumn('gender');
            $table->dropColumn('photo');
            $table->dropColumn('date_of_birth');

            $table->dropColumn('company_type');
            $table->dropColumn('company_name');
            $table->dropColumn('company_site');

            $table->dropColumn('last_activity');
            $table->dropColumn('is_verified');
        });
    }
}
