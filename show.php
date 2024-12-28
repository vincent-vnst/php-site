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

$page_title = "Afficher-$personne[nom]";

?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php' ?>

<body>
    <?php require 'header.php' ?>

    <main>
        <h1>Afficher</h1>

        <section>
            <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
            <?= $personne['nom'] ?>
            <?= $personne['prenom'] ?>
            <?= $personne['age'] ?> ans
        </section>
    </main>

    <?php require 'footer.php' ?>
</body>

</html>