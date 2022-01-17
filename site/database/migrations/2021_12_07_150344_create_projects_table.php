<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-12-07 21:03:44
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-12-07 21:07:08
 */

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
            $table->string('project_name');
            $table->string('project_des');
            $table->string('project_link');
            $table->string('project_img');
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
        Schema::dropIfExists('projects');
    }
}
