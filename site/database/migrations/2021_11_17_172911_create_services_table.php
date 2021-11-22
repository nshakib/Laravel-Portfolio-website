<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-17 23:29:11
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-17 23:29:34
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
	        $table->string('service_des');
            $table->string('service_img');
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
        Schema::dropIfExists('services');
    }
}
