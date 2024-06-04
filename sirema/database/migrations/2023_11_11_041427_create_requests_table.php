<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('nama_pengaju');
            $table->enum('asal_pengaju',['mahasiswa','dosen','bps','lainnya']);
            $table->string('nomor_telepon_pengaju');
            $table->string('judul_request');
            $table->enum('status',['pending','disetujui','ditolak'])->default('pending');
            $table->string('ket_admin')->nullable();
            $table->foreignId('bentuk_request_id')->constrained('bentuk_requests');
            $table->date('deadline');
            $table->integer('required_personil');
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
        Schema::dropIfExists('requests');
    }
}
