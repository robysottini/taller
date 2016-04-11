<?php

/* base.html.twig */
class __TwigTemplate_0dd355490254bc1c867e924a373c488dd266af918cc728d703282daf24c2f609 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1a9aaad70a2c8e0091e87c37ab15550be26b7fb72ab029d6cd4be26da7be25d6 = $this->env->getExtension("native_profiler");
        $__internal_1a9aaad70a2c8e0091e87c37ab15550be26b7fb72ab029d6cd4be26da7be25d6->enter($__internal_1a9aaad70a2c8e0091e87c37ab15550be26b7fb72ab029d6cd4be26da7be25d6_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_1a9aaad70a2c8e0091e87c37ab15550be26b7fb72ab029d6cd4be26da7be25d6->leave($__internal_1a9aaad70a2c8e0091e87c37ab15550be26b7fb72ab029d6cd4be26da7be25d6_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_12bbe8103088b230d3aa09efa11a929a3186f96f9211c1bbcd3a518036732609 = $this->env->getExtension("native_profiler");
        $__internal_12bbe8103088b230d3aa09efa11a929a3186f96f9211c1bbcd3a518036732609->enter($__internal_12bbe8103088b230d3aa09efa11a929a3186f96f9211c1bbcd3a518036732609_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_12bbe8103088b230d3aa09efa11a929a3186f96f9211c1bbcd3a518036732609->leave($__internal_12bbe8103088b230d3aa09efa11a929a3186f96f9211c1bbcd3a518036732609_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_a809f83661d6772c1ade76415482eb7bf2868039ff1da7bb9396686d568cbc39 = $this->env->getExtension("native_profiler");
        $__internal_a809f83661d6772c1ade76415482eb7bf2868039ff1da7bb9396686d568cbc39->enter($__internal_a809f83661d6772c1ade76415482eb7bf2868039ff1da7bb9396686d568cbc39_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_a809f83661d6772c1ade76415482eb7bf2868039ff1da7bb9396686d568cbc39->leave($__internal_a809f83661d6772c1ade76415482eb7bf2868039ff1da7bb9396686d568cbc39_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_09397ed8c37f24412bcf0c16f994bbfb4b842e244184d825f335a001051fc856 = $this->env->getExtension("native_profiler");
        $__internal_09397ed8c37f24412bcf0c16f994bbfb4b842e244184d825f335a001051fc856->enter($__internal_09397ed8c37f24412bcf0c16f994bbfb4b842e244184d825f335a001051fc856_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_09397ed8c37f24412bcf0c16f994bbfb4b842e244184d825f335a001051fc856->leave($__internal_09397ed8c37f24412bcf0c16f994bbfb4b842e244184d825f335a001051fc856_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_7a733890994eaa963fc8f4e1dd620ca735c231a877519ea20e33a1c9a0a318e8 = $this->env->getExtension("native_profiler");
        $__internal_7a733890994eaa963fc8f4e1dd620ca735c231a877519ea20e33a1c9a0a318e8->enter($__internal_7a733890994eaa963fc8f4e1dd620ca735c231a877519ea20e33a1c9a0a318e8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_7a733890994eaa963fc8f4e1dd620ca735c231a877519ea20e33a1c9a0a318e8->leave($__internal_7a733890994eaa963fc8f4e1dd620ca735c231a877519ea20e33a1c9a0a318e8_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
