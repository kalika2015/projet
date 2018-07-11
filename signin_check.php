<?php
include_once('connexion_bdd.php');
$is_exist=false;
$reponse=$bdd->query('SELECT login FROM user') or die(print_r($bdd->errorInfo()));

if((isset($_POST['inputLogin']) AND isset($_POST['inputPassword']) AND isset($_POST['inputPasswordBis'])
    AND isset($_POST['inputNom']) AND isset($_POST['inputPrenom'])))
{

    while($donnees=$reponse->fetch())
    {
        if(((strcmp($_POST['inputLogin'], $donnees['login'])==0)))
        {
            echo ('Login_already_exist');
            $is_exist=true;
        }
    }
    if($is_exist==false)
    {
        if(((strcmp($_POST['inputPassword'],$_POST['inputPasswordBis'])==0)))
        {
            $option=[
                'cost'=>12
            ];
            $password=password_hash($_POST['inputPassword'], PASSWORD_BCRYPT, $option);

            $req=$bdd->prepare('INSERT INTO user (login, password, nom, prenom) VALUES(:login, :password, :nom, :prenom)') or die(print_r($bbd->errorInfo()));
            $req->execute(array(
                'login'=>$_POST['inputLogin'],
                'password'=>$password,
                'nom'=>$_POST['inputNom'],
                'prenom'=>$_POST['inputPrenom']
            ));

            echo ('Success');
        }
        else
        {
            echo('Password_duo_failed');
        }
    }
}