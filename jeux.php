<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
} 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Affichez les jeux</title>
</head>
<body>
 
    <!-- Afficher tous les membres -->
    <?php
        $recupUsers = $bdd->query('SELECT * FROM jeux');
        while($user = $recupUsers->fetch() )
        {?> 
            
            <p><?= $user['nom']; ?> <a href="bannir.php?id=<?= $user['id']; ?>" style="color:red; text-decoration:none;">
            Supprimer le jeu</a>
            <a href="modifier-article.php?id=<?= $user['id']; ?>" style="color:green; text-decoration:none;">
            Modifier le jeu</a></p>
           
            <?php
        } 
    ?>

    <!-- Fin d'afficher tous les membres -->

</body>
</html> 