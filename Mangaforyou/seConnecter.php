<?php include("include/header.inc.php"); ?>
<?php echo generationEntete("Se connecter à MangaForYou", "") ?>

<div class="jumbotron madiv">
    <form method="post" id="formId" novalidate>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="email">Adresse électronique :</label>
                <input type="email" class="form-control <?php echo (isset($_POST['identifier']) && empty($_POST['mail'])) ? 'is-invalid' : 'is-valid'; ?>" name="mail" id="email" placeholder="E-mail" required>
                <div class="invalid-feedback">
                    <?php
                    if (isset($_POST['identifier']) && empty($_POST['mail'])) {
                        echo "Le mail n'existe pas dans la base.";
                    } elseif (!isset($_POST['identifier'])) {
                        echo "Vous devez fournir un mail valide.";
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 mb-3">
                <label for="motdepasse1">Mot de passe :</label>
                <input type="password" class="form-control" name="mdp" required>
                <div class="invalid-feedback">
                    Vous devez fournir un mot de passe.
                </div>
            </div>
        </div>
        <input type="submit" value="Valider" class="btn btn-primary" name="identifier" />
    </form>
</div>

<?php
if (isset($_POST['identifier'])) {
    // Informations de connexion à la base de données
    $mysql = "localhost";
    $utilisateur = "root";
    $mdp = "";
    $dbname = "mangaforyou";

    // Connexion à la base de données
    $connexion = mysqli_connect($mysql, $utilisateur, $mdp, $dbname);

    // Vérification de la connexion
    if (!$connexion) {
        die("Échec de la connexion à la base de données : " . mysqli_connect_error());
    }

    // Récupération des données du formulaire
    $email = $_POST['mail'];
    $motDePasse = $_POST['mdp'];

    // Requête SQL pour récupérer les informations de l'utilisateur
    $db = "SELECT id, pseudo, email, credit FROM utilisateur WHERE email = '$email' AND mot_de_passe = '$motDePasse'";

    // Exécution de la requête
    $resultat = mysqli_query($connexion, $db);

    if ($resultat && mysqli_num_rows($resultat) > 0) {
        // Récupération des données de l'utilisateur
        $utilisateur = mysqli_fetch_assoc($resultat);

        // Affichage des informations
        echo "ID : " . $utilisateur['id'] . "<br>";
        echo "Pseudo : " . $utilisateur['pseudo'] . "<br>";
        echo "Email : " . $utilisateur['email'] . "<br>";
        echo "Crédit : " . $utilisateur['credit'];
    } else {
        echo "Identifiants invalides.";
    }

    // Fermeture de la connexion à la base de données
    mysqli_close($connexion);
}


// Variables pour l'identification de l'utilisateur
$id = 1; // ID de l'utilisateur
$pseudo = "pseudo_utilisateur"; // Pseudo de l'utilisateur
$email = "email_utilisateur"; // Email de l'utilisateur

// Connexion à la base de données
$connexion = mysqli_connect($mysql, $utilisateur, $mdp, $dbname);

// Vérification de la connexion
if (!$connexion) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

// Requête SQL pour récupérer les informations de l'utilisateur
$db = "SELECT id, pseudo, email, credit FROM utilisateur WHERE id = '$id' AND pseudo = '$pseudo' AND email = '$email'";

// Exécution de la requête
$resultat = mysqli_query($connexion, $db);

// Vérification du résultat de la requête
if ($resultat && mysqli_num_rows($resultat) > 0) {
    // Récupération des données de l'utilisateur
    $utilisateur = mysqli_fetch_assoc($resultat);

    // Affichage des informations
    echo "ID : " . $utilisateur['id'] . "<br>";
    echo "Pseudo : " . $utilisateur['pseudo'] . "<br>";
    echo "Email : " . $utilisateur['email'] . "<br>";
    echo "Crédit : " . $utilisateur['credit'];
} else {
    echo "Utilisateur non trouvé.";
}

?>

<?php include("include/footer.inc.php"); ?>
