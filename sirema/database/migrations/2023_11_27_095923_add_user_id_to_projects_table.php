<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->unsignedBigInteger('user_id')->nullable();

        $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}

}
