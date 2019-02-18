<?php

use Phpmig\Migration\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUser extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('airline');
            $table->timestamps();
        });
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        Schema::drop('flights');
    }
}
