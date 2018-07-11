<?php
include_once('connexion_bdd.php');
session_start();
include_once('logout.php');

if(isset($_GET['slug']))
{
    $req=$bdd->prepare('DELETE FROM employe WHERE slug=:slug') or die(print_r($bbd->errorInfo()));
    $req->execute(array(
        'slug'=>$_GET['slug']
    ));
    echo '<script>alert("La suppresion a ete prise en compte")</script>';
}

$reponse=$bdd->query('SELECT id, nom, prenom, sexe, service, date_embauche, salaire, slug FROM employe') or die(print_r($bdd->errorInfo()));

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gestion des employees</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Gestion personnel</a>
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
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Sexe</th>
                        <th scope="col">Service</th>
                        <th scope="col">Date embauche</th>
                        <th scope="col">Salaire</th>
                        <th scope="col">Operation</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while($donnees=$reponse->fetch())
                    {
                    ?>
                        <tr>
                            <th scope="row"><?php echo htmlspecialchars($donnees['id']); ?></th>
                            <td><?php echo htmlspecialchars($donnees['nom']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['prenom']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['sexe']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['service']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['date_embauche']); ?></td>
                            <td><?php echo htmlspecialchars($donnees['salaire']); ?></td>
                            <td>
                                <a><?php echo '<a href="information.php?slug='.$donnees['slug'].'">';?><button class="btn btn-primary btn-sm"><span data-feather="user"></button></a>
                                <a><?php echo '<a href="modify.php?slug='.$donnees['slug'].'">';?><button class="btn btn-success btn-sm"><span data-feather="edit-3"></button></a>
                                <a><?php echo '<a href="gestion.php?slug='.$donnees['slug'].'">';?><button class="btn btn-danger btn-sm"><span data-feather="trash-2"></button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
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
