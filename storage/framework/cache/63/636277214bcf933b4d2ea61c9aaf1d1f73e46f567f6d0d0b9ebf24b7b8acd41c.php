<?php

/* index\index.html */
class __TwigTemplate_8ee0c150a3d4de40f4d66233ee04b7d2a81a354ba5311252a38ae7ed1a46ea87 extends Twig_Template
{
    private $source;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>yaf demo</title>
</head>
<body>
<div>
    ";
        // line 11
        echo twig_escape_filter($this->env, ($context["content"] ?? null), "html", null, true);
        echo " I am ";
        echo twig_escape_filter($this->env, ($context["name"] ?? null), "html", null, true);
        echo "
</div>
</body>
</html>

";
    }

    public function getTemplateName()
    {
        return "index\\index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 11,  23 => 1,);
    }

    public function getSourceContext()
    {
        return new Twig_Source("<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>yaf demo</title>
</head>
<body>
<div>
    {{content}} I am {{name}}
</div>
</body>
</html>

", "index\\index.html", "D:\\item\\yaf-test\\resources\\views\\index\\index.html");
    }
}
