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
        Schema::create('event__ticket__coffee_breaks', function (Blueprint $table) {
            $table->id();
            $table->integer("eventID");
            $table->string("event_name");
            $table->string("ticket_name");

            $table->foreignId("coffee_break_id")
                ->references("id")
                ->on("coffee_breaks")
                ->onDelete("cascade");

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
        Schema::dropIfExists('event__ticket__coffee_breaks');
    }
};
