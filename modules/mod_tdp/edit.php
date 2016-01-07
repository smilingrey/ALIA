<script type="text/javascript">
      $(document).ready(function(){

		$("#kecamatan").change(function(){
			var idspes=$("#kecamatan").val();
			if(idspes=='0')
			{
				$("#kelurahan").html('<option value=0>-</option>');
			}
			else
			{
				$("#kelurahan").html('<option value=0>Loading</option>');
				$.ajax
				({
					url:'./ajax/cek_kel.php',
					data:'id_kecamatan='+idspes,
					success:function(data)
					{
						$("#kelurahan").html(data);
					}
					
				});
			 }
		});	
	  
	  
        $("#tgl1").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true					
        });
        $("#tgl2").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true					
        });					
		});
</script>
<?php
$id_tdp = (int)$_GET["id_tdp"];
$d = mysql_query("select * from tbl_tdp where id_tdp='$id_tdp'");
$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>EDIT DATA TDP</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=tdp&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=tdp&opts=validasi&mode=2&id_tdp=<?php echo $id_tdp; ?>" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NOMOR IZIN</td>
    <td><input type="text" name="surat" size="60"  id="surat" value="<?php echo $d1["no_sk"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>TGL TERBIT</td>
    <td><input type="text" name="tgl1" id="tgl1" size="12"  readonly="readonly" value="<?php echo $d1["tgl_sk"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>BERLAKU SAMPAI</td>
    <td><input type="text" name="tgl2" id="tgl2" size="12"  readonly="readonly" value="<?php echo $d1["masa_berlaku"]; ?>"/></td>
</tr>
<tr id="tbl-content">
	<td>JENIS DOKUMEN</td>
    <td><select name="jenis" id="jenis">
        <?php
        $t = mysql_query("select * from ref_jenis");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_jenis"]==$d1["id_jenis"])
			{
           		echo '<option value="'.$t1["id_jenis"].'" selected="selected">'.$t1["jenis"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_jenis"].'">'.$t1["jenis"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>STATUS</td>
    <td><input type="text" name="status" size="30"   value="<?php echo $d1["status"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>KEGIATAN USAHA POKOK</td>
    <td><input type="text" name="kegiatan" size="30"   value="<?php echo $d1["kegiatan"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>PEMILIK</td>
    <td><input type="text" name="pemilik" size="40"  value="<?php echo $d1["pemilik"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>NAMA PERUSAHAAN</td>
    <td><input type="text" name="perusahaan" size="40"  value="<?php echo $d1["nama_perusahaan"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>ALAMAT PERUSAHAAN</td>
    <td><input type="text" name="alamat" size="50"  value="<?php echo $d1["alamat"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>PROVINSI</td>
    <td><select name="provinsi" id="provinsi">
        <?php
        $t = mysql_query("select * from ref_provinsi order by wilayah");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_wilayah"]==$d1["id_provinsi"])
			{
           		echo '<option value="'.$t1["id_wilayah"].'" selected="selected">'.$t1["wilayah"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_wilayah"].'">'.$t1["wilayah"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>KABUPATEN</td>
    <td><select name="kabupaten" id="kabupaten">
        <?php
        $t = mysql_query("select * from ref_kabupaten order by wilayah");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_wilayah"]==$d1["id_kabupaten"])
			{
           		echo '<option value="'.$t1["id_wilayah"].'" selected="selected">'.$t1["wilayah"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_wilayah"].'">'.$t1["wilayah"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>KECAMATAN</td>
    <td><select name="kecamatan" id="kecamatan">
        <?php
        $t = mysql_query("select * from ref_kecamatan order by kecamatan");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_kecamatan"]==$d1["id_kecamatan"])
			{
           		echo '<option value="'.$t1["id_kecamatan"].'" selected="selected">'.$t1["kecamatan"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_kecamatan"].'">'.$t1["kecamatan"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>KECAMATAN LAIN</td>
    <td><input type="text" name="kecamatan_lain" size="30" value="<?php echo $d1["kecamatan_lain"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>KECAMATAN</td>
    <td><select name="kelurahan" id="kelurahan">
        <?php
        $t = mysql_query("select * from ref_kelurahan order by kelurahan");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_kelurahan"]==$d1["id_kelurahan"])
			{
           		echo '<option value="'.$t1["id_kelurahan"].'" selected="selected">'.$t1["kelurahan"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_kelurahan"].'">'.$t1["kelurahan"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>KELURAHAN LAIN</td>
    <td><input type="text" name="kelurahan_lain" size="30" value="<?php echo $d1["kelurahan_lain"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>NOMOR KOTAK</td>
    <td><select name="kotak" id="kotak">
        <?php
        $t = mysql_query("select * from tbl_kotak");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_kotak"]==$d1["id_kotak"])
			{
           		echo '<option value="'.$t1["id_kotak"].'" selected="selected">'.$t1["nama"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_kotak"].'">'.$t1["nama"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>NOMOR BUNGKUS</td>
    <td><select name="bungkus" id="bungkus">
        <?php
        $t = mysql_query("select * from tbl_bungkus");
        while($t1 = mysql_fetch_array($t))
        {
		 	if($t1["id_bungkus"]==$d1["id_bungkus"])
			{
           		echo '<option value="'.$t1["id_bungkus"].'" selected="selected">'.$t1["nama"].'</option>';
			}
			else
            	echo '<option value="'.$t1["id_bungkus"].'">'.$t1["nama"].'</option>';
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