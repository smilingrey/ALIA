<?php
	echo '<br>';
	$c = mysql_query("select * from tbl_overview where id_overview='1'");
	$d1 = mysql_fetch_array($c);
	echo $d1["overview"];
?>