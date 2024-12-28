<?php
require 'bdd.php';

$id = $_GET['id'] ?? '';

// Recherche de la personne
$sql = 'SELECT * FROM personnes WHERE id=:id';
$statement = $db->prepare($sql);
$statement->execute(compact('id'));
$personne = $statement->fetch();

if (!$personne) {
    header('location:personnes.php');
    exit();
}

$page_title = "Modifier-$personne[nom]";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['modifier'])) {
    // récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $age = (int) $_POST['age'] ?? 0;
    $slug = $_POST['slug'] ?? '';
    $photo = $personne['photo'];

    // renommage de la photo si changement de slug
    if ($slug != $personne['slug']) {
        $url = "photos/$personne[photo]";
        $photo = $id . "_" . $slug . "." . strtolower(pathinfo($url, PATHINFO_EXTENSION));
        if (file_exists($url)) {
            rename($url, "photos/$photo");
        }
    }
    // modification de la personne
    $sql = "UPDATE personnes SET 
                nom = :nom,
                prenom = :prenom,
                age = :age,
                slug = :slug,
                photo = :photo                
            WHERE id = :id";

    $statement = $db->prepare($sql);
    $statement->execute(compact('nom', 'prenom', 'age', 'slug', 'photo', 'id'));

    // modification de la photo si nouvelle photo
    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        // suppression ancienne photo
        if (file_exists("photos/$photo")) {
            unlink("photos/$photo");
        }
        // ajout de la nouvelle photo
        $photo = $id . "_" . $slug . "." . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $origine = $_FILES['photo']['tmp_name'];
        $destination = "photos/$photo";
        move_uploaded_file($origine, $destination);
    }

    header('location:personnes.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>
    <main>
        <h1>Modifier</h1>
        <form action='' method='post' enctype='multipart/form-data'>

            <div>
                <span>Nom</span>
                <input type='text' name='nom' value='<?= $personne['nom'] ?>'>
            </div>

            <div>
                <span>Prénom</span>
                <input type='text' name='prenom' value='<?= $personne['prenom'] ?>'>
            </div>

            <div>
                <span>Age</span>
                <input type='text' name='age' value='<?= $personne['age'] ?>'>
            </div>

            <div>
                <span>Slug</span>
                <input type='text' name='slug' value='<?= $personne['slug'] ?>'>
            </div>

            <div>
                <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
                <input type='file' name='photo'>
            </div>

            <div>
                <button type='submit' name='modifier'>Modifier</button>
                <a href='personnes.php'><button type='button'>Annuler</button></a>
            </div>

        </form>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>