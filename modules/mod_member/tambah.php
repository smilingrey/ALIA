<div id="judul_content"><h2>TAMBAH PENGGUNA</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=member&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=member&opts=validasi&mode=1" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>Nama</td>
    <td><input type="text" name="nama" size="30" /></td>
</tr>
<tr id="tbl-content">
	<td>Alamat</td>
    <td><input type="text" name="alamat" size="30" /></td>
</tr>
<tr id="tbl-content">
	<td>Telepon</td>
    <td><input type="text" name="telepon" size="30" /></td>
</tr>
<tr id="tbl-content">
	<td>Email</td>
    <td><input type="text" name="email" size="30" /></td>
</tr>
<tr id="tbl-content">
	<td>Username</td>
    <td><input type="text" name="username" size="30" /></td>
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
        $t = mysql_query("select * from tbl_level");
        while($t1 = mysql_fetch_array($t))
        {
            echo '<option value="'.$t1["id_level"].'">'.$t1["level"].'</option>';
        }
        ?>
        </select>
	</td>
</tr>
<tr id="tbl-content">
	<td>Izin</td>
    <td><input type="radio" value="Y" name="izin" />YA&nbsp;&nbsp;&nbsp;<input type="radio" value="N" name="izin" />TIDAK</td>
</tr>
<tr id="tbl-content">
	<td></td><td><button type="submit">SIMPAN</button>&nbsp;<button type="button" onclick="self.history.back()">BATAL</button></td>
</tr>
</table>
</form>