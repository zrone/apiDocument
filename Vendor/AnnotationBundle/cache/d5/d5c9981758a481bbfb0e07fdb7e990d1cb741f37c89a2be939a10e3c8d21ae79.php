<?php

/* apiDoc.html.twig */
class __TwigTemplate_eb628f3e510931ca0e5fe1b2d1fadc9e15f8fc7c2da0b86c718c550946d4a136 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "apiDoc.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["title"]) ? $context["title"] : null), "title", array()), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "apiDoc.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,  11 => 1,);
    }
}
/* {% extends "base.html.twig" %}*/
/* {% block title %}*/
/*     {{ title.title }}*/
/* {% endblock %}*/
