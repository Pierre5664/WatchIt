<?php
session_start();

//Connexion à la BDD
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', ''); //Connexion a la BDD : utilisateur root, mdp vide
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//On prépare une requete avec le pseudo en paramètre
$req = $bdd->prepare('SELECT * FROM users WHERE pseudo=?');
$req->execute(array(
    $_POST['pseudo'] // le parametre est fourni depuis le champ du formulaire
));

$resultat = $req->fetch();
//On affiche le resultat de la requete (si une ligne correspondant à la requete existe) ou 'false' sera affiché si n'existe pas
var_dump($resultat);
var_dump($_POST['mdp']);
if ($resultat != false)// Si le resultat ne vaut pas false
{
    if (password_verify($_POST['mdp'], $resultat['password']))
    {
        echo "Vous êtes connecté";
        $_SESSION['connecte'] = true;
        header('Location: /crud/monYoutube/envoyer-video.php');
    }
    else
    {
       echo "Mauvais mot de passe";
       header('Location: /crud/monYoutube/connexion.html');//Redirection page connexion.html
    }
}
else
{
    echo "Vous devez vous inscrire !";
    header('Location: /crud/monYoutube/inscription.html');
}


?>