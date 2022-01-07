<?php
header('Content-type: text/html; charset=utf-8');

function get_all_recipes() {
  $mysql_connection = new mysqli('localhost', 'root', 'root', 'cake_bd');
  $all_recipes = array();
  if ($result = $mysql_connection->query("SELECT * FROM `recipes`")) {
    while ($row = $result->fetch_assoc()) {
      $all_recipes[] = $row;
    }
  }
  $mysql_connection->close();
  return $all_recipes;
}

function delete_recipe($id) {
  $mysql_connection = new mysqli('localhost', 'root', 'root', 'cake_bd');
  if ($result = $mysql_connection->query("DELETE FROM `recipes` WHERE `recipes`.`id` = $id")) {
    return get_all_recipes();
  }
  $mysql_connection->close();
}

if($_GET['id']) {
  $id = (int)$_GET['id'];
  $recipes = delete_recipe($id);
}

$recipes = get_all_recipes();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cake</title>
  <link rel="stylesheet" href="css/style.css">
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
          <a class="nav-link active" href="recipes.php">Рецепты</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_recipe.php">Добавить рецепт</a>
        </li>
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row text-center alert">
      <div class="col-12">
        <h1 class="display-4">Заголовок</h1>
      </div>
      <hr>
      <div class="col-12">
        <p class="lead">
          Научись готовить торты и десерты для себя или на заказ
        </p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-9">
        <div class="cake_block">
          <?php foreach($recipes as $key => $value) { ?>
          <h3 class="text-center"><a href="#"><?php echo $value['name']; ?></a></h3>
          <img src="<?php echo $value['image']; ?>" class="cake_block_img">
          <h6 class="lead"><em>Описание и советы: </em></h6>
          <p><?php echo $value['discription']; ?></p>
          <h6 class="lead"><em>Рецепт: </em></h6>
          <p><?php echo $value['recipe']; ?></p>
          <div class="text-right">
            <a href="recipes.php?id=<?php echo $value['id'] ?>" class="btn" type="submit" name="action"
              value="update">Удалить</a>
          </div>
          <?php if($value != end($recipes)){?>
          <hr class="cake_hr">
          <?php }} ?>
        </div>
      </div>
      <div class="col-3">
        <div class="side_block">
          <h6>Последние публикации: </h6>
          <?php foreach($recipes as $key => $value) { ?>
          <a href="#"><?php echo $value['name']; ?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>

  <?php require "php/footer.php" ?>

</body>

</html>