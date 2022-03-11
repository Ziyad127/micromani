<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin;', 'root', '');
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $recupUser = $bdd->prepare('SELECT * FROM jeux WHERE id = ?');
    $recupUser->execute(array($getid));
    if($recupUser->rowCount() > 0){

         $bannirUser = $bdd->prepare('DELETE FROM jeux WHERE id = ?');
         $bannirUser->execute(array($getid));

         header('Location: jeux.php');

    }else{
        echo "Aucun membre n'a été trouvé";
    }
}else{
    echo "L'identifiant n'a pas été récupérer";
}
?>