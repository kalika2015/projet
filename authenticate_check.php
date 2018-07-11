<?php
include_once('connexion_bdd.php');

$reponse=$bdd->query('SELECT login, password, nom, prenom FROM user') or die(print_r($bdd->errorInfo()));

if((isset($_POST['inputLogin']) AND isset($_POST['inputPassword'])))
{
    while($donnees=$reponse->fetch())
    {
        if(((strcmp($_POST['inputLogin'], $donnees['login'])==0) AND password_verify($_POST['inputPassword'], $donnees['password'])))
        {
            session_start();
            $_SESSION['user']=$donnees['nom'];
            echo ('Success');
        }
    }
}