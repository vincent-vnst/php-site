<?php
$routes = [];
// $routes[] = [path, name, [controller, action]];
// path : uri de la ressource. {param} indique l'utilisation d'un paramètre
// name : clé unique de la route
// controller : dossier où se trouve réllement la ressource
// action : nom du fichier de la ressource sans son extension
$routes[] = ['/', 'home.index', ['home', 'index']];
$routes[] = ['/personnes', 'personne.index', ['personne', 'index']];
$routes[] = ['/ajouter-personne', 'personne.create', ['personne', 'create']];
$routes[] = ['/afficher-personne-{id}', 'personne.show', ['personne', 'show']];
$routes[] = ['/modifier-personne-{id}', 'personne.update', ['personne', 'update']];
$routes[] = ['/supprimer-personne-{id}', 'personne.delete', ['personne', 'delete']];
