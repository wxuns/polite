<?php
/**
 * @name IndexController
 * @author Administrator
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends Yaf\Controller_Abstract {

	/**
     * 默认动作
     * Yaf支持直接把Yaf\Request\Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/Sample/index/index/index/name/Administrator 的时候, 你就会发现不同
     */
	public function indexAction($name = "Stranger") {
	    $user = DB::table('user')->where('user_id',1)->get();
	    dump($user);
		//1. fetch query
		$get = $this->getRequest()->getQuery("get", "default value");

		//2. fetch model
		$model = new SampleModel();
		//3. assign
		$this->getView()->assign("content", $model->selectSample());
		$this->getView()->assign("name", $name);

		//4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return TRUE;
	}

	public function demoAction(){
		if($msg = apcu_fetch('msg')){
			echo $msg . "</br>";
		}else{
			echo 'i am from db'. "</br>";
			apcu_add('msg','i am from apcu',20);
		}
		$redis = new Redis();
		$redis->pconnect('redis-12919.c1.asia-northeast1-1.gce.cloud.redislabs.com',12919);
		$redis->auth('CrWfT4ukslnNVs1SFXOyMxQ672BumAAI');
        if($msgs = $redis->get('msg')){
            echo $msgs;
        }else{
            echo 'i am from db';
            $redis->set('msg','i am from redis');
        }
		return false;
	}
	public function infoAction(){
	    phpinfo();
	    return false;
    }
}
