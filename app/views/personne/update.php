<!DOCTYPE html>
<html lang='fr'>

<?php require '../app/views/head.php'; ?>

<body>
    <?php require '../app/views/header.php'; ?>
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
    <?php require '../app/views/footer.php'; ?>
</body>

</html>