<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_updates', function (Blueprint $table) {
            $table->id();
            $table->string('group_name', 100);
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('group_members');
            $table->string('student_id', 100);
            $table->string('completed_task', 100);
            $table->boolean('is_complete')->default(false);
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
        Schema::dropIfExists('task_updates');
    }
}
