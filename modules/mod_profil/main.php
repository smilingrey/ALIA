<?php
	$d = mysql_query("select * from tbl_user where username='".$_SESSION["username"]."'");
	$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>PROFIL USER</h2></div><br />

<form action="./index.php?mod=home&opt=profil&opts=validasi" method="post">
<table cellpadding="3" cellspacing="1" id="tbl">
<tr id="tbl-content">
	<td>Nama</td>
    <td><input type="text" name="nama" size="30" value="<?php echo $d1["nama"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Alamat</td>
    <td><input type="text" name="alamat" size="30" value="<?php echo $d1["alamat"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Telepon</td>
    <td><input type="text" name="telepon" size="30" value="<?php echo $d1["telepon"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Email</td>
    <td><input type="text" name="email" size="30" value="<?php echo $d1["email"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Username</td>
    <td><input type="text" name="username" size="30" value="<?php echo $d1["username"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>Password</td>
    <td><input type="password" name="password" size="30"/></td>
</tr>
<tr id="tbl-content">	
	<td></td>
	<td><button type="submit">SIMPAN</button> <button type="button" onclick="self.history.back()">BATAL</button></td>
</tr>
</table>
</form>