<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2019/2/21
 * Time: 11:03
 */

namespace Route;


class Route extends \Yaf\Request_Abstract implements \Yaf\Route_Interface
{
    public function assemble($info,$query = [])
    {
        return true;
    }
    public function route($request)
    {

    }
}