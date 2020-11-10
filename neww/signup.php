<?php 
require "include/db_redbean.php";

$data = $_POST;
if( isset($data['do_signup']) )
{
	$errors = array();
	if( trim($data['login']) == '')
	{
		$errors[] = 'Введите логин!';
	}
	if( trim($data['email']) == '')
	{
		$errors[] = 'Введите email!';
	}
	if( $data['password'] == '')
	{
		$errors[] = 'Введите пароль!';
	}
	if( $data['password_2'] != $data['password'] )
	{
		$errors[] = 'Повторный пароль введен неверно!';
	}
	if( R::count('users', "login = ?", array($data['login'])) > 0)
	{
		$errors[] = 'Пользователь с таким логином уже существует!';
	}
	if( R::count('users', "email = ?", array($data['email'])) > 0)
	{
		$errors[] = 'Пользователь с таким email уже существует!';
	}
	if(empty($errors) )
	{
		$user = R::dispense('users');
		$user->login = $data['login'];
		$user->email = $data['email'];
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		R::store($user);



	}else
	{
		echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
	}
}


 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Страница регистрации</title>
</head>
<body>




 <form action="signup.php" method="POST">
		
	<p>
		<p>Ваш логин:</p>
		<input type="text" name="login" value="<?php echo @$data['login']; ?>">
	</p>
	<p>
		<p>Ваш email:</p>
		<input type="email" name="email" value="<?php echo @$data['email']; ?>">
	</p>
	<p>
		<p>Ваш пароль:</p>
		<input type="password" name="password" value="<?php echo @$data['password']; ?>">
	</p>
	<p>
		<p>Ваш пароль еще раз:</p>
		<input type="password" name="password_2" value="<?php echo @$data['password_2']; ?>">
	</p>
	<input type="submit" name="do_signup" value="Зарегистрироваться">

 </form>



</body>
</html>

