<?php

try
{
    $bdd=new PDO('mysql:host=localhost;dbname=supinfo_social_network','root','');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
