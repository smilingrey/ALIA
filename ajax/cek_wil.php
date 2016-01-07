<?php
include("../libraries/connect.php");
$id_prop=substr($_GET["id_wilayah"],0,2);
$qdokter=mysql_query("SELECT * FROM tbl_wilayah WHERE left(id_wilayah,2)='".$id_prop."' and right(id_wilayah,2)<>'00'");


	echo '<option value=0>SEMUA KABUPATEN</option>';
	 while($t1 = mysql_fetch_array($qdokter))
	 {
		  echo '<option value="'.$t1["id_wilayah"].'">'.$t1["wilayah"].'</option>';
	 }
?>
