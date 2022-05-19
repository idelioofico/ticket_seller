<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->nullable();
            
            $table->text('title')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('event_type_id')->nullable();
            $table->unsignedBigInteger('topic_id')->nullable();

            $table->text('description')->nullable();

            $table->unsignedBigInteger('province_id')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();

            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();


            $table->string('producer')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
