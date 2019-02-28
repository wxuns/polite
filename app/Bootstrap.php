<?php
/**
 * @name Bootstrap
 *
 * @author Administrator
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 *
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract
{
    protected static $config = '';

    /**
     * composer自动加载.
     */
    public function _initLoad()
    {
        Yaf\Loader::import(APPLICATION_PATH.'/vendor/autoload.php');
    }

    /**
     * 配置.
     */
    public function _initConfig()
    {
        //把配置保存起来
        $arrConfig = Yaf\Application::app()->getConfig();
        Yaf\Registry::set('config', $arrConfig);
        $this::$config = Yaf\Registry::get('config');
    }

    /**
     * whoops报错.
     */
    public function _initErrors()
    {
        $config = $this::$config;
        $whoops = new Whoops\Run();
        $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler()); //whoops json报错
        if ($config->application->error->log) {
            $whoops->pushHandler(new \Handler\ResponseHandler()); //记录错误日志
        }

        $whoops->register();
    }

    /**
     * CSRF.
     *
     * @param \Yaf\Dispatcher $dispatcher
     */
    public function _initCsrf(Yaf\Dispatcher $dispatcher)
    {
        //csrf验证
        class_alias('\Tool\Csrf', 'Csrf');
        $csrf = new CsrfPlugin();
        $dispatcher->registerPlugin($csrf);
    }

    /**
     * 插件.
     *
     * @param \Yaf\Dispatcher $dispatcher
     */
    public function _initPlugin(Yaf\Dispatcher $dispatcher)
    {
        //注册一个插件
        $objSamplePlugin = new SamplePlugin();
        $dispatcher->registerPlugin($objSamplePlugin);
    }

    /**
     * 路由.
     *
     * @param \Yaf\Dispatcher $dispatcher
     */
    public function _initRoute(Yaf\Dispatcher $dispatcher)
    {
        $router = $dispatcher->getRouter();
        $config = new \Yaf\Config\Ini(APPLICATION_PATH.'/conf/routes.ini', ini_get('yaf.environ'));
        $router->addConfig($config->routes);
    }

    /**
     * 视图.
     *
     * @param \Yaf\Dispatcher $dispatcher
     */
    public function _initTwig(Yaf\Dispatcher $dispatcher)
    {
        $twig = new \Twig\Adapter($this::$config->application->view->template, $this::$config->twig->toArray());
        $dispatcher->getInstance()->setView($twig);
    }

    /**
     * 数据库.
     */
    public function _initDB()
    {
        $config = $this::$config->database;
        $capsule = new \Illuminate\Database\Capsule\Manager();
        $capsule->addConnection($config->toArray());
        //保存数据库日志
        if ($this::$config->application->database->log) {
            $capsule->setEventDispatcher(new \Provider\ServiceProvider());
        }
        $capsule->setAsGlobal();
        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
        class_alias('\Illuminate\Database\Capsule\Manager', 'DB');
    }
}
