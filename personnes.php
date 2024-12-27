<?php
require 'bdd.php';
$page_title = 'Personnes';
?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php' ?>

<body>
    <?php require 'header.php' ?>

    <main>
        <h1>Afficher</h1>

        <ul>
            <?php
            foreach ($listePersonnes as $personne) {
                ?>
                <li>
                    <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
                    <?= $personne['nom'] ?>
                    <?= $personne['prenom'] ?>
                    <?= $personne['age'] ?> ans
                </li>
                <?php
            }
            ?>
        </ul>
    </main>

    <?php require 'footer.php' ?>
</body>

</html>