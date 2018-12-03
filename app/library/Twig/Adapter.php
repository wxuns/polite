<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/8/14
 * Time: 22:56.
 */

namespace Twig;

class Adapter implements \Yaf\View_Interface
{
    protected static $loader;
    protected static $twig;
    protected $variables = [];

    public function __construct($template, $options)
    {
        $this::$loader = new \Twig_Loader_Filesystem($template);
        $this::$twig = new \Twig_Environment($this::$loader, $options);
    }

    /**
     * 为视图引擎分配一个模板变量, 在视图模板中可以直接通过${$name}获取模板变量值
     *
     * @param $name
     * @param null $value
     */
    public function __set($name, $value = null)
    {
        $this->variables[$name] = $value;
    }

    /**
     * 获取视图引擎的一个模板变量值
     *
     * @param $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->variables[$name];
    }

    /**
     * 为视图引擎分配一个模板变量, 在视图模板中可以直接通过${$name}获取模板变量值
     *
     * @param $name
     * @param null $value
     */
    public function assign($name, $value = null)
    {
        $this->variables[$name] = $value;
    }

    /**
     * 渲染一个视图模板, 得到结果.
     *
     * @param $view_path
     * @param null $tpl_vars
     *
     * @throws \Throwable
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     *
     * @return string
     */
    public function render($view_path, $tpl_vars = null)
    {
        if (is_array($tpl_vars)) {
            $this->variables = array_merge($this->variables, $tpl_vars);
        }

        return $this::$twig->loadTemplate($view_path)->render($this->variables);
    }

    /**
     * 渲染一个视图模板, 并直接输出给请求端.
     *
     * @param $view_path
     * @param null $tpl_vars
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function display($view_path, $tpl_vars = null)
    {
        echo $this::$twig->render($view_path, $tpl_vars);
    }

    /**
     * 设置模板的基目录|可在ini中直接设置.
     *
     * @param $view_directory
     */
    public function setScriptPath($view_directory)
    {
        $this::$loader->setPaths($view_directory);
    }

    /**
     * 获取当前的模板目录.
     */
    public function getScriptPath()
    {
        return $this::$loader->getPaths();
    }
}
