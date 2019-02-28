<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2019/2/27
 * Time: 11:29.
 */
class CsrfPlugin extends Yaf\Plugin_Abstract
{
    public function routerStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
        if ($request->getMethod() !== 'GET') {
            $except = include APPLICATION_PATH.'/conf/verifycsrftoken.php';
            if (!in_array($request->getRequestUri(), $except)) {
                try {
                    Csrf::check('csrf_token', Request($request), true, 60 * 10, false);
                    // Run CSRF check, on POST data, in exception mode, with a validity of 10 minutes, in one-time mode.
                    // form parsing, DB inserts, etc.
                } catch (Exception $e) {
                    // CSRF attack detected
                    throw new Exception($e->getMessage());
                }
            }
        }
    }

    public function routerShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
    }

    public function dispatchLoopStartup(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
    }

    public function preDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
    }

    public function postDispatch(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
    }

    public function dispatchLoopShutdown(Yaf\Request_Abstract $request, Yaf\Response_Abstract $response)
    {
    }
}
