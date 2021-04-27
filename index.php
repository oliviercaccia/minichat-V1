<?php
session_start();

require_once("db/config.php");

$response = $PDO->query("SELECT * FROM Message order by id desc");

if ($response === false) {
    $error = $PDO->errorInfo();
    echo $error[2];
    die();
}

$messages = $response->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minichat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <?php
        if (isset($_SESSION["userId"])) {
        ?>
            <a href="minichat_logout.php">Se deconnecter</a>
            <p>Nouveau message:</p>
            <form id="form-post-new-message" method="POST" action="minichat_post.php">
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <input type="text" name="msg">
                </div>
                <button type="submit" class="btn btn-primary">Poster</button>
            </form>
        <?php
        } else {
        ?>
            <p>Connexion:</p>
            <form id="form-login" method="POST" action="minichat_login.php">
                <div class="mb-3">
                    <label class="form-label">Pseudo</label>
                    <input type="text" name="pseudo">
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="pwd">
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        <?php
        }
        ?>
        <ul class="list-group" id="list-messages">
            <?php
            foreach ($messages as $oneMessage) {
                echo '<li class="list-group-item"><b>' . $oneMessage["nickname"] . "</b> : " . $oneMessage["content"] . "</li>";
            }
            ?>
        </ul>
    </div>
</body>

</html>