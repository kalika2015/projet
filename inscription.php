<?php
include_once('insert_user.php');
?>



<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login-authenticate.css" rel="stylesheet">
    <title>Inscription</title>
</head>
<body>
<div class="container">
    <div class="card card-container">
        <p id="profile-name" class="profile-name-card"></p>
        <form class="form-signin" method="post" id="login_form">
            <span id="reauth-email" class="reauth-email"></span>
            <input type="text" id="inputLogin" name="inputLogin" class="form-control" placeholder="Identifiant" required autofocus>
            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
            <input type="password" id="inputPasswordBis" name="inputPasswordBis" class="form-control" placeholder="Retaper mot de passe" required>
            <input type="text" id="inputNom" name="inputNom" class="form-control" placeholder="Nom" required autofocus>
            <input type="text" id="inputPrenom" name="inputPrenom" class="form-control" placeholder="Prenom" required autofocus>
            <br />
            <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>
        </form>
        <a href="index.php" class="sign-in">
            Retourner a la page de connexion
        </a>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/signin_check.js"></script>
</body>
</html>
