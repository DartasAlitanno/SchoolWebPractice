<?php
header('Content-type: text/html; charset=utf-8');

if ((isset($_POST['cakeName']) && isset($_POST['cakeDiscription']) && isset($_POST['cakeRecipe'])) && (isset($_FILES) && $_FILES['inputfile']['error'] == 0)) {
  $mysql_connection = new mysqli('localhost', 'root', 'root', 'cake_bd');

  $destiation_dir = dirname(__FILE__ ).'\\img\\'.$_FILES['inputfile']['name'];
  move_uploaded_file($_FILES['inputfile']['tmp_name'], $destiation_dir);

  $root_for_current_dir = 'img//'.$_FILES['inputfile']['name'];

  if ($result = $mysql_connection->query("INSERT INTO `recipes` (`name`, `discription`, `recipe`, `image`) VALUE ('{$_POST["cakeName"]}','{$_POST["cakeDiscription"]}','{$_POST["cakeRecipe"]}','{$root_for_current_dir}')")) {
    // echo "Рецепт успешно добавлен.";
	  header('location: /recipes.php');
  } else {
    // echo "Произошла ошибка при добавлении рецепта.";
  }

  $mysql_connection->close();
} else {
  // echo "Ошибка при получении полей.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cake</title>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/script.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</head>

<body>

  <nav class="container navbar navbar-expand-lg navbar-light sticky-top" style="background-color: #f3dc73;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03"
      aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="index.php">
      <img src="img/brand.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
      Cake
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Главная</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="news.php">Новости</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recipes.php">Рецепты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="add_recipe.php">Добавить рецепт</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row text-center alert">
      <div class="col-12">
        <h1 class="display-4">Добавляйте свои рецепты</h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">
          Делитесь своими невероятными рецептами со всеми с онлайн сервисом Cake! Наш сервис позволяет удобно делиться
          своим творчеством, добавьте название и опишите Ваш торт, дайте пару советов в приготовлении, не забудте точно
          описать свой рецепт!
          Добавте фотографии торта в нашу библиотеку, чтобы заинтересовать пользователей!
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="cake_block">

      <form class="was-validated" method="post" action="add_recipe.php" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="cakeName">Название</label>
          <input type="text" class="form-control" id="cakeName" name="cakeName" placeholder="Малиновый рай" required>
        </div>

        <div class="mb-3">
          <label for="cakeDiscription">Описание и советы</label>
          <textarea class="form-control" id="cakeDiscription" name="cakeDiscription"
            placeholder="Дайте парочку советов по приготовлению." required rows="5"></textarea>
        </div>


        <div class="mb-3">
          <label for="cakeRecipe">Рецепт</label>
          <textarea class="form-control" id="cakeRecipe" name="cakeRecipe"
            placeholder="Подробно опишите рецепт приготовления вашего шедевра!" required rows="10"></textarea>
        </div>

        <div class="mb-3 custom-file">
          <input type="file" class="custom-file-input" id="customFile" name="inputfile" required>
          <label class="custom-file-label" for="customFile">Загрузите изображение</label>
          <div class="invalid-feedback">Поделитесь изображением своего торта со всеми!</div>
        </div>

        <script>
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
          var fileName = document.getElementById("customFile").files[0].name;
          var nextSibling = e.target.nextElementSibling;
          nextSibling.innerText = fileName;
        })
        </script>

        <div class="mb-3 text-center">
          <input type="submit" class="btn btn-primary" value="Опубликовать">
        </div>
      </form>

    </div>
  </div>

  <?php require "php/footer.php" ?>

</body>

</html>