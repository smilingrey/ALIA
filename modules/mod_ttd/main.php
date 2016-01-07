<?php
	$d = mysql_query("select * from tbl_ttd");
	$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>PENANDA TANGAN</h2></div><br />

<form action="./index.php?mod=home&opt=ttd&opts=validasi" method="post">
<table cellpadding="3" cellspacing="1" id="tbl">
<tr id="tbl-content">
	<td colspan="2">PENANDA TANGAN I (KANAN)</td>
</tr>
<tr id="tbl-content">
	<td>Nama</td>
    <td><input type="text" name="nama" size="30" value="<?php echo $d1["nama"]; ?>" required="required"/></td>
</tr>
<tr id="tbl-content">
	<td>NIP</td>
    <td><input type="text" name="nip" size="30" value="<?php echo $d1["nip"]; ?>" required="required"/></td>
</tr>
<tr id="tbl-content">
	<td>Jabatan</td>
    <td><input type="text" name="jabatan" size="60" value="<?php echo $d1["jabatan"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Pangkat</td>
    <td><input type="text" name="pangkat" size="30" value="<?php echo $d1["pangkat"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td colspan="2">PENANDA TANGAN II (KIRI)</td>
</tr>
<tr id="tbl-content">
	<td>Nama</td>
    <td><input type="text" name="nama" size="30" value="<?php echo $d1["nama1"]; ?>" required="required"/></td>
</tr>
<tr id="tbl-content">
	<td>NIP</td>
    <td><input type="text" name="nip" size="30" value="<?php echo $d1["nip1"]; ?>" required="required"/></td>
</tr>
<tr id="tbl-content">
	<td>Jabatan</td>
    <td><input type="text" name="jabatan" size="60" value="<?php echo $d1["jabatan1"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Pangkat</td>
    <td><input type="text" name="pangkat" size="30" value="<?php echo $d1["pangkat1"]; ?>"/></td>
</tr>
<tr id="tbl-content">	
	<td></td>
	<td><button type="submit">SIMPAN</button> <button type="button" onclick="self.history.back()">BATAL</button></td>
</tr>
</table>
</form>