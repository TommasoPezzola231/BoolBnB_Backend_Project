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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string("title", 255);
            $table->string("slug", 255)->unique();
            $table->string("principal_image", 255)->nullable();
            $table->string("imageID")->nullable();
            $table->text("description");
            $table->decimal("price", 10, 2);
            $table->string("city", 50);
            $table->string("country", 50);
            $table->tinyInteger("num_rooms");
            $table->tinyInteger("num_bathrooms");
            $table->bigInteger("square_meters");
            $table->string("address", 255);
            //$table->integer("serviceID");
            $table->boolean("visible");
            $table->decimal("latitude", 10, 7);
            $table->decimal("longitude", 10, 7);
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
