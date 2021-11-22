<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-11-16 22:48:42
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-11-16 23:28:21
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');
	        $table->string('visit_time');
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
        Schema::dropIfExists('visitors');
    }
}
