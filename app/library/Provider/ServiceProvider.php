<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/9/16
 * Time: 18:22
 */
namespace Provider;
class ServiceProvider extends \Illuminate\Support\ServiceProvider{
    public function __construct()
    {
        $this->boot();
    }
    public function boot()
    {
        \Illuminate\Support\Facades\DB::listen(function ($query) {
        // $query->sql
        // $query->bindings
        // $query->time
            dump($query);
        });
    }
    public function register()
    {

    }
}