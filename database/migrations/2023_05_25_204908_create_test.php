<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Tests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('totalMembers')->default(1);
            $table->unsignedBigInteger('assigned_supervisor_id')->nullable();
            $table->foreign('assigned_supervisor_id')->references('id')->on('users')->onDelete('set null');
            $table->timestamps();
        });
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('member_id');
            $table->timestamps();
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Tests');
        Schema::dropIfExists('members');
    }
}
