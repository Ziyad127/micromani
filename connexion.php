<?php
session_start();
if(isset($_POST['valider'])){
    if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
        $pseudo_par_defaut = "zed";
        $mdp_par_defaut = "zed";

        $pseudo_saisi = htmlspecialchars($_POST['pseudo']);
        $mdp_saisi = htmlspecialchars($_POST['mdp']);

        if ($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
            $_SESSION['mdp'] = $mdp_saisi;
            header('Location: index.php');
        }else{
            echo "Votre mot de passe est incorrect";
        }
    }else{
        echo "Veuillez completer tous les champs...";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Espace Admin</title>
</head>
<body>
    <form method="POST" action="" align="center">
        <h1>Connexion</h1>
        <input type="text" name="pseudo" placeholder="pseudo" autocomplete="off">
        <br>
        <input type="password" name="mdp" placeholder="mot de passe">
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>