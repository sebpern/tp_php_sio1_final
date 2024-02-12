<?php

include("include/database.php");
session_start();
$mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    ); 

// ordre de mission
$requete = $mysqlConnection->prepare('INSERT INTO news_user(fk_news,fk_user,note) values(:news,:user,:note)');
//execution de la requete
$requete->execute( ["news"=>$_GET["id"],"user"=>$_SESSION["user_id"],"note"=>$_POST["btnradio"]]);
$mysqlConnection = null;
$requete = null;
$_SESSION["success"]="News a été évaluée avec succès";
header("location:list_news.php");
?>