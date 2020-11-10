<?php 
require "include/db_redbean.php";

$data = $_POST;
if( isset($data['do_login']) )
{
	$errors = array();
	$user = R::findOne('users', 'login = ?', array($data['login']));
	if( $user )
	{
		if( password_verify($data['password'], $user->password) )
		{
			$_SESSION['logged_user'] = $user;
			header ("Location: /");
			echo '<div style="color:green;">Вы авторизованы!Можете перейти на <a href="/">главную </a>страницу!</div><hr>';

		}else
		{
			$errors[] = 'Пароль введен неправильно!';
		}
	}else
	{
		$errors[] = "Пользователь с таким логином не найден!";
	}
	if( ! empty($errors) )
	{
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';

	}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
</head>
<body>

<form action="login.php" method="POST">
	
	<p>
		<p>логин:</p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>
	<p>
		<p>пароль:</p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	<p>
		
		<input type="submit" name="do_login" value="Войти">
	</p>


</form>
	
	
	
</body>
</html>