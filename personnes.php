<?php
require 'bdd.php';
// création de la requête
$sql = 'SELECT * FROM personnes';
// envoi de la requête et récupération du résultat
$statement = $db->prepare($sql);
$statement->execute();

$listePersonnes = $statement->fetchAll();

$page_title = 'Personnes';
?>
<!DOCTYPE html>
<html lang='fr'>

<?php require 'head.php' ?>

<body>
    <?php require 'header.php' ?>

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

    <?php require 'footer.php' ?>
</body>

</html>