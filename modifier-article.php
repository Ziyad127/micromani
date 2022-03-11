<?php
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];

    $recupArticle = $bdd->prepare('SELECT * FROM jeux WHERE id = ? ');
    $recupArticle->execute(array($getid));
    if($recupArticle->rowCount() > 0){
        $articleInfos = $recupArticle->fetch();
        $nom = $articleInfos['nom'];
        $prix = $articleInfos['prix'];
        $contenu = str_replace ('<br />', '', $articleInfos['contenu']);
        $quantite = $articleInfos['quantite'];

        if(isset($_POST['valider'])){

        $nom_saisi = htmlspecialchars($_POST['nom']);
        $prix_saisi = htmlspecialchars($_POST['prix']);
        $contenu_saisie = nl2br(htmlspecialchars($_POST['contenu']));
        $quantite_saisi = htmlspecialchars($_POST['quantite']);

        $updateArticle = $bdd->prepare('UPDATE jeux SET nom = ?, prix = ?, contenu = ?, quantite = ? WHERE id = ?');
        $updateArticle->execute(array($nom_saisi, $prix_saisie, $contenu_saisie, $quantite_saisi, $getid));

        header('Location: jeux.php');
    }

    }else
    {
        echo "Aucun jeux trouvé";
    }
}else{
    echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title>Modifier l'article</title>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="nom">
        <br> 
        <input type="text" name="prix">
        <br>  
        <textarea name="contenu"></textarea>
        <br>
        <input type="text" name="quantite">
        <br> 
        <input type="submit" name="valider">
        <br>
     
    </form>
</body>
</html>