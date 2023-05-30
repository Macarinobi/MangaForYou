<?php include("include/header.inc.php"); ?>
<?php echo generationEntete("Nos Mangas", "A choisir") ?>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $listeMangas="SELECT * FROM mangaforyou.mangas;";

            foreach($db->query($listeMangas) as $row){
                ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./image/<?= $row['image'] ?>" class="card-img-top">
                        <div class="card-body">
                        <span><?= $row['nomManga'] ?></span>
                        <br>
                        <span>Tome n° <?= $row['numeroTome'] ?></span>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>

<?php include("include/footer.inc.php"); ?>
