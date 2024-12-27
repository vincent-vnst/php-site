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
            <li>
                <img src='photos/<?= $listePersonnes[0]['photo'] ?>' alt='photo <?= $listePersonnes[0]['nom'] ?>' />
                <?= $listePersonnes[0]['nom'] ?>
                <?= $listePersonnes[0]['prenom'] ?>
                <?= $listePersonnes[0]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[1]['photo'] ?>' alt='photo <?= $listePersonnes[1]['nom'] ?>' />
                <?= $listePersonnes[1]['nom'] ?>
                <?= $listePersonnes[1]['prenom'] ?>
                <?= $listePersonnes[1]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[2]['photo'] ?>' alt='photo <?= $listePersonnes[2]['nom'] ?>' />
                <?= $listePersonnes[2]['nom'] ?>
                <?= $listePersonnes[2]['prenom'] ?>
                <?= $listePersonnes[2]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[3]['photo'] ?>' alt='photo <?= $listePersonnes[3]['nom'] ?>' />
                <?= $listePersonnes[3]['nom'] ?>
                <?= $listePersonnes[3]['prenom'] ?>
                <?= $listePersonnes[3]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[4]['photo'] ?>' alt='photo <?= $listePersonnes[4]['nom'] ?>' />
                <?= $listePersonnes[4]['nom'] ?>
                <?= $listePersonnes[4]['prenom'] ?>
                <?= $listePersonnes[4]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[5]['photo'] ?>' alt='photo <?= $listePersonnes[5]['nom'] ?>' />
                <?= $listePersonnes[5]['nom'] ?>
                <?= $listePersonnes[5]['prenom'] ?>
                <?= $listePersonnes[5]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[6]['photo'] ?>' alt='photo <?= $listePersonnes[6]['nom'] ?>' />
                <?= $listePersonnes[6]['nom'] ?>
                <?= $listePersonnes[6]['prenom'] ?>
                <?= $listePersonnes[6]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[7]['photo'] ?>' alt='photo <?= $listePersonnes[7]['nom'] ?>' />
                <?= $listePersonnes[7]['nom'] ?>
                <?= $listePersonnes[7]['prenom'] ?>
                <?= $listePersonnes[7]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[8]['photo'] ?>' alt='photo <?= $listePersonnes[8]['nom'] ?>' />
                <?= $listePersonnes[8]['nom'] ?>
                <?= $listePersonnes[8]['prenom'] ?>
                <?= $listePersonnes[8]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[9]['photo'] ?>' alt='photo <?= $listePersonnes[9]['nom'] ?>' />
                <?= $listePersonnes[9]['nom'] ?>
                <?= $listePersonnes[9]['prenom'] ?>
                <?= $listePersonnes[9]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[10]['photo'] ?>' alt='photo <?= $listePersonnes[10]['nom'] ?>' />
                <?= $listePersonnes[10]['nom'] ?>
                <?= $listePersonnes[10]['prenom'] ?>
                <?= $listePersonnes[10]['age'] ?> ans
            </li>
            <li>
                <img src='photos/<?= $listePersonnes[11]['photo'] ?>' alt='photo <?= $listePersonnes[11]['nom'] ?>' />
                <?= $listePersonnes[11]['nom'] ?>
                <?= $listePersonnes[11]['prenom'] ?>
                <?= $listePersonnes[11]['age'] ?> ans
            </li>
        </ul>
    </main>

    <?php require 'footer.php' ?>
</body>

</html>