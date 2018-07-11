<?php
include_once('connexion_bdd.php');
session_start();
include_once('logout.php');

if(isset($_GET['slug']))
{
    $req=$bdd->prepare('SELECT id, nom, prenom, sexe, service, date_embauche, salaire, slug FROM employe WHERE slug=:slug') or die(print_r($bbd->errorInfo()));
    $req->execute(array(
        'slug'=>$_GET['slug']
    ));
    $donnees=$req->fetch();
}

if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['sexe'])
    AND isset($_POST['service']) AND isset($_POST['date_embauche']) AND isset($_POST['salaire']) AND isset($_POST['slug']))
{
    $req=$bdd->prepare('UPDATE employe SET nom=:nom,prenom=:prenom,sexe=:sexe,service=:service,date_embauche=:date_embauche, salaire=:salaire WHERE slug=:slug') or die(print_r($bbd->errorInfo()));
    $req->execute(array(
        'nom'=>$_POST['nom'],
        'prenom'=>$_POST['prenom'],
        'sexe'=>$_POST['sexe'],
        'service'=>$_POST['service'],
        'date_embauche'=>$_POST['date_embauche'],
        'salaire'=>$_POST['salaire'],
        'slug'=>$_POST['slug']
    ));
    echo '<script>alert("L\'employe a bien ete modifie dans la base de donnees")</script>';
    header('Location:gestion.php');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modification</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/dashboard.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Gestion personnel</a>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="deconnection.php.php">Deconnection</a>
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
                            Modifier employee
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <h2>Ajout employees</h2>
            <br />
            <form method="post" action="modify.php">
                <div class="form-group">
                    <input type="text" class="form-control" id="nom" name="nom" aria-describedby="Nom" value="<?php echo htmlspecialchars($donnees['nom']); ?>" placeholder="Nom">
                    <small id="nom" class="form-text text-muted">Entrer le nom.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="prenom" name="prenom" aria-describedby="Prenom" value="<?php echo htmlspecialchars($donnees['prenom']); ?>" placeholder="Prenom">
                    <small id="prenom" class="form-text text-muted">Entrer le prenom.</small>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="service" name="service" aria-describedby="Service" value="<?php echo htmlspecialchars($donnees['service']); ?>" placeholder="Service">
                    <small id="service" class="form-text text-muted">Entrer le service.</small>
                </div>
                <div class="form-group">
                    <input type="number" class="form-control" id="salaire" name="salaire" aria-describedby="Salaire" value="<?php echo htmlspecialchars($donnees['salaire']); ?>" placeholder="Salaire">
                    <small id="salaire" class="form-text text-muted">Entrer le salaire.</small>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control" id="date_embauche" name="date_embauche" aria-describedby="Date embauche" value="<?php echo htmlspecialchars($donnees['date_embauche']); ?>" placeholder="Date embauche">
                    <small id="date_embauche" class="form-text text-muted">Entrer la date d'embauche.</small>
                </div>
                <div class="form-group">
                    <select name="sexe" id="sexe" class="form-control input-md"><?php echo htmlspecialchars($donnees['sexe']); ?>
                        <?php
                        if((strcmp($donnees['sexe'],'M')==0))
                        {
                            echo '<option value="M" selected>Homme</option>';
                            echo '<option value="F">Femme</option>';
                        }
                        else
                        {
                            echo '<option value="F" selected>Femme</option>';
                            echo '<option value="M">Homme</option>';
                        }
                        ?>
                    </select>
                    <small id="sexe" class="form-text text-muted">Entrer le sexe.</small>
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" id="slug" name="slug" value="<?php echo htmlspecialchars($donnees['slug']); ?>">
                </div>
                <button type="submit" class="btn btn-success">Valider</button>
            </form>
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

