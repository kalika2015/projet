<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/login-authenticate.css" rel="stylesheet">
    <title>Identification</title>
</head>
<body>
    <div class="container">
        <div class="card card-container">
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" id="login_form">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="inputLogin" name="inputLogin" class="form-control" placeholder="Matricule" required autofocus>
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Mot de passe" required>
                <br />
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Connexion</button>
            </form>
            <a href="inscription.php" class="sign-in">
                S'inscrire
            </a>
        </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/authenticate_check.js"></script>
</body>
</html>
