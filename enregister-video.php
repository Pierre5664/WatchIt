<?php
session_start();
// On se connecte à la BDD
try {
    $bdd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', ''); // utilisateur root, mdp vide
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) //si la session existe
{
    //Si le fichier image s'est bien envoyé, error==0
    if (isset($_FILES['image']) && ($_FILES['image']['error'] == 0)) {
        //Si l'extension image correspond bien aux extensions autorisées
        $infoNomFichierImage = pathinfo($_FILES['image']['name']);
        $extensionImage = $infoNomFichierImage['extension'];
        $extensionsImageAutorisees = array("jpg");
        //Si l'extension video correspond bien aux extansions autorisées
        $infoNomFichierVideo = pathinfo($_FILES['video']['name']);
        $extensionVideo = $infoNomFichierVideo['extension'];
        $extensionVideoAutorisees = array("mp4");

        if (in_array(strtolower($extensionImage), $extensionsImageAutorisees) == true && in_array(strtolower($extensionVideo), $extensionVideoAutorisees) == true) {
            if (isset($_POST['titre']) && $_POST['description']) {
                if (isset($_FILES['video']) && ($_FILES['video']['error'] == 0)) {

                    $req = $bdd->prepare('INSERT INTO videos(ID, name, description) VALUES(NULL, :titre, :description)');
                    $req->execute(array(
                        'titre' => ($_POST['titre']),
                        'description' => ($_POST['description'])
                    ));
                    $_ID = $bdd->lastInsertId(NULL);//Retourne l'identifiant autogénéré qui a pu être éxecuté correctement sur cette session
                    move_uploaded_file($_FILES['video']['tmp_name'], 'uploads/videos/' . "video".  $_ID. ".mp4");
                    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/miniatures/' . "miniature". $_ID. ".jpg");
                    echo "<div class=\"alert alert-success\" role=\"alert\">
                       Upload réussi!  Fichier envoyé !
                     </div>";
                    echo "<p><a href='index.php'>retour vers le site</a></p>";

                }
            }

        }
    }

} else {
    echo "Une erreur s'est produite. Veuillez recommencer";
    header('Location: connexion.html');
}
?>