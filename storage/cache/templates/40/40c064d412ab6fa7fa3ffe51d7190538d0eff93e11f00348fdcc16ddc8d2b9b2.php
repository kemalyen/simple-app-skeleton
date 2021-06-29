<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* home.twig */
class __TwigTemplate_30f14d664fcd2040358fbc8f4e5d0c3aef737a5f2d589659e459c9a49361df0b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.twig", "home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
    <h1>Welcome to the blog!</h1>

    <p>Have a look at our articles:</p>
    <form id=\"loginForm\" action=\"/\" method=\"post\">
        <div class=\"form-group\">
            <label for=\"email\">Email address</label>
            <input class=\"form-control\" name=\"email\" id=\"email\" type=\"email\" value=\"\" placeholder=\"Your Email\" autocomplete=\"off\" length=\"255\" minlength=\"7\" maxlength=\"255\" size=\"80\" required=\"required\" />
        </div>
        <div class=\"form-group\">
            <label for=\"password\">Password</label>
            <input class=\"form-control\" name=\"password\" id=\"password\" type=\"password\" value=\"\"  placeholder=\"Your Password\" autocomplete=\"off\" length=\"255\" minlength=\"10\" maxlength=\"255\" size=\"80\" required=\"required\" />
        </div>
        <input name=\"security\" id=\"security\" type=\"hidden\" value=\"\" />
        <button type=\"submit\" class=\"btn btn-primary\">Login</button>
    </form>
    
    <ul class=\"collection\">

        ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["articles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["article"]) {
            // line 24
            echo "            <li class=\"collection-item avatar\">

                <i class=\"mdi-editor-insert-comment circle\"></i>

                <span class=\"title\">";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "title", [], "any", false, false, false, 28), "html", null, true);
            echo "</span>

                <p>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "content", [], "any", false, false, false, 30), "html", null, true);
            echo "</p>

                <p><a href=\"/article/";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["article"], "id", [], "any", false, false, false, 32), "html", null, true);
            echo "\">Read more</a></p>

            </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['article'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
    </ul>

    <hr/>

    <p>
        To view the articles list in the CLI, run the following command:
    </p>

    <div class=\"card-panel grey darken-3\" style=\"color: white\">
        <pre><code>php console.php articles</code></pre>
    </div>

";
    }

    public function getTemplateName()
    {
        return "home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  101 => 36,  91 => 32,  86 => 30,  81 => 28,  75 => 24,  71 => 23,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'layout.twig' %}

{% block content %}

    <h1>Welcome to the blog!</h1>

    <p>Have a look at our articles:</p>
    <form id=\"loginForm\" action=\"/\" method=\"post\">
        <div class=\"form-group\">
            <label for=\"email\">Email address</label>
            <input class=\"form-control\" name=\"email\" id=\"email\" type=\"email\" value=\"\" placeholder=\"Your Email\" autocomplete=\"off\" length=\"255\" minlength=\"7\" maxlength=\"255\" size=\"80\" required=\"required\" />
        </div>
        <div class=\"form-group\">
            <label for=\"password\">Password</label>
            <input class=\"form-control\" name=\"password\" id=\"password\" type=\"password\" value=\"\"  placeholder=\"Your Password\" autocomplete=\"off\" length=\"255\" minlength=\"10\" maxlength=\"255\" size=\"80\" required=\"required\" />
        </div>
        <input name=\"security\" id=\"security\" type=\"hidden\" value=\"\" />
        <button type=\"submit\" class=\"btn btn-primary\">Login</button>
    </form>
    
    <ul class=\"collection\">

        {% for article in articles %}
            <li class=\"collection-item avatar\">

                <i class=\"mdi-editor-insert-comment circle\"></i>

                <span class=\"title\">{{ article.title }}</span>

                <p>{{ article.content }}</p>

                <p><a href=\"/article/{{ article.id }}\">Read more</a></p>

            </li>
        {% endfor %}

    </ul>

    <hr/>

    <p>
        To view the articles list in the CLI, run the following command:
    </p>

    <div class=\"card-panel grey darken-3\" style=\"color: white\">
        <pre><code>php console.php articles</code></pre>
    </div>

{% endblock %}
", "home.twig", "/Users/erikpoehler/Sites/simple/templates/home.twig");
    }
}
