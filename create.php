<?php
require 'bdd.php';
$page_title = 'Ajouter';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['ajouter'])) {

    // récupération des données du formulaire
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $age = (int) $_POST['age'] ?? 0;
    $slug = $_POST['slug'] ?? '';

    $id = create('personnes', compact('nom', 'prenom', 'age', 'slug'));

    // récupération de la photo si elle existe
    if (isset($_FILES['photo']) && is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $photo = $id . "_" . $slug . "." . strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $origine = $_FILES['photo']['tmp_name'];
        $destination = "photos/$photo";
        move_uploaded_file($origine, $destination);
        // si la photo n'existe pas on copie la photo par defaut
    } else {
        $photo = $id . "_" . $slug . ".png";
        $origine = 'photos/photo.png';
        $destination = "photos/$photo";
        copy($origine, $destination);
    }
    // modification photo
    update('personnes', compact('photo', 'id'));

    // redirection
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
        <h1>Ajouter</h1>
        <form action='' method='post' enctype='multipart/form-data'>

            <div>
                <span>Nom</span>
                <input type='text' name='nom'>
            </div>

            <div>
                <span>Prénom</span>
                <input type='text' name='prenom'>
            </div>

            <div>
                <span>Age</span>
                <input type='text' name='age'>
            </div>

            <div>
                <span>Slug</span>
                <input type='text' name='slug'>
            </div>

            <div>
                <span>Photo</span>
                <input type='file' name='photo'>
            </div>

            <div>
                <button type='submit' name='ajouter'>Ajouter</button>
                <a href='personnes.php'><button type='button'>Annuler</button></a>
            </div>

        </form>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>