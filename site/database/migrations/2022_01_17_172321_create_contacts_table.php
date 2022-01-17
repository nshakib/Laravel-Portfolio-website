<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2022-01-17 23:23:21
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2022-01-17 23:48:32
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('contact_name');
            $table->string('contact_mobile');
            $table->string('contact_email');
            $table->string('contact_msg');
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
        Schema::dropIfExists('contacts');
    }
}
