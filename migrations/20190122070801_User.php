<?php

use Phpmig\Migration\Migration;

class User extends Migration
{
    /**
     * Do the migration
     */
    public function up()
    {
        $sql = "ALTER TABLE `lol_cats` ADD COLUMN `rating` INT(10) UNSIGNED NULL";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }

    /**
     * Undo the migration
     */
    public function down()
    {
        $sql = "ALTER TABLE `lol_cats` DROP COLUMN `rating`";
        $container = $this->getContainer();
        $container['db']->query($sql);
    }
}
