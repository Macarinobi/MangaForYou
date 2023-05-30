<header class="sticky-top p-3 text-white" style="background-color: #FF6600">

    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="./index.php" class="nav-link px-4 text-white">Accueil</a></li>
                <li><a href="./affMangas.php" class="nav-link px-4 text-white">Nos Mangas</a></li>
            </ul>

            <div class="text-end">
                <?php
                if (isset($_SESSION['login']) && $_SESSION['login'] == False) {
                ?>
                    <a href='./seConnecter.php' class="btn btn-warning">Se connecter</a>
                    <a href='./inscription.php' class="btn btn-outline-light me-2">S'inscrire</a>
                <?php
                } else {
                ?>
                    <a onclick="window.location.href='./deconnexion.php';" type="button" class="btn btn-warning">Déconnexion</a>

                <?php
                }
                ?>
            </div>
        </div>
    </div>

    </form>
    </nav>
</header>