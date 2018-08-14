<?php
/**
 * Created by PhpStorm.
 * Author: wxuns <wxuns@wxuns.cn>
 * Link: http://wxuns.cn
 * Date: 2018/8/14
 * Time: 22:56
 */
namespace Twig;

class Adapter implements Yaf\View_Interface
{
    protected static $loader;
    protected static $twig;
    protected $variables = [];

    public function __construct($template,$options)
    {
        $this::$loader = new \Twig_Loader_Filesystem($template);
        $this::$twig = new \Twig_Environment($this::$loader,$options);
    }

    public function assign($name,$value = NULL)
    {
        $this->variables[$name] = $value;
    }

    public function render($view_path,$tpl_vars = NULL)
    {
        if ( is_array($tpl_vars) ) {
            $this->variables = array_merge($this->variables, $tpl_vars);
        }
        return $this::$twig->render($view_path, $this->variables);
    }
    public function display()
    {

    }
}