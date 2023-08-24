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
        Schema::create('apartment_sponsorhip', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->nullable()->constrained()->onDelete("cascade");
            $table->foreignId('sponsorship_id')->nullable()->constrained()->onDelete("cascade");
            $table->dateTimeTz('start_time');
            $table->dateTimeTz('end_time');
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
        Schema::dropIfExists('apartment_service');
    }
};
