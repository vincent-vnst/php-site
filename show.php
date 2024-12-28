<?php
require 'model.php';
$id = $_GET['id'] ?? '';

$personne = find('personnes', $id);

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