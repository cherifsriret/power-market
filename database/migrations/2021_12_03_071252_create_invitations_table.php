<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {
            $table->id();
            $table->string('visitor_name');
            $table->string('code', 22)->unique();
            $table->dateTime('visit_from_date')->nullable();
            $table->time('visit_from_time')->nullable();
            $table->dateTime('visit_to_date')->nullable();
            $table->time('visit_to_time')->nullable();
            $table->enum('visit_type', ["single", "multiple"])->default("single");
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
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
        Schema::dropIfExists('invitations');
    }
}
