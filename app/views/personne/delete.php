<!DOCTYPE html>
<html lang='fr'>

<?php view('head', compact('page_title')) ?>

<body>
    <?php view('header') ?>

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
                <a href='<?= route('personne.index') ?>'><button type='button'>Annuler</button></a>
            </div>
        </form>
    </main>
    <?php view('footer') ?>
</body>

</html>