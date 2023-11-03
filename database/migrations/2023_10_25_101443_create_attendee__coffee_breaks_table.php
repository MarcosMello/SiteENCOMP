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
        Schema::create('attendee__coffee_breaks', function (Blueprint $table) {
            $table->id();
            $table->boolean("is_available")->default(True);

            $table->foreignUuid("attendee_uuid")
                ->references("id")
                ->on("attendees")
                ->onDelete("cascade");

            $table->foreignId("event_coffee_break_id")
                ->references("id")
                ->on("event__ticket__coffee_breaks")
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
        Schema::dropIfExists('attendee__coffee_breaks');
    }
};
