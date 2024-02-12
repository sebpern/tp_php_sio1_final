<?php
include ("include/header.php");

    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT login, titre, note FROM news n INNER JOIN news_user nu on n.id_news=nu.fk_news INNER JOIN user u on u.id_user=nu.fk_user where id_news=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);

    $news = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;

    ?>
 Evaluation de la news  <?= $news[0]["titre"] ?>
  <div class="row">
    <div class="col">
    <table class="table">
    <thead>
        <tr>
           <th scope="col">Login</th>
            <th scope="col">Note</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($news as $ligne){
            ?>
            <tr>
                <td><?= $ligne["login"]?></td>
                <td><?= $ligne["note"]?></td>
                <td>
              
            </tr>
        <?php
        }
        ?>
    </tbody>
    </table>
    <?php
    $requete=null;
    $mysqlConnection=null;
    ?>
  
    </div>
  </div>

<?php
include ("include/footer.php");
?>
