<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-29 22:30:32
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-29 22:34:58
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_des');
            $table->string('course_fee');
            $table->string('course_totalenroll');
            $table->string('course_totalclass');
            $table->string('course_link');
            $table->string('course_img');
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
        Schema::dropIfExists('courses');
    }
}
