<?php
/**
 * Created by L.
 * Author: wxuns
 * Link: https://www.wxuns.cn
 * Date: 2018/9/20
 * Time: 14:43
 */

namespace Handler;


class SystemFacade extends \Whoops\Util\SystemFacade
{
    public function __construct() {
        $this->initSystemHandlers();
    }
    public function initSystemHandlers() {;
        set_error_handler([$this,'handleError']);
        set_exception_handler([$this,'handleException']);
    }
    /**
     *  接管错误处理
     *  系统出错时将调用并传递 4 个参数 , 错误号 , 代码 , 行 , 及文件
     *  为统一处理 , 把错误包装成异常抛出 .
     */
    public function handleError($errno,$errstr,$errfile,$errline) {
        throw new \ErrorException($errstr,$errno,$errno,$errfile,$errline);
    }
    /**
     *  接管异常处理
     *
     */
    public function handleException($exception) {
        //  禁止再处理错误或异常 , 防止递归
//        restore_error_handler();
//        restore_exception_handler();
        /*  再把交给另一个方法输出
        */
        $this->handler($exception);
    }
    /**
     *  输出异常
     */
    public function handler($exception) {
        $fileName=$exception->getFile();
        $errorLine=$exception->getLine();
        $trace = $exception->getTrace();
        if($exception instanceof \ErrorException) {
            array_shift($trace);
        }
        foreach($trace as $i=>$t) {
            if(!isset($t['file']))
                $trace[$i]['file']='unknown';
            if(!isset($t['line']))
                $trace[$i]['line']=0;
            if(!isset($t['function']))
                $trace[$i]['function']='unknown';
            unset($trace[$i]['object']);
        }
        file_put_contents(APPLICATION_PATH . '/2321.txt',$trace);
        restore_exception_handler();
        print_r($trace);
        echo '</pre>';
    }
}