<?php

/* AcmeUserBundle:Default:index.html.twig */
class __TwigTemplate_306088e73402713012b7a156e14e0309469408e579c57c7cc753b23926bedf35 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
    <head><title>HOla</title></head>
    <body>
        
        
        
        
        <div class=\"col-md-9\">
            <form action=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("form_check");
        echo "\" method=\"post\">
                <label for=\"username\">Username:</label>
                <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
        echo "\" />

                <label for=\"password\">Password:</label>
                <input type=\"password\" id=\"password\" name=\"_password\" />

    ";
        // line 21
        echo "
                <button type=\"submit\">login</button>
            </form>
        </div>
    
    
    
    
    ";
        // line 29
        if ((isset($context["error"]) ? $context["error"] : null)) {
            // line 30
            echo "            <div class=\"col-md-3\">
                ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : null), "message"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 34
        echo "        
        
        
        
        <a href=\"";
        // line 38
        echo $this->env->getExtension('routing')->getPath("registro");
        echo "\"<button>Registrar</button></a>
        
        
        
        
        
        
    </body>
</html>";
    }

    public function getTemplateName()
    {
        return "AcmeUserBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 38,  63 => 34,  57 => 31,  54 => 30,  52 => 29,  42 => 21,  34 => 11,  29 => 9,  19 => 1,);
    }
}
