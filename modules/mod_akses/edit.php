<?php
$id_akses = (int)$_GET["id_akses"];
$d = mysql_query("select * from ref_akses where id_akses='$id_akses'");
$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>EDIT MENU</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=akses&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=akses&opts=validasi&mode=2&id_akses=<?php echo $id_akses; ?>&nama=<?php echo $d1["produk"]; ?>" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>MENU</td>
    <td><select name="nama" id="nama">
        <?php
        $t = mysql_query("select * from ref_submenu order by id_menu,id_submenu");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_submenu"]==$d1["id_submenu"])
			{
           		echo '<option value="'.$t1["id_submenu"].'" selected="selected">'.$t1["submenu"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_submenu"].'">'.$t1["submenu"].'</option>';
        }
		?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td></td>
    <td ><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>