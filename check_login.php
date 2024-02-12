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
$requete = $mysqlConnection->prepare('SELECT * FROM user where login = :login and password=:password');
//execution de la requete
$requete->execute( ["login"=>$_POST["login"],"password"=>sha1($_POST["password"])]);
$user = $requete->fetch();

if ($user){
  
    $_SESSION["login"]=$_POST["login"];
    $_SESSION["user_id"]=$user["id_user"];
    if($user["is_admin"]==1){
         $_SESSION["admin"]=1;
    }
    header("location:list_news.php");
  
}
else
{
    $_SESSION["error"]="identifiant de connexion incorrect";
    header("location:login.php");
   
}

?>