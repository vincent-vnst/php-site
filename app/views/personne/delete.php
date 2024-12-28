<!DOCTYPE html>
<html lang='fr'>

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>

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
    <?php require '../app/views/footer.php'; ?>
</body>

</html>