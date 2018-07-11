<?php
include_once('connexion_bdd.php');
session_start();
include_once('logout.php');

if(isset($_GET['slug']))
{
    $req=$bdd->prepare('SELECT id, nom, prenom, sexe, service, date_embauche, salaire FROM employe WHERE slug=:slug') or die(print_r($bbd->errorInfo()));
    $req->execute(array(
        'slug'=>$_GET['slug']
    ));
    $donnees=$req->fetch();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Information</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="logout.php">Gestion personnel</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="deconnection.php">Deconnection</a>
        </li>
    </ul>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="gestion.php">
                            <span data-feather="home"></span>
                            Accueil <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add.php">
                            <span data-feather="file"></span>
                            Ajouter employee
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h2>Liste des employees</h2>
            <br />
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">ID</th>
                            <th scope="row"><?php echo htmlspecialchars($donnees['id']); ?></th>
                        </tr>
                        <tr>
                            <th scope="row">Nom</th>
                            <td><?php echo htmlspecialchars($donnees['nom']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Prenom</th>
                            <td><?php echo htmlspecialchars($donnees['prenom']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Sexe</th>
                            <td><?php echo htmlspecialchars($donnees['sexe']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Service</th>
                            <td><?php echo htmlspecialchars($donnees['service']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Date embauche</th>
                            <td><?php echo htmlspecialchars($donnees['date_embauche']); ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Salaire</th>
                            <td><?php echo htmlspecialchars($donnees['salaire']); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.js"></script>
<!-- Icons -->
<script src="js/feather.min.js"></script>
<script>
    feather.replace()
</script>

</body>
</html>

