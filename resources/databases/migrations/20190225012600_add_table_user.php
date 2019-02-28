<?php

use Illuminate\Database\Schema\Blueprint;
use Polite\Migration\Migration;

class AddTableUser extends Migration
{
    /**
     * Do the migration.
     */
    public function up()
    {
        $this->schema->create('users', function (Blueprint $table) {
        });
    }

    /**
     * Undo the migration.
     */
    public function down()
    {
        Schema::drop('users');
    }
}
