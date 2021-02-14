<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChatUser extends Migration
{
    public function up()
    {
        Schema::create('chat_user', function (Blueprint $table) {
            $table->unsignedBigInteger('chat_id')->nullable(false);
            $table->unsignedBigInteger('user_id')->nullable(true);

            $table->primary(['chat_id', 'user_id']);

            $table->foreign('chat_id')->references('id')->on('chats')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('chat_user');
    }
}
