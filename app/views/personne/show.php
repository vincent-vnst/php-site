<!DOCTYPE html>
<html lang='fr'>

<?php view('head', compact('page_title')) ?>

<body>
    <?php view('header') ?>

    <main>
        <h1>Afficher</h1>

        <section>
            <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
            <?= $personne['nom'] ?>
            <?= $personne['prenom'] ?>
            <?= $personne['age'] ?> ans
        </section>
    </main>

    <?php view('footer') ?>
</body>

</html>