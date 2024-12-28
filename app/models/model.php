<?php
require '../app/bdd.php';

// all('personnes') => $sql = "SELECT * FROM personnes"
function all(string $table)
{
    global $db;

    $sql = "SELECT * FROM $table";

    $statement = $db->prepare($sql);
    $statement->execute();

    return $statement->fetchAll();
}

// find('personne', 3) => $sql = "SELECT * FROM personne WHERE id=:id"
function find(string $table, int $id)
{
    global $db;

    $sql = "SELECT * FROM $table WHERE id = :id";

    $statement = $db->prepare($sql);
    $statement->execute(compact('id'));

    return $statement->fetch();
}

// where('users', 'email = :email AND password = :password', compact(['email', 'password'])) => $sql = "SELECT * from users WHERE email = :email AND password = :password"
function where(string $table, string $where, array $datas)
{
    global $db;

    $sql = "SELECT * FROM $table WHERE $where";

    $statement = $db->prepare($sql);
    $statement->execute($datas);

    return $statement->fetchAll();
}

// create('personnes', ['nom'=>'dupont', 'prenom'=>'jean']) => $sql = "INSERT INTO personnes (nom, prenom) VALUES (:nom, :prenom)"
function create(string $table, array $datas): int
{
    global $db;

    $champs = implode(',', array_keys($datas));
    $values = implode(", :", array_keys($datas));

    $sql = "INSERT INTO $table ($champs) VALUES (:$values)";

    $statement = $db->prepare($sql);
    $statement->execute($datas);

    return $db->lastInsertId();
}

// update('personnes', ['id'=>3, 'nom'=>'dupont', 'prenom'=>'jean']) => $sql = "UPDATE personnes SET id = :id, nom =:nom, prenom = :prenom WHERE id = :id"
function update(string $table, array $datas): string
{
    global $db;

    $set = implode(
        ', ',
        array_map(
            fn($key) => "$key = :$key",
            array_keys($datas)
        )
    );

    $sql = "UPDATE $table SET $set WHERE id = :id";

    $statement = $db->prepare($sql);
    $statement->execute($datas);

    return $sql;
}

// delete('personnes', 3) => $sql = "DELETE FROM personnes WHERE id= :id"
function delete(string $table, int $id): string
{
    global $db;

    $sql = "DELETE FROM $table WHERE id=:id";

    $statement = $db->prepare($sql);
    $statement->execute(compact('id'));

    return $sql;
}