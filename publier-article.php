<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(!$_SESSION['mdp']){
    header('Location: connexion.php');
} 

if(isset($_POST['envoi'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prix']) AND !empty($_POST['contenu']) AND !empty($_POST['quantite'])){
        $nom = htmlspecialchars($_POST['nom']);
        $contenu = nl2br(htmlspecialchars($_POST['contenu']));
        $prix = htmlspecialchars($_POST['prix']);
        $quantite = htmlspecialchars($_POST['quantite']);

        $insererArticle = $bdd->prepare('INSERT INTO jeux(nom, prix, contenu, quantite)VALUES(?, ?, ?, ?)');
        $insererArticle->execute(array($nom, $prix, $contenu, $quantite));

        echo "L'article a bien été envoyé";
    }else{
        echo "Veuillez compléter tous les champs..";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Publier un article</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="nom">
        <br>
        <input type="text" name="prix">
        <br>
        <textarea name="contenu" ></textarea>
        <br>
        <input type="text" name="quantite">
        <br>
        <input type="submit" name="envoi">
</body>
</html>