<h1>Récupération des informations nécessaire à la gestion des routes</h1>
<?php

// on récupère l'uri réécrite
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
// affichage de $uri
echo "<b>uri depuis localhost</b> : $uri <br/>";

// normalement index.php se trouve à la racine de votre site
// dans le cas contraire il faut en tenir compte
// on récupère l'éventuel chemin entre localhost et public
$root = dirname($_SERVER['PHP_SELF']);
$root = $root == '\\' ? '' : $root;
// affichage de $root
echo "<b>root éventuelle</b> : $root <br/>";

// on supprime le $root de $uri
$uri = str_replace($root, '', $uri);
// affichage de $uri sans le $root
echo "<b>uri sans le root</b> : $uri <br/>";

// Routes du site
$routes = [];
// $routes[] = [path, name, [controller, action]];
$routes[] = ['/', 'home.index', ['home', 'index']];
// path : uri de la ressource. {id} indique qu'il y a un paramètre appelé id
// name : clé unique de la route
// controller : dossier où se trouve réellement la ressource
// action : nom du fichier de la ressource sans son extension
$routes[] = ['/personnes', 'personne.index', ['personne', 'index']];
$routes[] = ['/ajouter-personne', 'personne.create', ['personne', 'create']];
$routes[] = ['/afficher-personne-{id}', 'personne.show', ['personne', 'show']];
$routes[] = ['/modifier-personne-{slug}', 'personne.update', ['personne', 'update']];
$routes[] = ['/supprimer-personne-{id}-{slug}', 'personne.delete', ['personne', 'delete']];

// permet de rechercher la route correspondant à l'uri
function getRoute($routes, $uri)
{
    foreach ($routes as $route) {
        // pattern pour retrouver les paramettres : -{id}-{slug} --> id et slug
        $pattern = '/-{([^}]+)}/';

        // pattern verifiant le lien entre path et uri : 
        // à partir de : /afficher-personne-{id}-{slug}
        // on crée le pattern : /afficher-personne-[^-]+-[^-]+
        // permet de matcher avec : /afficher-personne-1-dupont
        $pattern = '/^\\' . preg_replace($pattern, '-[^-]+', $route[0]) . '$/';

        if (preg_match($pattern, $uri))
            return $route;
    }
    return null;
}
$route = getRoute($routes, $uri);

// affichage de la route
echo '<b>route :</b><pre>';
var_dump($route);
echo '</pre><br/>';

// permet de retourner la valeur d'un paramètre
function getParams($key)
{
    global $route;
    global $uri;
    // récupère la partie fixe de la route
    $pattern = '/-{([^}]+)}/';
    $fixe = preg_replace($pattern, '', $route[0]);

    // récupère les paramètres du path de la route    
    preg_match_all($pattern, $route[0] ?? '', $keys);

    // récupère la partie variable de l'uri
    $variables = str_replace($fixe, '', $uri);

    // récupère les valeurs des paramètres de l'uri
    $pattern = "/-([^-]+)/";
    preg_match_all($pattern, $variables, $values);

    // génére un tableau associatif avec les keys et les values
    $params = array_combine($keys[1], $values[1]);

    // on retourne la valeur correspondant à la clé
    return $params[$key] ?? null;
}
echo "<b>id = </b> " . getParams('id') . "<br/>";
echo "<b>slug = </b> " . getParams('slug') . "<br/>";


// permet de générer l'uri à partir de la clé de la route
// route('personne.index') => '/personnes'
// route('personne.show', ['id'=>1]) => '/afficher-personne-1'
function route(string $name, array $vars = [])
{
    global $routes;
    global $root;

    foreach ($routes as $route) {

        if ($route[1] == $name) {

            foreach ($vars as $key => $val) {
                $route[0] = str_replace('{' . $key . '}', $val, $route[0]);
            }
            return $root . $route[0];
        }
    }

    return '';
}

?>

<nav>
    <ul>
        <li>
            <a href='<?= route('home.index') ?>'>
                route('home.index')
            </a>
        </li>
        <li>
            <a href='<?= route('personne.index') ?>'>
                route('personne.index')
            </a>
        </li>
        <li>
            <a href='<?= route('personne.show', ['id' => 1]) ?>'>
                route('personne.show', ['id' => 1])
            </a>
        </li>
        <li>
            <a href='<?= route('personne.update', ['slug' => 'dupont']) ?>'>
                route('personne.update', ['slug' => 'dupont'])
            </a>
        </li>
        <li>
            <a href='<?= route('personne.delete', ['id' => 3, 'slug' => 'dupont']) ?>'>
                route('personne.delete', ['id' => 3, 'slug' => 'dupont'])
            </a>
        </li>

    </ul>
</nav>