<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_attachments', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('chat_message_id')->nullable(false);

            $table->string('src')->nullable(false);

            $table->timestamps();

            $table->foreign('chat_message_id')->references('id')->on('chat_messages')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chat_attachments');
    }
}
