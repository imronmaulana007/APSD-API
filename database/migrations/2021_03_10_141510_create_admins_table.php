<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_role');
            $table->string('admin_name', 100);
            $table->integer('gender');
            $table->string('phone_number', 13);
            $table->string('address', 225);
            $table->string('email', 100);
            $table->string('password', 100);
            $table->integer('status');
            $table->timestamps();

            // $table->foreign('id_role')->references('id')->on('roles')
            // ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
