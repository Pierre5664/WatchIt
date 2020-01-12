<?php
session_start();
//Connection à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', ''); // utilisateur root, mdp vide

} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
if (isset($_GET['id'])) {
    $req = $bdd->prepare('SELECT * FROM videos WHERE ID=?');
    $req->execute(array($_GET['id']));
    $resultat = $req->fetch();
}

include("header.php");
echo '<div class="container"><video controls src="uploads/videos/video' . $resultat[0] . '.mp4"></video></div>';

if(isset($_SESSION['connecte']) AND $_SESSION['connecte'] == true){
    include("commentaires.php");
} else {
    echo '<div class="alert alert-primary" role="alert">
  Vous devez être inscrit pour pouvoir poster des commentaires !
</div>';
}

if (isset($_POST['pseudo']) AND isset($_POST['commentaire']) && isset($_POST['idcache']))
{

$req = $bdd->prepare('INSERT INTO commentaires(ID,pseudo,commentaire,videoID) VALUES(NULL, :pseudo, :commentaire, :videoId)');
$req->execute(array(
        'pseudo' => htmlspecialchars($_POST['pseudo']),
        'commentaire' =>htmlspecialchars($_POST['commentaire']) ,//échappe les balises d'éventuels script pour qu'il ne soit pas executé
        'videoId' => $_POST['idcache']
));


header('Location: video.php?message:Votre commentaire a bien été enregistré !');//créé une variable message pour ensuite la récupérer pour notification visiteur
    //TODO : rediriger les visiteurs vers viddeo.php avec alert comme quoi le commentaire a été enregistré
}

$req = $bdd->prepare('SELECT * FROM commentaires WHERE videoID=?');
$req->execute(array(
    $_GET['id']
));

$commentaires = $req->fetchAll();
//var_dump($commentaires);

foreach ($commentaires as $commentaire){
    echo '
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Commentaires</h1>
                <p class="lead">'. $commentaire['pseudo'] .'</p>
                <p>'. $commentaire['commentaire'] .'</p>
            </div>
        </div>';
        //var_dump($commentaire);
       }
?>

