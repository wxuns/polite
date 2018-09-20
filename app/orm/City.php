<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/9/14
 * Time: 9:21
 */
namespace App\ORM;
class City extends \App\ORM\Model{
    protected $table = "city";
    protected $primaryKey = "ID";
    public $timestamps = false;
}