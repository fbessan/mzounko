<?php

/* TwigBundle:Exception:error.html.twig */
class __TwigTemplate_336bf1f14cc68c8af83f780a05907cf3dc3b32c5e30e76f19ebd238230e9c121 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("::layout.html.twig", "TwigBundle:Exception:error.html.twig", 3);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "  M-zounkô : ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : null), "html", null, true);
        echo " ";
    }

    // line 6
    public function block_body($context, array $blocks = array())
    {
        // line 7
        echo "   <h1>Oups! Une erreur est survenue</h1>
   <h2>Le serveur a retourné une erreur \"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : null), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : null), "html", null, true);
        echo "\". Veuillez verifier votre action.</h2>  
";
    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  43 => 8,  40 => 7,  37 => 6,  29 => 4,  11 => 3,);
    }
}
