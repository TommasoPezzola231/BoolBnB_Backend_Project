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
        Schema::create('appartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string("title", 255);
            $table->string("principal_image", 255);
            $table->string("imageID");
            $table->text("description");
            $table->decimal("price", 10, 2);
            $table->string("country", 50);
            $table->tinyInteger("num_rooms");
            $table->tinyInteger("num_bathrooms");
            $table->tinyInteger("square_meters");
            $table->string("address", 255);
            $table->string("serviceID");
            $table->boolean("visible");
            $table->string("latitude");
            $table->string("longitude");
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
        Schema::dropIfExists('appartments');
    }
};
