<?php
/**
 * @name IndexController
 *
 * @author Administrator
 * @desc 默认控制器
 *
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class IndexController extends BaseController
{
    /**
     * 默认动作
     * Yaf支持直接把Yaf\Request\Abstract::getParam()得到的同名参数作为Action的形参
     * 对于如下的例子, 当访问http://yourhost/Sample/index/index/index/name/Administrator 的时候, 你就会发现不同.
     */
    public function indexAction($name = 'Polite')
    {
        $model = new SampleModel();
        $this->getView()->assign('content', $model->selectSample());
        $this->getView()->assign('name', $name);
        //4. render by Yaf, 如果这里返回FALSE, Yaf将不会调用自动视图引擎Render模板
        return true;
    }

    public function infoAction()
    {
        return false;
    }
}
