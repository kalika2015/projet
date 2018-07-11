<?php
include_once('connexion_bdd.php');

$option=[
    'cost'=>12
];
$password=password_hash("casa", PASSWORD_BCRYPT, $option);
$login='badzo';
$nom='badiane';
$prenom='badara';

$req=$bdd->prepare('INSERT INTO user (login, password, nom, prenom) VALUES(:login, :password, :nom, :prenom)') or die(print_r($bbd->errorInfo()));
$req->execute(array(
    'login'=>$login,
    'password'=>$password,
    'nom'=>$nom,
    'prenom'=>$prenom
));
echo $password;
echo $login;
echo $nom;
echo $prenom;