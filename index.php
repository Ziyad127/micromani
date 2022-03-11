<?php
session_start();
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <a href="jeux.php">Afficher tous les jeux</a>  
    <a href="publier-article.php">Publier un nouvelle article</a> 

</body>
</html>