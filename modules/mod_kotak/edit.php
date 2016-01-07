<?php
$id_kotak = (int)$_GET["id_kotak"];
$d = mysql_query("select * from tbl_kotak where id_kotak='$id_kotak'");
$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>EDIT NOMOR KOTAK</h2></div><br />
<div align="right"><a href="./index.php?mod=home&opt=kotak&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=kotak&opts=validasi&mode=2&id_kotak=<?php echo $id_kotak; ?>&nama=<?php echo $d1["produk"]; ?>" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NOMOR KOTAK</td>
    <td><input type="text" name="nama" size="60" value="<?php echo $d1["nama"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td></td>
    <td ><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>