<?php

/* base.html.twig */
class __TwigTemplate_aa6dbc5318d51d61689ecb412a85364090b36fcd3f0a5fb085e8e362a59c65a5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'keywords' => array($this, 'block_keywords'),
            'description' => array($this, 'block_description'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"keywords\" content=\"";
        // line 5
        $this->displayBlock('keywords', $context, $blocks);
        echo "\" />
    <meta name=\"description\" content=\"";
        // line 6
        $this->displayBlock('description', $context, $blocks);
        echo "\" />
    <meta name=\"revised\" content=\"Zrone, 2016-01-14 14:49:52\" />
    <link rel=\"stylesheet\" href=\"bootstrap/dist/css/bootstrap.css\">
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
</head>
<body>
";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 13
        echo "</body>
<script src=\"//cdn.bootcss.com/jquery/1.11.1/jquery.min.js\"></script>
<script src=\"bootstrap/dist/js/bootstrap.min.js/\"></script>
</html>";
    }

    // line 5
    public function block_keywords($context, array $blocks = array())
    {
    }

    // line 6
    public function block_description($context, array $blocks = array())
    {
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  69 => 12,  64 => 9,  59 => 6,  54 => 5,  47 => 13,  45 => 12,  39 => 9,  33 => 6,  29 => 5,  23 => 1,);
    }
}
/* <!doctype html>*/
/* <html lang="en">*/
/* <head>*/
/*     <meta charset="UTF-8">*/
/*     <meta name="keywords" content="{% block keywords %}{% endblock %}" />*/
/*     <meta name="description" content="{% block description %}{% endblock %}" />*/
/*     <meta name="revised" content="Zrone, 2016-01-14 14:49:52" />*/
/*     <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">*/
/*     <title>{% block title %}{% endblock %}</title>*/
/* </head>*/
/* <body>*/
/* {% block body %}{% endblock %}*/
/* </body>*/
/* <script src="//cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script>*/
/* <script src="bootstrap/dist/js/bootstrap.min.js/"></script>*/
/* </html>*/
