<?php
require_once('./inc/init.php');
// jeprint_r($_SESSION);
?>

<!doctype html>
<html lang="fr">

<head>
  <title>La boutique - Connexion</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

<body>
  <main class="container m-4 mx-auto p-4">
    <div class="row">
      <div class="col-md-6 col-sm-12">
        <h1>La boutique - Connectez-vous!</h1>
        <form action="" method="POST" class="w-75 mx-auto">
          <div class="form-group">
            <label for="pseudo"></label>
            <input type="text" class="form-group" id="pseudo" name="pseudo" value="" placeholder="Pseudo" required>
            <?php
            // Echo $_POST['pseudo'] ?? '';
            ?>
          </div>
          <div class="form-group">
            <label for="mdp"></label>
            <input type="password" class="form-group" id="pseudo" name="pseudo" value="" placeholder="Mot de passe" required>
            <?php
            // Echo $_POST['mdp'] ?? '';
            ?>
          </div>
          <div>
            <input type="submit" class="btn btn-info btn-sm my-2">
            <input type="reset" class="btn btn-danger btn-sm my-2">
          </div>
        </form>
      </div>  <!-- fin de la colonne -->
    </div>  <!-- fin de la rangée -->
  </main>





  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>