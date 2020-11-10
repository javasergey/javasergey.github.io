<?php 
	require "include/config.php";
	require "include/db_redbean.php";
 ?>

<!DOCTYPE HTML>
<html lang="ru">

<head>

	<meta charset="utf-8">
	<!-- <base href="/"> -->

	<title>HI-TECH инфа</title>
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
	<link rel="stylesheet" href="articles_media.css">

</head>

<body>
	

<?php include 'include/header.php';?>



<ul class="header-nav header-nav1">
	<?php 
					
		foreach ( $categories as $cat )
		{
			?>
			<li><a href="/articles.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a></li>
			<?php 
		}
	 ?>
</ul>

	
	
</header>

<div class="main-content">
	<div class="container">
		<div class="row">
			<div class="col-8">
				
				<div class="main-content-articles-row">
						
<?php 

$per_page = 4;
$page = 1;

if(isset($_GET['page'])){
	$page = (int) $_GET['page'];
}

$total_count_q = mysqli_query($connection1, "SELECT COUNT(`id`) AS `total_count` FROM `articles1`");

$total_count = mysqli_fetch_assoc($total_count_q);
$total_count = $total_count['total_count'];
$total_pages = ceil($total_count / $per_page);

if($page <= 1 || $page > $total_pages){
	$page = 1;
}

$offset = ($per_page * $page) - $per_page;

$articles1 = mysqli_query($connection1, "SELECT * FROM `articles1` ORDER BY `id` ASC LIMIT $offset, $per_page");

$articles_exist = true;

if(mysqli_num_rows($articles1) <= 0)
{
	echo 'нет статей';
	$articles_exist = false;
}

 ?>


 <?php 
 	while( $art = mysqli_fetch_assoc($articles1) ){
	?>

 				<div class="col-md-12 col-lg-6 mt-4 px-0">

					<div class="main-content-article mx-3">
						<div class="article-img"><a href="/article.php?id=<?php echo $art['id'];?>"><img src="img/<?php echo $art['image']; ?>" alt=""></a></div>
						<div class="article-text">
							<a href="/article.php?id=<?php echo $art['id'];?>" class="article-header"><?php echo $art['title']; ?></a>
							<p class="article-p"><?php echo mb_substr($art['text'], 0, 85, 'utf-8' ) . ' ..' ?></p>
							<div class="article-meta">
								<p class="article-meta-date article-meta-all"><img src="img/icons/date.png" width="10" alt=""><span><?php echo $art['date']; ?></span></p>
								<a href="#" class="article-meta-user article-meta-all"><img src="img/icons/user.png" width="10" alt=""><span><?php echo $art['user']; ?></span></a>
								<p class="article-meta-comments article-meta-all"><img src="img/icons/views.png" width="10" alt=""><span><?php echo $art['views']; ?></span></p>
							</div>
						</div>
					</div>
				</div>
					

<?php
 	}

 	if($articles_exist = true)
	{
		echo '<div class="pagination">';
		if($page > 1)
		{
			echo '<a href="articles.php?page='.($page - 1).'">Назад</a>';
		}
		if($page < $total_pages)
		{
			echo '<a class="pag-button-next" href="articles.php?page='.($page + 1).'">Больше статей</a>';
		}
		echo '</div>';
	}
  ?>
					
				</div>
			</div>
				<div class="col-4">
					
				<div class="sidebar">
					<div class="sidebar-header">Последние записи</div>

					<?php 
						$articles = mysqli_query($connection1, "SELECT * FROM articles1 ORDER BY `date` DESC");
					 ?>

					 <?php 
					 	while( $art = mysqli_fetch_assoc($articles) ){
					 		?>
					 		<div class="sidebar-item">

					 			<div class="sidebar-item-cont">
									<a href="/article.php?id=<?php echo $art['id'];?>"><img src="img/<?php echo $art['image']; ?>" width="40" height="40"></a>
									<a href="/article.php?id=<?php echo $art['id'];?>"><?php echo $art['title']; ?></a>
								</div>
								<p class="sidebar-item-date"><?php echo $art['pubtime']; ?></p>
							</div>

					 		<?php
					 	}
					  ?>

					<!-- <div class="sidebar-item">
						<div class="sidebar-item-cont">
							<img src="img/icons/small.jpg" width="40" height="40" alt="">
							<a href="#">Лучшие WEB-приложения на Android для разработчика</a>
						</div>
						<p class="sidebar-item-date">10.02.19</p>
					</div> -->
					

					</div>

					<div class="subscribe scroll-fixed-subscribe">
						
						<h5>Подписка</h5>
						<p>Подпишись на самые интересные статьи!</p>
						<input type="text" placeholder="Ваш email">
						<div class="subscribe-button"><a href="#">Подписаться</a></div>

					</div>

				</div>
			</div>
		</div>
	</div>
</div>




<?php include 'include/footer.php'; ?>








<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/scripts.min.js"></script>
<script>

$().ready(function(){

$(window).on('scroll', function(){
	if($(window).scrollTop() >= 800){
		$('.scroll-fixed-subscribe').css({'position':'fixed','top':'0'});
		$('.sidebar').hide();

	}else{
		$('.scroll-fixed-subscribe').css({'position':'relative','top':'0'});
		$('.sidebar').show();
		
	}
	});

	var link = $(".menu-link");

	link.click(function(){
		link.toggleClass("menu-link_active");
		$(".header-nav1").slideToggle('fast');
		$(".header-nav1 a").css('text-align','center');
		

	});
});

</script>

</body>
</html>