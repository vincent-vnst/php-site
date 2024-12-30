<!DOCTYPE html>
<html lang='fr'>

<?php view('head', compact('page_title')) ?>

<body>
    <?php view('header') ?>

    <main>
        <h1>Afficher</h1>
        <a href='create.php'><button>Ajouter</button></a>
        <ul>
            <?php
            foreach ($listePersonnes as $personne) {
                ?>
                <li>
                    <a href='<?= route('personne.show', ['id' => $personne['id']]) ?>'>
                        <img src='photos/<?= $personne['photo'] ?>' alt='photo <?= $personne['nom'] ?>' />
                    </a>
                    <?= $personne['nom'] ?>
                    <?= $personne['prenom'] ?>
                    <?= $personne['age'] ?> ans
                    <a href='<?= route('personne.delete', ['id' => $personne['id']]) ?>'>
                        <img src='images/poubelle.png' alt='supprimer' />
                    </a>
                    <a href='<?= route('personne.update', ['id' => $personne['id']]) ?>'>
                        <img src='images/crayon.png' alt='modifier' />
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </main>

    <?php view('footer') ?>
</body>

</html>