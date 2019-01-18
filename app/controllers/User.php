<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/8/5
 * Time: 15:45.
 */
class UserController extends BaseController
{
    public function init()
    {
    }

    public function signupAction()
    {
        $hello = new \Tool\Hello();
        echo $hello->world();

        return false;
    }
}
