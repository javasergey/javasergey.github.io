<?php 

$connection1 = mysqli_connect('localhost','mysql','mysql','test_db');

if( $connection1 == false ){
	echo 'не удалось подключиться';
	echo mysqli_connect_error();
	exit();
}









 ?>