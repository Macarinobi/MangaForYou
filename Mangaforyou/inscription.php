<?php include("include/header.inc.php"); ?>
<?php echo generationEntete("S'inscrire à MangaForYou", "") ?>
<?php include("include/connexion.inc.php"); ?>

<?php

if (isset($_POST['envoi'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $mdp =sha1($_POST['pseudo']);
        $email = htmlspecialchars($_POST['email']);
        $InsertUser = $db->prepare('INSERT INTO utilisateurs(pseudo, email, mdp) VALUES(?, ?, ?, ?)');
        $InsertUser->execute(array($pseudo,$mdp));

        $recupUser = db-> prepare('SELECT * FROM utilisateur WHERE pseudo = ? AND email = ? AND mdp = ?');
        $recupUser->execute(array($pseudo, $mdp, $email));
        if($recupUser->rowCount() > 0){
            $SESSION['pseudo'] = $pseudo;
            $SESSION['email'] = $email;
            $SESSION['mdp'] = $mdp;
            $SESSION['id'] = $recupUser->fetch()['id'];

        }

        echo $SESSION['id'];

        
    }else{
        echo "veuillez compléter tous les champs...";
    }
}
?>
<!doctype htmml>
<html>
<head>
    <title>Inscription</title>
    <meta charset="utf-8">
</head>
<body>

    <form method="POST" action="" align="center">

    <input type= "text" name= "pseudo" autocomplete="off">
    <br/>
    <input type= "password" name= "mot de passe" autocomplete="off">
    <br/>
    <input type= "email" name= "email" autocomplete="off">
    <br/>
  
    <input type="submit" name="s'inscrire">

    </form>
</body>

<?php include("include/footer.inc.php"); ?>