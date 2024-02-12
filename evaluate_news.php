 <?php
include ("include/header.php");

$mysqlConnection = new PDO(
      'mysql:host='.SERVER.';dbname='.DBNAME.';charset=utf8',
      USER,
      PASSWORD,
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
    );

    // ordre de mission
    $requete = $mysqlConnection->prepare('SELECT * FROM news where id_news=:id');
    //execution de la requete
    $requete->execute(["id"=>$_GET["id"]]);

    $news = $requete->fetch();
    $mysqlConnection = null;
    $requete = null;
    ?>
      <div class="row">
        <div class="col center">
          Vous allez évaluer la news : <?= $news["titre"]?>
          <form action="store_evaluate_news.php?id=<?= $news["id_news"]?>" method="post">
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked value="1">
                <label class="btn btn-outline-primary" for="btnradio1">1</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value="2">
                <label class="btn btn-outline-primary" for="btnradio2">2</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value="3">
                <label class="btn btn-outline-primary" for="btnradio3">3</label>
                
                <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value="4">
                <label class="btn btn-outline-primary" for="btnradio4">4</label>

                <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value="5">
                <label class="btn btn-outline-primary" for="btnradio5">5</label>
            </div>
            <button type="submit" class="btn btn-primary">Créer</button>
          </form>

        </div>
      </div>
<?php
include ("include/footer.php");
?>