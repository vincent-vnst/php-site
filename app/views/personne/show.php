<!DOCTYPE html>
<html lang='fr'>

<?= view('head', compact('page_title')) ?>

<body>
    <?= view('header') ?>

    <main>
        <h1>Afficher</h1>

        <section>
            <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
            <?= $personne['nom'] ?>
            <?= $personne['prenom'] ?>
            <?= $personne['age'] ?> ans
        </section>
    </main>

    <?= view('footer') ?>
</body>

</html>