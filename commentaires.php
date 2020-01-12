<div class="jumbotron jumbotron-fluid">
<div class="container">
    <h1>Laissez un commentaire :</h1>
    <form method="post" action="video.php?id=<?php echo $_GET['id'];?>">
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Pseudo</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="1" name="pseudo"></textarea>
        </div>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Commentaire</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="commentaire"></textarea>
        </div>

        <input type="hidden" name="idcache" value="<?php echo $_GET['id'];?>">
        <input class="btn btn-primary" type="submit" value="Envoyer">
    </form>
</div>
</div>