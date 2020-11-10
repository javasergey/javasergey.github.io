<?php  
$num = 5;
$page = (int)$_GET['page'];

$count = mysqli_query($connection1, " SELECT COUNT(*) FROM `articles1` ");
$temp = mysqli_fetch_assoc($count);

if($temp[0])
{
	$tempcount = $temp;

	$total = (($tempcount - 1) / $num) + 1;
	$total = intval($total);

	$page = intval($page);

	if(empty($page) or $page < 0) $page = 1;
	if($page > $total) $page = $total;

	$start = $page * $num - $num;

	$query_start_num = " LIMIT $start, $num";


}
?>




<?php 

	if($page != 1){ $pstr_prev = '<li><a class="pstr_prev" href="articles.php?page='.($page - 1).'"><</a></li>';}
	if($page != $total){ $psrt_next = '<li><a class="pstr_next" href="articles.php?page='.($page + 1).'"><</a></li>'; }
	
	if($page - 5 > 0) $page5left = '<li><a href="articles.php?page='.($page - 5).'">'.($page - 5).'</a></li>';
	if($page - 4 > 0) $page4left = '<li><a href="articles.php?page='.($page - 4).'">'.($page - 4).'</a></li>';
	if($page - 3 > 0) $page3left = '<li><a href="articles.php?page='.($page - 3).'">'.($page - 3).'</a></li>';
	if($page - 2 > 0) $page2left = '<li><a href="articles.php?page='.($page - 2).'">'.($page - 2).'</a></li>';
	if($page - 1 > 0) $page1left = '<li><a href="articles.php?page='.($page - 1).'">'.($page - 1).'</a></li>';

	if($page + 5 <= $total) $page5right = '<li><a href="articles.php?page='.($page + 5).'">'.($page + 5).'</a></li>';
	if($page + 4 <= $total) $page4right = '<li><a href="articles.php?page='.($page + 4).'">'.($page + 4).'</a></li>';
	if($page + 3 <= $total) $page3right = '<li><a href="articles.php?page='.($page + 3).'">'.($page + 3).'</a></li>';
	if($page + 2 <= $total) $page2right = '<li><a href="articles.php?page='.($page + 2).'">'.($page + 2).'</a></li>';
	if($page + 1 <= $total) $page1right = '<li><a href="articles.php?page='.($page + 1).'">'.($page + 1).'</a></li>';

	if($page + 5 < $total)
	{
		$strtotal =  '<li><p class="nav-dots">...</p></li><li><a href="articles.php?page='.$total.'">'.$total.'</a></li>';
	}else
	{
		$strtotal = "";
	}

	if($total > 1)
	{
		echo '<div class="pstrnav"><ul>';
		echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='articles.php?page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
		echo '</ul>
			</div>';
	}

 ?>


<ul class="pagination">
	<li><a href="" class="pstr_prev"><</a></li>
	<li><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li><a href="#">6</a></li>
	<li><a href="#">7</a></li>
	<li><a href="#">8</a></li>
	<li><a href="#" class="psrt_next">></a></li>

</ul>
