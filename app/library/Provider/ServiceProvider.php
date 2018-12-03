<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/9/16
 * Time: 18:22.
 */

namespace Provider;

use Illuminate\Contracts\Events\Dispatcher;

class ServiceProvider implements Dispatcher
{
    protected static $config = [];

    /**
     * get config
     * ServiceProvider constructor.
     */
    public function __construct()
    {
        $this::$config = \yaf\Registry::get('config')->application;
    }

    /**
     * Register an event listener with the dispatcher.
     *
     * @param string|array $events
     * @param mixed        $listener
     *
     * @return void
     */
    public function listen($events, $listener)
    {
        // TODO: Implement listen() method.
    }

    /**
     * Determine if a given event has listeners.
     *
     * @param string $eventName
     *
     * @return bool
     */
    public function hasListeners($eventName)
    {
        // TODO: Implement hasListeners() method.
    }

    /**
     * Register an event subscriber with the dispatcher.
     *
     * @param object|string $subscriber
     *
     * @return void
     */
    public function subscribe($subscriber)
    {
        // TODO: Implement subscribe() method.
    }

    /**
     * Dispatch an event until the first non-null response is returned.
     *
     * @param string|object $event
     * @param mixed         $payload
     *
     * @return array|null
     */
    public function until($event, $payload = [])
    {
        // TODO: Implement until() method.
    }

    /**
     * Dispatch an event and call the listeners.
     *
     * @param string|object $event
     * @param mixed         $payload
     * @param bool          $halt
     *
     * @return array|null
     */
    public function dispatch($event, $payload = [], $halt = false)
    {
        if ($event instanceof  \Illuminate\Database\Events\QueryExecuted) {
            $sql = $event->sql;
            if ($event->bindings) {
                foreach ($event->bindings as $v) {
                    $sql = preg_replace('/\\?/', "'".addslashes($v)."'", $sql, 1);
                }
            }
            \SeasLog::setBasePath($this::$config->log->path);
            \SeasLog::setLogger('db');
            \SeasLog::log('DB', $sql.' | time:{time}', ['time'=>$event->time]);
        }
        // TODO: Implement dispatch() method.
    }

    /**
     * Register an event and payload to be fired later.
     *
     * @param string $event
     * @param array  $payload
     *
     * @return void
     */
    public function push($event, $payload = [])
    {
        // TODO: Implement push() method.
    }

    /**
     * Flush a set of pushed events.
     *
     * @param string $event
     *
     * @return void
     */
    public function flush($event)
    {
        // TODO: Implement flush() method.
    }

    /**
     * Remove a set of listeners from the dispatcher.
     *
     * @param string $event
     *
     * @return void
     */
    public function forget($event)
    {
        // TODO: Implement forget() method.
    }

    /**
     * Forget all of the queued listeners.
     *
     * @return void
     */
    public function forgetPushed()
    {
        // TODO: Implement forgetPushed() method.
    }

    /**
     * Fire an event and call the listeners.
     *
     * @param string|object $event
     * @param mixed         $payload
     * @param bool          $halt
     *
     * @return array|null
     */
    public function fire($event, $payload = [], $halt = false)
    {
        // TODO: Implement fire() method.
    }

    /**
     * Get the event that is currently firing.
     *
     * @return string
     */
    public function firing()
    {
        // TODO: Implement firing() method.
    }
}
