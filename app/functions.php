<?php

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

// permet de générer l'uri à partir du nom de la route
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

// permet d'appeler la vue en fonction de sa clé
function view($name, $vars = [])
{
    extract($vars);
    $url = str_replace(".", "/", $name);
    require "../app/views/$url.php";
}