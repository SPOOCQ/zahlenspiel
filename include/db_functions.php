<?php

function getModes($pdo){
    $stmt = $pdo->query('SELECT id, name,max FROM modes');
    $result = array();

    while ($row = $stmt->fetch())
    {
        $result[] = array("name" => $row['name'], "max" => $row["max"], "id" => $row["id"]);
        //echo $row['name'] . "\n";

    }
    $return = array(
        'buttons' => $result,

    );
    return $return;
}

function getMax($pdo, $mode){
    $stmt = $pdo->query("SELECT max from modes where id = $mode");
    $result = $stmt -> fetch();
    return $result['max'];
}

function insertHighscore($pdo, $data){
    $stmt = $pdo->prepare("INSERT INTO highscore (name, mode, versuche, zeit) VALUES (:name, :mode, :versuche, :zeit)");

    $name = $data['name'];
    $mode = $data['mode'];
    $versuche = $data['versuche'];
    $zeit = $data['zeit'];

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':mode', $mode);
    $stmt->bindParam(':versuche', $versuche);
    $stmt->bindParam(':zeit', $zeit);


    $stmt->execute();
    session_destroy();
    header('Location: ?');
}

function getHighscores($pdo, $mode){
    $stmt = $pdo->query("SELECT name, zeit, versuche FROM highscore WHERE mode = $mode ORDER BY zeit, versuche");
    $return = array();
    while ($value = $stmt->fetch()) {

        $return[] = array("name" => $value['name'], 'zeit' => $value['zeit'], 'versuche' => $value['versuche']);
    }
    return $return;
}