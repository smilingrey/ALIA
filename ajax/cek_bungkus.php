<?php
include("../libraries/connect.php");
$nim=$_GET["nim"];
$qdokter=mysql_query("SELECT nama FROM tbl_bungkus WHERE nama='".$_GET["nim"]."'");
$t1=mysql_num_rows($qdokter);
if($t1>0)
{
	echo "Nomor ".$nim." sudah ada dalam database!";
}
else
{
	echo "";
}
?>
