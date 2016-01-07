<select name="kategori">
<option value="0">Pilih</option>
<?php
	include("../connect.php");
	
	$d = mysql_query("select * from tbl_kat_content where id_module='".$_GET["id_module"]."'");
	while($d1 = mysql_fetch_array($d))
	{
		echo '<option value="'.$d1["id_kat_content"].'">'.$d1["nama"].'</option>';
	}
?>
</select>