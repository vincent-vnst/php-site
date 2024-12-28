<!DOCTYPE html>
<html lang='fr'>

<?php require '../app/views/head.php' ?>

<body>
    <?php require '../app/views/header.php' ?>

    <main>
        <h1>Afficher</h1>

        <section>
            <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
            <?= $personne['nom'] ?>
            <?= $personne['prenom'] ?>
            <?= $personne['age'] ?> ans
        </section>
    </main>

    <?php require '../app/views/footer.php' ?>
</body>

</html>