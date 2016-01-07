<?php
$id_user = (int)$_GET["id_user"];
$d = mysql_query("select * from tbl_user where id_user='$id_user'");
$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>EDIT PENGGUNA</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=member&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=member&opts=validasi&mode=2&id_user=<?php echo $d1["id_user"]; ?>&username=<?php echo $d1["username"]; ?>" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
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
    <td><input type="password" name="password" size="30" /></td>
</tr>
<tr id="tbl-content">
	<td>Level</td>
    <td><select name="level" id="level">
        <option value="00">Pilih Level</option>
        <?php
        $t = mysql_query("select * from tbl_level where id_level <>'1'");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_level"]==$d1["level"])
			{
           		echo '<option value="'.$t1["id_level"].'" selected="selected">'.$t1["level"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_level"].'">'.$t1["level"].'</option>';
        }
        ?>
        </select>
	</td></tr>
<tr id="tbl-content">
	<td>Izin</td>
    <td><input type="radio" value="Y" name="izin" <?php if($d1["izin"] == 'Y') echo 'checked'; ?> />YA&nbsp;&nbsp;&nbsp;<input type="radio" value="N" name="izin" <?php if($d1["izin"] == 'N') echo 'checked'; ?> />TIDAK</td>
</tr>
<tr id="tbl-content">
	<td></td><td><button type="submit">SIMPAN</button>&nbsp;<button type="button" onclick="self.history.back()">BATAL</button></td>
</tr>
</table>
</form>