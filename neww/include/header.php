<header class="header">

	<div class="header-top">
		<div class="header-link-wrapper">
					
			<div class="header-logo-link" data-text="ht_info" class="header-logo-link"><a href="/"><?php echo $config['title']; ?></a></div>
			<img src="img/icons/grass2.png" class="logo-pic" width="82" alt="logo-pic">
		</div>

		<form method="POST" action="search.php" class="header-search">
			<input type="text" name="search" placeholder="Поиск">
			<input type="submit" name="submit" style="width:100px;display: none;">
			<img src="img/icons/search.png" alt="pic" width='15'>
		</form>
		<?php 
			
			if(isset($_POST['submit']))
			{
				$search = explode(" ", $_POST['search']);
				$count = strip_tags(trim(count($search)));
				$array = array();
				$i = 0;
				foreach($search as $key)
				{
					$i++;
					if($i < $count) $array[] = "CONCAT (`title`, `text`) LIKE '%".$key."%' OR"; else $array[] = "CONCAT (`title`, `text`) LIKE '%".$key."%'";

				}
				$sql = "SELECT * FROM `articles1` WHERE ".implode("", $array);
				$articles1 = mysqli_query($connection1, $sql);

				while($art1 = mysqli_fetch_assoc($articles1))
				{
					$id1 = $art1['id'];
					echo "<ul class='contact'><li><a class='search-link' href='article.php?id=$id1'>".$art1['title']."</a></br></li></ul>";
					
				} 
			}

		 ?>
		<!-- <div class="burger-button"> -->
			<a href="#" class="menu-link">
				<span class="menu_link_span"></span>
			</a>
		<!-- </div> -->
		
		<div class="header-right">
			
			<a href="addarticle.php" class="addarticle">Добавить статью</a>
			<div class="authorized">
				<a href="login.php">login</a>
				<a href="signup.php">sign up</a>

				
			</div>
			 <?php if( isset($_SESSION['logged_user']) ) : ?>
					<?php echo '<script> setTimeout(function(){$(\'.authorized\').fadeOut(\'fast\')}, 10); </script>'; ?>

				 	<p class="header_login"><?php echo $_SESSION['logged_user']->login; ?></p>
				 	<a class="header_logout" href="logout.php"> Выход</a>
				<?php else : ?>
					<p style="color:#fff;font-size: 13px;">Вы не авторизованы!</p><br>
				<?php endif ?>
		</div>
	</div>


	<?php 
		$categories_q = mysqli_query($connection1, "SELECT * FROM `articles_categories`");
		$categories = array();
		while ( $cat = mysqli_fetch_assoc($categories_q) ) {
			$categories[] = $cat;
		}
	 ?>


	<ul class="header-nav">
		<?php 
						
			foreach ( $categories as $cat )
			{
				?>
				<li><a href="/articles.php?id=<?php echo $cat['id']; ?>"><?php echo $cat['title']; ?></a></li>
				<?php 
			}
		 ?>
	</ul>