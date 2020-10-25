<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('lesson_id');
            $table->primary(['student_id', 'lesson_id']);
            $table->boolean('has_project');
            $table->boolean('is_active');
            $table->timestamps();
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students_lessons');
    }
}
