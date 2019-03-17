<?php 
/**
 * 多域名处理
 */
namespace Handler;

class RouteHandler implements \Yaf\Route_Interface 
{
	public $domain = '';
	public function __construct($host)
	{
		$this->domain = $host;
		$host_arr = (explode('.', $host));
		foreach ($host_arr as $key => $value) {
			$host_arr[$key] = ucwords($value);
		};
		$module = implode('', $host_arr);
	}

	public function addRoute($name,$route)
	{
		if (!$request->isCli()) {
			# code...
		}
	}

	public function assemble(array $info,array $query = null)
	{

	}

	public function route($request)
	{
		dump($request);
	}
}