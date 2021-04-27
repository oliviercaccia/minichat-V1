<?php
session_start();

if (isset($_SESSION["userId"])) {
    require_once("db/config.php");
    $pseudo = $_SESSION["userId"];
    $msg = $_POST["msg"];

    $sql = "insert into Message(nickname, content) values ('$pseudo', '$msg')";
    $response = $PDO->exec($sql);

    if ($response === false) {
        $error = $PDO->errorInfo();
        echo $error[2];
        echo "<br/><br>$sql</br>";
        die();
    }
}

header("Location: index.php");
