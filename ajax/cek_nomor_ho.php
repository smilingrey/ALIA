<?php
include("../libraries/connect.php");
$nim=$_GET["nim"];
$qdokter=mysql_query("SELECT no_sk FROM tbl_ho WHERE no_sk='".$_GET["nim"]."'");
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
