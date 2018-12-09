<?php

namespace Handler;

use Whoops\Handler\Handler;

class ResponseHandler extends Handler
{
    public static $config = '';

    public function __construct()
    {
        $this::$config = \Yaf\Registry::get('config')->application;
    }

    /**
     * @return int|null A handler may return nothing, or a Handler::HANDLE_* constant
     */
    public function handle()
    {
        // TODO: Implement handle() method.
        $exception = $this->getException();
        $this->saveLog($exception);
    }

    /**
     * 日志保存.
     *
     * @param $e
     */
    public function saveLog($e)
    {
        \SeasLog::setBasePath($this::$config->log->path);
        \SeasLog::setLogger('error');
        \SeasLog::log('yaf.error', $e->getMessage().' | '.$e->getFile().' in line '.$e->getLine());
    }
}
