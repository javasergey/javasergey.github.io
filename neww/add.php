<?php 
	require "include/config.php";
 ?>

<!DOCTYPE HTML>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title><?php echo $config1['title']; ?></title>
	<meta name="description" content="">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="img/favicon/favicon.ico" rel="icon"/>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">

	<!-- Custom Browsers Color Start -->
	<meta name="theme-color" content="#000">
	<!-- Custom Browsers Color End -->

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	
	<link rel="stylesheet" href="style.css">
	

</head>

<body>


<?php include 'include/header.php';?>

	
</header>



<form action="add.php" method="post" style="margin-left: 50px;"><br>
	Название статьи<br>
	<input type="text" autofocus name="title"><br>
	Категория статьи<br>
	<input type="text" name="category_id"><br>
	Текст статьи<br>
	<textarea  cols="100" rows="7" name="text" id="editor" style="resize: none;"></textarea><br>

	Автор статьи<br>
	<input type="text" name="user"><br>
	<input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>">
	<input type="hidden" name="time" value="<?php echo date('H:i:s'); ?>">
	Имя файла<br>
	<input type="text" name="image"><br><br>
	<input type="submit" name="add" value="Добавить">
	
</form>

<?php 

	include_once ("include/db1.php");

	if(isset($_POST['add'])){

		$title = $_POST['title'];
		$text = $_POST['text'];
		$user = $_POST['user'];
		$date = $_POST['date'];
		$time = $_POST['time'];
		$image = strip_tags(trim($_POST['image']));
		$category_id = $_POST['category_id'];
		


		$result = mysqli_query($connection1, " 
			INSERT INTO articles1(`title`, `image`, `text`, `date`, `time`, `category_id`, `user`)
			VALUES ('$title', '$image', '$text', '$date', '$time', 'category_id', '$user')
			");


		if($result){
			echo "Статья добавлена!";
		}

		

	}

 ?>


<footer class="footer">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm">
				<div class="contacts footer-item"><a href="#">Контакты</a><a href="#">Реклама</a></div>
				<div class="copyright footer-item">
					<p>sm_news.ru © 2019</p>
				</div>
				<div class="about footer-item">
					<p><a href="#">cm_news.ru</a> - сайт с полезной информацией о новых технологиях в мире IT и в целом о современных тенденциях цифрового мира.</p>
				</div>
			</div>
		</div>
	</div>
</footer>









<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/scripts.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
<script>
        ClassicEditor
                .create( document.querySelector( '#editor' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"></script>
<script>
	var scene = document.getElementById('scene');
	var parallax = new Parallax(scene);
</script> -->

</body>
</html>
