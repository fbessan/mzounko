<?php

/* ::layout.html.twig */
class __TwigTemplate_76f592e2a31a754d8b96d82d6b43d17bcb0bb15d4391b1b01cd4f471d7749379 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'header_top' => array($this, 'block_header_top'),
            'body' => array($this, 'block_body'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"fr\">
  <head>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <meta name=\"description\" content=\" Site de vente et d'achat de dechets\">
    <meta name=\"author\" content=\"Takka\">
    <title>";
        // line 9
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 10
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 23
        echo "</head><!--/head-->
  
  <body>
     <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
 ";
        // line 28
        $this->displayBlock('header_top', $context, $blocks);
        // line 66
        echo "          
              
 ";
        // line 68
        $this->displayBlock('body', $context, $blocks);
        // line 152
        echo "        
 ";
        // line 153
        $this->displayBlock('footer', $context, $blocks);
        // line 161
        echo "<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
<!-- Scripts
–––––––––––––––––––––––––––––––––––––––––––––––––– -->

  ";
        // line 167
        $this->displayBlock('javascripts', $context, $blocks);
        // line 171
        echo "
</html>";
    }

    // line 9
    public function block_title($context, array $blocks = array())
    {
        echo "  M-zounkô ";
    }

    // line 10
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 11
        echo "        <!-- FONT
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/font-awesome.min.css"), "html", null, true);
        echo "\" type='text/css'>
      <!-- CSS
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/normalize.css"), "html", null, true);
        echo "\">
      <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/skeleton.css"), "html", null, true);
        echo "\">
      <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/50h.css"), "html", null, true);
        echo "\">
       <!-- Favicon
      –––––––––––––––––––––––––––––––––––––––––––––––––– -->
      <link rel=\"icon\" type=\"image/png\" href=\"images/favicon.png\">
    ";
    }

    // line 28
    public function block_header_top($context, array $blocks = array())
    {
        echo "      
  <nav class=\"navbar\">
    <div class=\"container\">
        <a href=\"/\"><img class=\"logo\" src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/m-zounko.png"), "html", null, true);
        echo "\" alt=\"logo\"/></a>
        <ul class=\"navbar-list\">
            <li class=\"navbar-item\">
                <a class=\"navbar-link\" href=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/"), "html", null, true);
        echo "\">Acceuil</a>
            </li>
            <li class=\"navbar-item\">
                <a class=\"navbar-link\" href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/login"), "html", null, true);
        echo "\">S'inscrire/Se Connecter</a>

            </li>
            <li class=\"navbar-item\">
                <a class=\"navbar-link\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("/contact"), "html", null, true);
        echo "\">Nous Contactez</a>
            </li>

        </ul>
    </div>
  </nav>
  
  <div class=\"section header\">
    <div class=\"container\">
      <div class=\"twelve columns stats_text\">
        <div class=\"four columns  section-description stats_fond\">
            <h2 class=\"stats\">150</h2> achat(s)
        </div>
        <div class=\"four columns section-description\">
          <h2 class=\"stats\">120</h2> vente(s)
        </div>
        <div class=\"four columns section-description\">
          <h2 class=\"stats\">695</h2> transaction(s)
        </div>
      </div>
      <h1 class=\"section-heading\">Besoin de recyclabes ?</h1>
      <h4 class=\"section-description\">Trop de déchets à faire ramasser ?</h4>
      <a class=\"button button-primary\" href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("poster"), "html", null, true);
        echo "\">Poster une annonce</a>
    </div>
  </div>
 ";
    }

    // line 68
    public function block_body($context, array $blocks = array())
    {
        // line 69
        echo "    <div class=\"container\">
    <form action=\"/\">
        <div class=\"row filters\">
            <div class=\"three columns\">
                <div class=\"field-group\">
                    <label for=\"type_annonce\">Type d'annonces</label>
                    <select class=\"type_annonce\" id=\"type_annonce\" name=\"type_annonce\">
                        <option value=\"\">Tous</option>
                        <option value=\"Achat\">Achat</option>
                        <option selected value=\"Vente\">Vente</option>
                    </select>
                </div>
            </div>
            <div class=\"three columns\">
                <div class=\"field-group\">
                    <label for=\"type\">Categorie</label>
                    <select class=\"categorie\" id=\"categorie\" name=\"categorie\">
                      <option value=\"\">Toutes</option>
                      <option selected value=\"metal\">Metal</option>
                      <option value=\"Sachet plastique\">Sachet plastique</option>
                      <option value=\"Sachet plastique\">Sachet plastique</option>
                      <option value=\"Bouteille bouteille\">Bouteille plastique</option>
                      <option value=\"Verre\">Verre</option>
                      <option value=\"Electronique\">Electronique</option>
                      <option value=\"Papier\">Papier</option>
                      <option value=\"Huile\">Huile</option>
                    </select>
                </div>
            </div>           
                <div class=\"three columns\">
                    <div class=\"field-group\">
                        <label for=\"status\">Status</label>
                        <select class=\"status\" id=\"status\" name=\"status\">
                          <option value=\"\">Tous</option>
                          <option value=\"0\">Nouveau</option>
                          <option value=\"1\">En cours</option>
                          <option value=\"2\">Terminé</option>
                        </select>
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
      <h3 class=\"center\">300 Offres en cours </h3>
      <dl class=\"dix_derniers\">
        <dt>#002369 - 100 kg de bouteilles plastique <span class=\"label label-type annonce_status\">Achat</span><span class=\"label label-info annonce_status\">Bouteille plastique</span><span class=\"label label-primary annonce_status\">Nouveau</span><span class=\"badge annonce_status\">10FCA/Kg</span><span class=\"badge annonce_status\">100Kg</span></dt>
        <dd>
          <p>Nous recherchons pour une société 100 kg de bouteilles de Fifa pour d'ici le 19  Septembre 2015.</p> 
          <p class=\"center\"><a class=\"button\" href=\"";
        // line 126
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("repondre"), "html", null, true);
        echo "\">Répondre à l'annonce #002369</a></p>
        </dd>
        <dt>#002368 - 100 kg de métaux <span class=\"label label-type annonce_status\">Achat</span><span class=\"label label-info annonce_status\">Metal</span><span class=\"label label-primary annonce_status\">Nouveau</span><span class=\"badge annonce_status\">20FCA/Kg</span><span class=\"badge annonce_status\">100Kg</span></dt>
        <dd>
          <p>La société cherche de toute urgence du fer 8 millimètre.</p>
          <p class=\"center\"><a class=\"button\" href=\"";
        // line 131
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("repondre"), "html", null, true);
        echo "\">Répondre à l'annonce 002368</a></p>
        </dd>
        <dt>#002350 - 500g de sachets plastiques <span class=\"label label-type annonce_status\">Achat</span><span class=\"label label-info annonce_status\">Sachet plastique</span><span class=\"label label-success annonce_status\">En cours</span><span class=\"badge annonce_status\">5FCA/g</span><span class=\"badge annonce_status\">500g</span></dt>
        <dd>
          <p>Dans l'optique de l'organisation des fêtes de fin d'année, notre société a besoin de sachet plastique de 10 FCFA.</p>
          <p class=\"center\"><a class=\"button\" href=\"reponses.html#reponse\" id=\"voir_reponse\">Voir les réponses de l'annonce #002350</a> <a class=\"button\" href=\"repondre.html#reponse\" id=\"repondre_annonce\">Répondre à l'annonce #002350</a></p>
        </dd>
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

    // line 153
    public function block_footer($context, array $blocks = array())
    {
        // line 154
        echo "    <div class=\"footer\">
        <div class=\"container\">
            <p>&copy 2015 - Takanons</p>
        </div>
    </div>

 ";
    }

    // line 167
    public function block_javascripts($context, array $blocks = array())
    {
        // line 168
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery-2.1.4.min.js"), "html", null, true);
        echo "\"></script>
    <script src=\"";
        // line 169
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/50h.js"), "html", null, true);
        echo "\"></script>
  ";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  286 => 169,  281 => 168,  278 => 167,  268 => 154,  265 => 153,  240 => 131,  232 => 126,  173 => 69,  170 => 68,  162 => 63,  137 => 41,  130 => 37,  124 => 34,  118 => 31,  111 => 28,  102 => 18,  98 => 17,  94 => 16,  88 => 13,  84 => 11,  81 => 10,  75 => 9,  70 => 171,  68 => 167,  60 => 161,  58 => 153,  55 => 152,  53 => 68,  49 => 66,  47 => 28,  40 => 23,  38 => 10,  34 => 9,  25 => 2,);
    }
}
