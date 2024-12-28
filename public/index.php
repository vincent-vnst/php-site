<?php

// on récupère l'uri réécrite
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// affichage de $uri
echo "<b>uri</b> : $uri <br/>";
// normalement index.php se trouve à la racine de votre site
// dans le cas contraire il faut en tenir compte
// on récupère l'éventuel chemin entre localhost et public
$root = dirname($_SERVER['PHP_SELF']);
$root = $root == '\\' ? '' : $root;
// affichage de $root
echo "<b>root</b> : $root <br/>";

// on supprime le $root à $uri
$uri = str_replace(strtolower($root), '', $uri);
// affichage de $uri sans le $root
echo "<b>uri</b> : $uri <br/>";

// affichage des paramètres
echo "<b>\$_GET</b> : ";
var_dump($_GET);
echo "<br/>";

// Routes du site
$routes = [];
// $routes[] = [path, name, [controller, action]];
// path : uri de la ressource
// name : clé unique de la route
$routes[] = ['/', 'home.index', ['home', 'index']];
$routes[] = ['/personnes', 'personne.index', ['personne', 'index']];
$routes[] = ['/ajouter-personne', 'personne.create', ['personne', 'create']];
$routes[] = ['/afficher-personne', 'personne.show', ['personne', 'show']];
$routes[] = ['/modifier-personne', 'personne.update', ['personne', 'update']];
$routes[] = ['/supprimer-personne', 'personne.delete', ['personne', 'delete']];

// permet de rechercher la route correspondant à l'uri
$route = array_reduce($routes, fn($s, $r) => $r[0] == $uri ? $r : $s);
// affichage de la route
echo '<b>route :</b><pre>';
var_dump($route);
echo '</pre><br/>';

// permet de générer l'uri à partir du nom de la route
// route('personne.index') => '/personnes'
// route('personne.show', ['id'=>1]) => '/afficher-personne?id=1'
function route(string $name, array $vars = [])
{
    global $routes;
    global $root;
    $params = $vars == [] ? '' : '?' . http_build_query($vars, '', '&');

    foreach ($routes as $route) {
        if ($route[1] == $name)
            return $root . $route[0] . $params;
    }
    return '';
}

// affichage de la génération d'une route
echo "<b>route('personne.show', ['id'=>1])</b> : " . route('personne.show', ['id' => 1]) . '<br/>';

?>

<nav>
    <ul>
        <li><a href='<?= route('home.index') ?>'>Accueil</a></li>
        <li><a href='<?= route('personne.index') ?>'>Personnes</a></li>
        <li><a href='<?= route('personne.show', ['id' => 1]) ?>'>Afficher la personne 1</a></li>
    </ul>
</nav>