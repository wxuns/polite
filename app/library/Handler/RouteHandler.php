<?php 
/**
 * 多域名处理
 */
namespace Handler;

class RouteHandler implements \Yaf\Route_Interface
{
	public $domain = '';
	private $module = '';
	private $ini = '';
	private $uri = '';
    private $item = '';

	public function __construct($host,$dispatcher)
	{
		$this->domain = $host;
        $this->module = str_replace('.','', $host);
        $this->ini = new \Yaf\Config\Ini(APPLICATION_PATH.'/conf/apianycc.ini', ini_get('yaf.environ'));
        $this->uri = $dispatcher->getRequest()->getRequestUri();
        //路由接管
        if($this->ini->apianycc->{ltrim($this->uri,'/')}){
            $this->item = $this->ini->apianycc->{ltrim($this->uri,'/')};
            $this->route($dispatcher->getRequest());
        }else{
            //默认 '/' 路由
            $route = new \Yaf\Route\Rewrite('/', [
                    'module'=>$this->module,
                    'controller'=>'Index',
                    'action'=>'index'
                ]);
            $dispatcher->getRouter()->addRoute('/', $route);
        }
	}

	public function assemble(array $info,array $query = null)
	{
	    return true;
	}

	public function route($request)
	{
        if (!$request->isCli()) {
            $request->module = $this->module;
            dump($this->ini);
        }
	}
}