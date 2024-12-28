<!DOCTYPE html>
<html lang='fr'>

<?php require '../app/views/head.php' ?>

<body>
    <?php require '../app/views/header.php' ?>

    <main>
        <h1>Afficher</h1>
        <a href='create.php'><button>Ajouter</button></a>
        <ul>
            <?php
            foreach ($listePersonnes as $personne) {
                ?>
                <li>
                    <a href='show.php?id=<?= $personne['id'] ?>'>
                        <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
                    </a>
                    <?= $personne['nom'] ?>
                    <?= $personne['prenom'] ?>
                    <?= $personne['age'] ?> ans
                    <a href='delete.php?id=<?= $personne['id'] ?>'>
                        <img src='images/poubelle.png' alt='supprimer' />
                    </a>
                    <a href='update.php?id=<?= $personne['id'] ?>'>
                        <img src='images/crayon.png' alt='modifier' />
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </main>

    <?php require '../app/views/footer.php' ?>
</body>

</html>