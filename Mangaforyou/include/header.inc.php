<?php
include_once './include/connexion.inc.php';

// Gestion de la session
if (!isset($_SESSION)) {
    session_start();
}
if (!isset($_SESSION['login'])) {
    $_SESSION['login'] = False;
}

if (isset($_POST['deconnexion'])) {
    session_unset();
    session_destroy();
    header('Location: index.php');
}


?>

<!doctype html>
<html>

<head>
    <title>MangaForYou</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
</head>

<body style="min-height: 100vh; display: flex; flex-direction: column;">
    <?php

    include_once("./include/navbar.inc.php");

    ?>