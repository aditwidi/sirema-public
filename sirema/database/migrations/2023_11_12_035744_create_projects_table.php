<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->enum('progress', ['On Going', 'Selesai', '-'])->default('-');
            $table->unsignedBigInteger('request_id');
            $table->timestamps();

            // Assuming you have a 'requests' table and 'id' is its primary key
            $table->foreign('request_id')->references('id')->on('requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
