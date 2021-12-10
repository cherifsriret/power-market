<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChatMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chat_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('from_user_id')->nullable();
            $table->foreign('from_user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->unsignedBigInteger('to_user_id')->nullable();
            $table->foreign('to_user_id')->references('id')->on('users')->onDelete('SET NULL');
            $table->longText('message');
            $table->timestamp('read_at')->nullable();
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
        Schema::dropIfExists('chat_messages');
    }
}
