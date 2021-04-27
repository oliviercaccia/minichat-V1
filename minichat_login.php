<?php

session_start();

require_once("db/config.php");

$pseudo = $_POST["pseudo"];
$password = $_POST["pwd"];

$sql = "select * from User where nickname ='$pseudo' and password = '$password'";

$response = $PDO->query($sql);

if ($response === false) {
    $error = $PDO->errorInfo();
    echo $error[2];
    echo "<br/><br>$sql</br>";
    die();
}

$nbUsersWithThisPasswordAndNickname = $response->rowCount();

if ($nbUsersWithThisPasswordAndNickname == 1) {
    $_SESSION["userId"] = $pseudo;
}

header("Location: index.php");
