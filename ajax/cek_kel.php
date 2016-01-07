<?php
include("../libraries/connect.php");
$nim=$_GET["id_kecamatan"];
$qdokter=mysql_query("SELECT * FROM ref_kelurahan WHERE id_kecamatan='".$nim."'");

echo '<option value=0>-</option>';
 while($t1 = mysql_fetch_array($qdokter))
 {
	  echo '<option value="'.$t1["id_kelurahan"].'">'.$t1["kelurahan"].'</option>';
 }
?>
