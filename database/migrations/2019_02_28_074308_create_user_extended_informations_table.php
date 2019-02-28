<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserExtendedInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_extended_informations', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->timestamps();

            $table->primary('user_id');
            // $table->foreign('user_id')->references('id')->on('multitenancy_main.users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_extended_informations');
    }
}