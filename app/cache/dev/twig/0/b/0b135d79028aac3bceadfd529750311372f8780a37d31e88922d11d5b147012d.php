<?php

/* NucleusHomeBundle:Home:reponse.html.twig */
class __TwigTemplate_0b135d79028aac3bceadfd529750311372f8780a37d31e88922d11d5b147012d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("NucleusHomeBundle::layout.html.twig", "NucleusHomeBundle:Home:reponse.html.twig", 2);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NucleusHomeBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div class=\"section annonces\">
    <div class=\"container\" id=\"reponse\" >
         <h3 class=\"center\">Répondre à l'annonce #00";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["annonce"]) ? $context["annonce"] : $this->getContext($context, "annonce")), "id", array()), "html", null, true);
        echo " </h3>
    <form class=\"center\" action=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("NucleusHomeBundle_reponse", array("id" => $this->getAttribute((isset($context["annonce"]) ? $context["annonce"] : $this->getContext($context, "annonce")), "id", array()))), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
        ";
        // line 9
        echo "        ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'errors');
        echo "
        
        <div class=\"form_quantite\">
            ";
        // line 12
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "message", array()), 'row', array("attr" => array("class" => "u-full-width")));
        echo "
        </div>
        <div class=\"form_quantite\">
            ";
        // line 15
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "quantite", array()), 'row');
        echo "
        </div>
        ";
        // line 17
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "
        <input class=\"button-primary\" type=\"submit\" value=\"Répondre à l'annonce #00";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["annonce"]) ? $context["annonce"] : $this->getContext($context, "annonce")), "id", array()), "html", null, true);
        echo "\">
    </form>

    </div> 
    </div>   
      
 ";
    }

    public function getTemplateName()
    {
        return "NucleusHomeBundle:Home:reponse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 18,  63 => 17,  58 => 15,  52 => 12,  45 => 9,  39 => 7,  35 => 6,  31 => 4,  28 => 3,  11 => 2,);
    }
}
