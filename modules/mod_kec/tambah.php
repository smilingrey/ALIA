<div id="judul_content"><h2>TAMBAH KECAMATAN</h2></div><br />
<div align="right"><a href="./index.php?mod=home&opt=kec&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=kec&opts=validasi&mode=1" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>KABUPATEN</td>
    <td><select name="wilayah" id="wilayah">
        <?php
        $t = mysql_query("select * from ref_kabupaten");
        while($t1 = mysql_fetch_array($t))
        {
	
            	echo '<option value="'.$t1["id_wilayah"].'">'.$t1["wilayah"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>NAMA KECAMATAN</td>
    <td><input type="text" name="nama" size="60" required="required"/></td>
</tr>
<tr id="tbl-content">
	<td></td>
	<td><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>