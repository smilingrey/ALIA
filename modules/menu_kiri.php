<script src="./libraries/script.js"></script>
<style type="text/css">@import "./css/styles.css";</style>
<div id='cssmenu'>
<ul>
<!--<li class='active'><a href='#'><span>BERANDA</span></a></li>-->
<?php
	$a = mysql_query("select * from ref_menu");
	while($a1 = mysql_fetch_array($a))
	{

   	echo '<li class="has-sub" id="'.str_replace(' ','',$a1["nama"]).'"><a href="#" ><span>'.$a1["nama"].'</span></a>';
	echo '<ul>';
		$d = mysql_query("select * from vw_akses where id_menu='".$a1["id_menu"]."' and id_level='".$_SESSION["level"]."'");
		while($d1 = mysql_fetch_array($d))
		{
			echo '<li><a rel="'.$d1["id_submenu"].'" href="'.$d1["opt"].'"><span>'.$d1["submenu"].'</span></a></li>';
		}	
		//echo '<li class="last"><a href="#"><span>'.$d1["submenu"].'</span></a></li>';
	echo '</ul>';
	echo '</li>';
	}
?>
<li class='last'><a href='./index.php?mod=home&opt=logout'><span>LOGOUT</span></a></li>
</ul>
</div>