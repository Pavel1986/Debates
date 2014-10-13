<?php

/* ::debates/base.html.twig */
class __TwigTemplate_4188b76c6ddabbd3e33a8e6a659bac012d120f5f996157be11a5a8411a356a8c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'main_menu' => array($this, 'block_main_menu'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        ";
        // line 8
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 13
        echo "
        ";
        // line 14
        $this->displayBlock('javascripts', $context, $blocks);
        // line 21
        echo "
    </head>
    <body>

        <div id=\"structure\">

            <div id=\"header\">
                
                <img id=\"logo\" src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/images/Logo2delete.jpg"), "html", null, true);
        echo "\" />

                ";
        // line 31
        $this->displayBlock('main_menu', $context, $blocks);
        // line 41
        echo "
            </div>

            <div id=\"content\">
            ";
        // line 45
        $this->displayBlock('body', $context, $blocks);
        // line 46
        echo "        </div>

    </div>

</body>
</html>";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Test Application";
    }

    // line 8
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 9
        echo "            <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/css/ui-lightness/jquery-ui-1.10.4.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
            <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />            
            <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/css/jquery.validator.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" />
        ";
    }

    // line 14
    public function block_javascripts($context, array $blocks = array())
    {
        echo "            
            <script src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/js/jquery-1.10.2.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/js/jquery-ui-1.10.4.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/js/validator.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/js/md5.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/deb/js/common.js"), "html", null, true);
        echo "\"></script>            
        ";
    }

    // line 31
    public function block_main_menu($context, array $blocks = array())
    {
        // line 32
        echo "                    <div id=\"menu\">

                        <a href=\"";
        // line 34
        echo $this->env->getExtension('routing')->getPath("topics_list");
        echo "\">Home</a>
                        <a href=\"";
        // line 35
        echo $this->env->getExtension('routing')->getPath("topic_detail");
        echo "\">Detail</a>
                        <a href=\"";
        // line 36
        echo $this->env->getExtension('routing')->getPath("info_page");
        echo "\">Info Page</a>
                        <a href=\"";
        // line 37
        echo $this->env->getExtension('routing')->getPath("personal_section");
        echo "\">Personal Section</a>

                    </div>
                ";
    }

    // line 45
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::debates/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 45,  146 => 37,  142 => 36,  138 => 35,  134 => 34,  130 => 32,  127 => 31,  121 => 19,  117 => 18,  113 => 17,  109 => 16,  105 => 15,  100 => 14,  94 => 11,  90 => 10,  85 => 9,  82 => 8,  76 => 6,  67 => 46,  65 => 45,  59 => 41,  57 => 31,  52 => 29,  42 => 21,  40 => 14,  37 => 13,  35 => 8,  30 => 6,  24 => 2,  31 => 4,  28 => 3,);
    }
}
