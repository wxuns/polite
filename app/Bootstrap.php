<?php
/**
 * @name Bootstrap
 * @author Administrator
 * @desc 所有在Bootstrap类中, 以_init开头的方法, 都会被Yaf调用,
 * @see http://www.php.net/manual/en/class.yaf-bootstrap-abstract.php
 * 这些方法, 都接受一个参数:Yaf\Dispatcher $dispatcher
 * 调用的次序, 和申明的次序相同
 */
class Bootstrap extends Yaf\Bootstrap_Abstract{
    /**
     * composer自动加载
     */
    public function _initLoad()
    {
        Yaf\Loader::import(APPLICATION_PATH . '/vendor/autoload.php');
    }

    /**
     * 配置
     */
    public function _initConfig()
    {
		//把配置保存起来
		$arrConfig = Yaf\Application::app()->getConfig();
		Yaf\Registry::set('config', $arrConfig);
	}

    /**
     * whoops报错
     */
    public function _initErrors()
    {
        $whoops = new Whoops\Run();
        $whoops->pushHandler(new \Whoops\Handler\JsonResponseHandler);//whoops json报错
        $whoops->register();
    }

    /**
     * 插件
     * @param \Yaf\Dispatcher $dispatcher
     */
	public function _initPlugin(Yaf\Dispatcher $dispatcher)
    {
		//注册一个插件
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

    /**
     * 路由
     * @param \Yaf\Dispatcher $dispatcher
     */
	public function _initRoute(Yaf\Dispatcher $dispatcher)
    {
		$router = $dispatcher->getRouter();
        $config = new \Yaf\Config\Ini(APPLICATION_PATH . '/conf/routes.ini', ini_get('yaf.environ'));
		$router->addConfig($config->routes);
	}

    /**
     * 视图
     * @param \Yaf\Dispatcher $dispatcher
     */
	public function _initTwig(Yaf\Dispatcher $dispatcher){
	    $config = Yaf\Registry::get('config');
	    $twig = new \Twig\Adapter($config->application->view->template,$config->twig->toArray());
	    $dispatcher->getInstance()->setView($twig);
	}
}