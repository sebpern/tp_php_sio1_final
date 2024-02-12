<?php
include ("include/header.php");

    $mysqlConnection = new PDO(
        'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
        USER,
        PASSWORD,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM news n INNER JOIN category c on n.fk_category=c.id_category');
    //execution de la requete
    $requete->execute();

    $news = $requete->fetchAll();
    $mysqlConnection = null;
    $requete = null;

    if (isset($_SESSION["admin"])){
    ?>
        <div class="row">
            <div class="col center" style="text-align:center">
            <a href="create_news.php"><button class="btn btn-primary">Créer</button></a>
            </div>
        </div>
    <?php
    }
    ?>
  <div class="row">
    <div class="col">
    <table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col">Categorie</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($news as $ligne){
            ?>
            <tr>
                <th scope="row"><?= $ligne["id_news"] ?></th>
                <td><?= $ligne["titre"]?></td>
                <td><?= $ligne["libelle"]?></td>
                <td>
                <?php
                if (isset($_SESSION["login"])){
                ?>
                    <a href="evaluate_news.php?id=<?= $ligne["id_news"] ?>"><button class="btn btn-success">Evaluer</button></a>
                    <?php
                    if(isset($_SESSION["admin"])){
                    ?>
                        <a href="delete_news.php?id=<?= $ligne["id_news"] ?>"><button class="btn btn-danger">Supprimer</button></a>
                        <a href="edit_news.php?id=<?= $ligne["id_news"] ?>"><button class="btn btn-info">Modifier</button></a>   
                    <?php
                    }
                }
                ?>
                    <a href="evaluate_news_show.php?id=<?= $ligne["id_news"] ?>"><button class="btn btn-success">Voir les évaluations</button></a>
                </td>
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
