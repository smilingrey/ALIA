<?php
$id_prov = $_GET["id_prov"];
$d = mysql_query("select * from ref_kabupaten where id_wilayah='$id_prov'");
$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>EDIT KABUPATEN</h2></div><br />
<div align="right"><a href="./index.php?mod=home&opt=kab&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=kab&opts=validasi&mode=2&id_prov=<?php echo $id_prov; ?>" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NAMA KABUPATEN</td>
    <td><input type="text" name="nama" size="60" value="<?php echo $d1["wilayah"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td></td>
    <td ><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>