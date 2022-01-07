<?php
	require 'red_bean_db_connect.php';

	$data = $_POST;
	if(isset($data['do_register'])){
		//регистрация
		$errors = array();
		if(trim($data['login']) == ""){
			$errors[] = 'Введите логин!';
		}
		if($data['password'] == ""){
			$errors[] = 'Введите пароль!';
		}
		if($data['password_2'] != $data['password']){
			$errors[] = 'Повторный пароль указан неверно!';
		}
		if(R::count('users', "login = ?", array($data['login']))>0){
			$errors[] = 'Пользователь уже существует';
		}
		if(empty($errors)){
			// ошибок нет, можно регистрироваться
			$user = R::dispense('users');
			$user->login = $data['login'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			R::store($user);
			$_SESSION['logged_user'] = $user;
      header('Location: /index.php');
		} else{
      echo '<div class="container block-danger text-center"><strong>Ошибка!</strong>'.array_shift($errors).'</div>';
		}
	}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Регистрация</title>
  <meta charset="utf-8">
  <!-- local import -->
  <link rel="stylesheet" href="../../css/auth.css" />
  <script src="../js/script.js"></script>
  <!-- web import -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
  </script>
</head>

<body>

  <div class="container">
    <div class="block-blue">
      <form method="POST" action="register.php">
        <legend>Регистрация</legend>
        <div class="form-group">
          <label for="Login">Логин</label>
          <input type="text" class="form-control" id="first" name="login" placeholder="Логин"
            value="<?php echo @$data['login']; ?>">
        </div>
        <div class="form-group">
          <label for="Password">Пароль</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Пароль">
        </div>
        <div class="form-group">
          <label for="Password">Повторите пароль</label>
          <input type="password" class="form-control" id="password" name="password_2" placeholder="Повторите пароль">
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-cyber" name="do_register">Зарегистрироваться</button>
          <button class="btn btn-cyber" type="button" onclick="document.location='login.php'">Уже есть аккаунт?</button>
          <button class="btn btn-cyber" type="button" onclick="document.location='../../index.php'">Отмена</button>
        </div>
      </form>
    </div>
  </div>

</body>

</html>