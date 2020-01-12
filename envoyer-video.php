<?php
session_start();
if (isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) //si la session existe
{

?>
<!doctype html>
 <html lang="en">
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Envoi de vidéo</title>
    </head>
    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="http://localhost/crud/monYoutube/index.php">MonYoutube</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/crud/monYoutube/index.php">Accueil <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/crud/monYoutube/connexion.html">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/crud/monYoutube/inscription.html">Inscription</a>
                </li>
            </ul>

        </div>
    </nav>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4" >Envoi de fichier video</h1>
        </div>
    </div>
    <div class="container">
    <form action="enregister-video.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Titre</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="titre"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Image miniature</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Vidéo</label>
                <input type="file" class="form-control-file" id="exampleFormControlFile1" name="video">
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>

    </form>
    </div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php
}
else //redirection vers connexion.html
{
    header('Location: /crud/monYoutube/connexion.html');
}



?>