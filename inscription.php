<?php
if (isset($_POST['mdp1']) && $_POST['mdp2'])//Si les mdp existent
{
//Si mdp1  == mdp2
    if ($_POST['mdp1'] === $_POST['mdp2'])
    {
        if(strlen($_POST['mdp1']) > 8)//Si mdp1 comporte au moins 8 caractères
        {
            if(preg_match('/\d/', $_POST['mdp1']) == true)//Si mdp comporte au moins 1 chiffre
            {
                try
                {
                    $bdd = new PDO('mysql:host=localhost;dbname=crud;charset=utf8', 'root', '');
                }
                catch (Exeption $e)
                {
                    die('Erreur : ' .$e->getMessage());
                }
                $req = $bdd->prepare('SELECT * FROM users WHERE pseudo=?');
                $req->execute(array(
                    $_POST['pseudo']
                ));
                $resultat = $req->fetch();

                if($resultat != false)//Affiche pseudo deja utilisé
                {
                    echo "Pseudo déjà utilisé !";
                    header('Location: inscription.html');
                }
                else
                {
                    //Insertion dans la BDD
                    $req = $bdd->prepare('INSERT INTO users(ID, pseudo, password) VALUES(NULL, :pseudo, :password)');
                    $req->execute(array(
                        'pseudo' => htmlspecialchars($_POST['pseudo']),
                        'password' =>password_hash($_POST['mdp1'], PASSWORD_DEFAULT)
                    ));
                    //Redirection vers la page de connexion

                    header('Location: connexion.html');
                }
            }
            else//en cas d'erreur sur mot de passe
            {
                echo "Le mot de passe doit contenir un chiffre";
            }
        }
        else //en cas de mdp < 8 caractères
        {
            echo "Mot de passe trop court";
        }
    }
    else //En cas de mots de passe différents
    {
        echo "Mots de passe différents! Saisissez 2 mots de passe identiques !";
        header('Location: inscription.html');
    }
}
?>