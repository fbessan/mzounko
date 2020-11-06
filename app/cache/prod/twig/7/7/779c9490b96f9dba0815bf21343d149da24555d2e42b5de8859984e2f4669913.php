<?php

/* NucleusHomeBundle:Home:home.html.twig */
class __TwigTemplate_779c9490b96f9dba0815bf21343d149da24555d2e42b5de8859984e2f4669913 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("NucleusHomeBundle::layout.html.twig", "NucleusHomeBundle:Home:home.html.twig", 2);
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
        echo "    <div class=\"container\">
    <form action=\"/\">
        <div class=\"row filters\">
            <div class=\"three columns\">
                <div class=\"field-group\">
                    <label for=\"type_annonce\">Types d'annonce</label>
                    <select class=\"type_annonce\" id=\"type_annonce\" name=\"type_annonce\">
                        <option value=\"\">Tous</option>
                        ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["typeannonce"]) ? $context["typeannonce"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["elt"]) {
            if (($this->getAttribute($context["elt"], "id", array()) < 3)) {
                // line 13
                echo "                            <option selected value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "id", array()), "html", null, true);
                echo "\" title=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "description", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "name", array()), "html", null, true);
                echo "</option>                      
                        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['elt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        echo "                    </select>
                </div>
            </div>
            <div class=\"three columns\">
                <div class=\"field-group\">
                    <label for=\"type\">Categorie</label>
                    <select class=\"categorie\" id=\"categorie\" name=\"categorie\">
                      <option value=\"\">Toutes</option>
                      ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["categories"]) ? $context["categories"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["elt"]) {
            // line 24
            echo "                        <option selected value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "id", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "unite", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "name", array()), "html", null, true);
            echo "</option>                      
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['elt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "                    </select>
                </div>
            </div>           
                <div class=\"three columns\">
                    <div class=\"field-group\">
                        <label for=\"status\">Status</label>
                        <select class=\"status\" id=\"status\" name=\"status\">
                          <option value=\"\">Tous</option>
                          ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["phases"]) ? $context["phases"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["elt"]) {
            // line 35
            echo "                            <option selected value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "id", array()), "html", null, true);
            echo "\" title=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "description", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "name", array()), "html", null, true);
            echo "</option>                      
                          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['elt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "                        </select>
                    </div>
                </div>
                    <div class=\"three columns\">
                        <div class=\"field-group\">
                            <label class=\"submit-label\" for=\"submit\">&nbsp;</label>
                            <input class=\"button-primary\" id=\"submit\" name=\"submit\" type=\"submit\" value=\"Recherche\">
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class=\"section annonces\">
    <div class=\"container\">
        <h3 class=\"center\">";
        // line 52
        echo twig_escape_filter($this->env, twig_length_filter($this->env, (isset($context["annonces"]) ? $context["annonces"] : null)), "html", null, true);
        echo " Offres en cours </h3>
      <dl class=\"dix_derniers\">
        ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, (isset($context["annonces"]) ? $context["annonces"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["elt"]) {
            echo "  
            <dt>#00";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "id", array()), "html", null, true);
            echo " - ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "libelle", array()), "html", null, true);
            echo "  <span class=\"label label-type annonce_status\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["elt"], "typeannonce", array()), "name", array()), "html", null, true);
            echo "</span><span class=\"label label-info annonce_status\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["elt"], "categorie", array()), "name", array()), "html", null, true);
            echo "</span><span class=\"label label-primary annonce_status\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["elt"], "phase", array()), "name", array()), "html", null, true);
            echo "</span><span class=\"badge annonce_status\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "prixunitaire", array()), "html", null, true);
            echo " F CFA / ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["elt"], "categorie", array()), "unite", array()), "html", null, true);
            echo "</span><span class=\"badge annonce_status\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "quantite", array()), "html", null, true);
            echo " ";
            if (($this->getAttribute($this->getAttribute($context["elt"], "categorie", array()), "unite", array()) == "Unité")) {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["elt"], "categorie", array()), "unite", array()), "html", null, true);
                echo "(s) ";
            } else {
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["elt"], "categorie", array()), "unite", array()), "html", null, true);
                echo " ";
            }
            echo "</span></dt>
            <dd>
              <p>";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "description", array()), "html", null, true);
            echo "</p> 
              <p class=\"center\">  ";
            // line 58
            if ((twig_length_filter($this->env, $this->getAttribute($context["elt"], "reponse", array())) > 0)) {
                echo " <a class=\"button\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("NucleusHomeBundle_reponses", array("id" => $this->getAttribute($context["elt"], "id", array()))), "html", null, true);
                echo "#reponse\" id=\"voir_reponse\">Voir les réponses de l'annonce #00";
                echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "id", array()), "html", null, true);
                echo "</a> ";
            }
            echo "<a class=\"button\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("NucleusHomeBundle_reponse", array("id" => $this->getAttribute($context["elt"], "id", array()))), "html", null, true);
            echo "#reponse\">Répondre à l'annonce #00";
            echo twig_escape_filter($this->env, $this->getAttribute($context["elt"], "id", array()), "html", null, true);
            echo "</a></p>
            </dd>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['elt'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 61
        echo "        
      </dl>
      <div class=\"pagination\">
        <ul>
          <li class=\"disabled\"><a href=\"#\">&laquo;</a></li>
          <li class=\"active\"><a href=\"#\">1</a></li>
          <li><a href=\"#\">2</a></li>
          <li><a href=\"#\">3</a></li>
          <li><a href=\"#\">4</a></li>
          <li><a href=\"#\">&raquo;</a></li>
        </ul>
      </div>
    </div>
  </div>
 ";
    }

    public function getTemplateName()
    {
        return "NucleusHomeBundle:Home:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  194 => 61,  175 => 58,  171 => 57,  142 => 55,  136 => 54,  131 => 52,  114 => 37,  101 => 35,  97 => 34,  87 => 26,  74 => 24,  70 => 23,  60 => 15,  46 => 13,  41 => 12,  31 => 4,  28 => 3,  11 => 2,);
    }
}
