<?php
require 'bdd.php';
$id = $_GET['id'] ?? '';

// Recherche de la personne
$personne = find('personnes', $id);

if (!$personne) {
    header('location:personnes.php');
    exit();
}

$page_title = "Supprimer-$personne[nom]";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['supprimer'])) {
    // suppression photo
    if (file_exists("photos/$personne[photo]")) {
        unlink("photos/$personne[photo]");
    }

    // suppression de la personne
    delete('personnes', $id);

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
        <h1>Supprimer</h1>
        <form action='' method='post'>
            <section>
                <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
                <?= $personne['nom'] ?>
                <?= $personne['prenom'] ?>
                <?= $personne['age'] ?> ans
            </section>
            <div>
                <button type='submit' name='supprimer'>Supprimer</button>
                <a href='personnes.php'><button type='button'>Annuler</button></a>
            </div>
        </form>
    </main>
    <?php require 'footer.php'; ?>
</body>

</html>