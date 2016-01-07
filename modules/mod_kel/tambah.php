<div id="judul_content"><h2>TAMBAH KELURAHAN</h2></div><br />
<div align="right"><a href="./index.php?mod=home&opt=kel&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=kel&opts=validasi&mode=1" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>KECAMATAN</td>
    <td><select name="wilayah" id="wilayah">
        <?php
        $t = mysql_query("select * from ref_kecamatan");
        while($t1 = mysql_fetch_array($t))
        {
	
            	echo '<option value="'.$t1["id_kecamatan"].'">'.$t1["kecamatan"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>NAMA KELURAHAN</td>
    <td><input type="text" name="nama" size="60" required="required"/></td>
</tr>
<tr id="tbl-content">
	<td></td>
	<td><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>