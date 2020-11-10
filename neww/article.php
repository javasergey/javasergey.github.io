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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


	<link rel="stylesheet" href="css/main.min.css">
<!-- 	<link rel="stylesheet" href="scss/main.scss"> -->
	<link rel="stylesheet" href="article.css">
	<link rel="stylesheet" href="article_media.css">
	<script type="text/javascript" src="https://vk.com/js/api/openapi.js?160"></script>
	<script type="text/javascript">
	  VK.init({apiId: 6902223, onlyWidgets: true});
	</script>
	

</head>

<body">


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


	<?php 
	$article = mysqli_query($connection1, "SELECT * FROM `articles1` WHERE `id` = " . (int) $_GET['id']);
	
	if( mysqli_num_rows($article) <= 0 ){
		?>

<div class="main-content" style="font-family: PT Sans;">
	<div class="container">
		<div class="row">
			<div class="col-8">
				
				<article class="article">
					Статья не найдена!

				</article>
				
			</div>
			<aside class="col-4">
					
				<div class="sidebar articles-last">
					<div class="sidebar-header">Последние записи</div>
					<?php 
						$articles = mysqli_query($connection1, "SELECT * FROM articles1 ORDER BY `date` DESC");
					 ?>

					 <?php 
					 	while( $art = mysqli_fetch_assoc($articles) ){
					 		?>
					 		<div class="sidebar-item">

					 			<div class="sidebar-item-cont">
									<img src="img/<?php echo $art['image']; ?>" width="40" height="40">
									<a href="/article.php?id=<?php echo $art['id'];?>"><?php echo $art['title']; ?></a>
								</div>
								<p class="sidebar-item-date"><?php echo $art['pubtime']; ?></p>
							</div>

					 		<?php
					 	}
					  ?>

				</div>

				<div class="subscribe scroll-fixed-subscribe" style="">
					
					<h5>Подписка</h5>
					<p>Подпишись на самые интересные статьи!</p>
					<input type="text" placeholder="Ваш email">
					<div class="subscribe-button"><a href="#">Подписаться</a></div>

				</div>
				

				<div class="sidebar scroll-fixed-recommended" style="margin-top:50px;font-size: 12px;">
					<div class="sidebar-header">Рекомендуемые</div>
					<div class="sidebar-item">
						<div class="sidebar-item-cont" style="margin-top: 10px;">
							<img src="img/icons/small.jpg" width="40" height="40" alt="">
							<a href="#">Лучшие WEB-приложения на Android для разработчика</a>
						</div>
						<p class="sidebar-item-date">10.02.19</p>
					</div>
					<div class="sidebar-item">
						<div class="sidebar-item-cont">
							<img src="img/icons/small.jpg" width="40" height="40" alt="">
							<a href="#">Лучшие WEB-приложения на Android для разработчика</a>
						</div>
						<p class="sidebar-item-date">10.02.19</p>
					</div>
					<div class="sidebar-item">
						<div class="sidebar-item-cont">
							<img src="img/icons/small.jpg" width="40" height="40" alt="">
							<a href="#">Лучшие WEB-приложения на Android для разработчика</a>
						</div>
						<p class="sidebar-item-date">10.02.19</p>
					</div>

					

				</div>

			</aside>

		</div>
	</div>
</div>

	<?php  
	} else{
		$art = mysqli_fetch_assoc($article);

		// comments_update
		mysqli_query($connection1, "UPDATE articles1 SET `views` = `views` + 1 WHERE `id` = " . (int) $art['id']);

		?>

<div class="main-content" style="font-family: PT Sans;">
	<div class="container">
		<div class="row">
			<div class="col-8">
				

			
				<article class="article">
					<h2 class="article-header-inside" style="font-family: PT Sans;"><?php echo $art['title']; ?></h2>
					<div class="article-meta-inside" style="display: flex;justify-content: flex-start;align-items: flex-start;margin-top: 20px;">
						<p class="article-inside-date" style="color:grey;font-size: 11px;font-weight: lighter;margin-top: 2px;"><img src="img/icons/date.png" width="10" alt="" style="margin-right: 5px;"><?php echo $art['date']; ?></p>
						<!-- <a href="#" class="article-inside-comments" style="color:grey;font-size: 13px;font-weight: lighter;margin-left: 10px;display: block;margin-left: 20px;"><img src="img/icons/comment.png" style="margin-right: 3px;" width="10" alt="">0</a> -->
						<p class="article-inside-views" style="color:grey;font-size: 13px;font-weight: lighter;position: absolute;right: 30px;margin-left: 10px;display: block;text-decoration: none;"><img src="img/icons/views.png" style="margin-right: 3px;" width="10" alt=""><?php echo $art['views']; ?></p>
						<a href="#" class="article-edit" style="color:grey;font-size: 13px;font-weight: lighter;margin-left: 10px;display: block;margin-left: 20px;"><?php echo $art['user'] ?></a>
					</div>
					<img src="img/<?php echo $art['image']; ?>" style="margin-bottom: 30px;width:100%;">
					<!-- CONTENTTTTTTTTTTTTTTTTTTTTTTTTTTTTT -->
					

					<?php echo $art['text']; ?><br>
					<br>
					<br>
				
					<div id="vk_comments"></div>

					<script type="text/javascript">
					VK.Widgets.Comments("vk_comments", {limit: 5, attach: "*"});
					
					</script>

					<!-- <div class="form-container" >
						<hr><br>
						<h4>Добавить комментарий</h4>
						<form class="new-comment-form" method='POST' action='#
						' style='margin-top:50px;'>
							
							<input id='yakor' type="text" name='name' placeholder='Имя' value=''>
							<input type="text" name='nickname' placeholder='никнейм' value=''>
							<input type="text" name='email' placeholder='email(не будет показан)' value=''><br><br>
							<textarea name="" id="" cols='80%' rows="3" name='text' placeholder="Текст комментария ..."></textarea><br>
							<button class="add-comment-button" name='do_post' style='background-color: black;color:white;'>Добавить комментарий</button>
						</form>
					</div> -->

				</article>
				
			</div>
			

			<aside class="col-4">
					
				<div class="sidebar articles-last">
					<div class="sidebar-header">Последние</div>
					<?php 
						$articles = mysqli_query($connection1, "SELECT * FROM articles1 ORDER BY `date` DESC LIMIT 10");
					 ?>

					 <?php 
					 	while( $art = mysqli_fetch_assoc($articles) ){
					 		?>
					 		<div class="sidebar-item">

					 			<div class="sidebar-item-cont">
									<img src="img/<?php echo $art['image']; ?>" width="40" height="40">
									<a href="/article.php?id=<?php echo $art['id'];?>"><?php echo $art['title']; ?></a>
								</div>
								<p class="sidebar-item-date"><?php echo $art['pubtime']; ?></p>
							</div>

					 		<?php
					 	}
					  ?>

				</div>

				<div class="subscribe scroll-fixed-subscribe" style="">
					
					<h5>Подписка</h5>
					<p>Подпишись на самые интересные статьи!</p>
					<form action="mailto:simracing11@mail.ru" method="$_GET">
						<input type="text" placeholder="Ваш email"><br><br>
						<div class="subscribe-button"><a href="#">Подписаться</a></div>
					</form>

				</div>
				
				<?php 

					$id = intval($_GET['id']);
					
					$articles = mysqli_query($connection1, "SELECT * FROM `articles1` WHERE `category_id` = 4 LIMIT 3");

				 ?>
				<div class="sidebar scroll-fixed-recommended" style="margin-top:50px;font-size: 12px;">
					<div class="sidebar-header">Рекомендуемые вам</div>
					<?php 
			 			while( $art = mysqli_fetch_assoc($articles) ){
			 		?>
					<div class="sidebar-item">
						<div class="sidebar-item-cont" style="margin-top: 10px;">
							<img src="img/<?php echo $art['image']; ?>" width="40" height="40" alt="">
							<a href="#"><?php echo $art['title']; ?></a>
						</div>
						<p class="sidebar-item-date"><?php echo $art['pubtime']; ?></p>
					</div>

					<?php } ?>

				</div>
			
			</aside>

		



		</div>
	</div>
</div>


	<?php

	}
 ?>




	



<?php include 'include/footer.php'; ?>









<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/scripts.min.js"></script>
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

<script>
	$().ready(function(){
	
	
	$(window).on('scroll', function(){
		if($(window).scrollTop() >= 1000){
			$('.scroll-fixed-subscribe').css({'position':'fixed','top':'0'});

		}else{
			$('.scroll-fixed-subscribe').css({'position':'relative','top':'0'});
			
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
