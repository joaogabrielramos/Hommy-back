<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepublicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('republics', function (Blueprint $table) {
            $table->id();
            $table->string("Name");
            $table->string("Street");
            $table->string("Number");
            $table->string("City");
            $table->integer("SpaceAvailable")->unsigned();
            $table->integer("Bedrooms")->default();
            $table->float("Price")->default();
            $table->string("Phone");
            $table->string("CEP");
            $table->boolean("SmokeAllowed")->nullable();
            $table->boolean("AnimalAllowed")->nullable();
            $table->boolean("KidsAllowed")->nullable();
            $table->unsignedBigInteger("user_id")->nullable();
            $table->timestamps();
        });


        Schema::table('republics', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('republics');
    }
}
