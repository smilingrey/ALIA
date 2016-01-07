<script type="text/javascript">
      $(document).ready(function(){

		$("#wilayah").change(function(){
			var id_wilayah=$("#wilayah").val();
			if(id_wilayah==0)
			{
				$("#kab").html('<option value=0>Pilih Kabupaten</option>');
			}
			else
			{
				$("#kab").html('<option value=0>Loading</option>');
				$.ajax
				({
					url:'./ajax/cek_wilayah.php',
					data:'id_wilayah='+id_wilayah,
					success:function(data)
					{
						$("#kab").html(data);
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
        $("#tgl3").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true					
        });
        $("#tgl4").datepicker({
					dateFormat  : "yy-mm-dd",        
          changeMonth : true,
          changeYear  : true					
        });						
		});
</script>
<?php
$id_tanah = (int)$_GET["id_tanah"];
$d = mysql_query("select * from tbl_tanah where id_tanah='$id_tanah'");
$d1 = mysql_fetch_array($d);
?>
<div id="judul_content"><h2>EDIT DATA SURAT TANAH</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=st&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=st&opts=validasi&mode=2&id_tanah=<?php echo $id_tanah; ?>" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NOMOR SURAT KET. TANAH</td>
    <td><input type="text" name="surat" size="60"  id="surat" value="<?php echo $d1["no_sk"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>TGL SURAT KET. TANAH</td>
    <td><input type="text" name="tgl1" id="tgl1" size="12"  readonly="readonly" value="<?php echo $d1["tgl_sk"]; ?>"/></td>
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
	<td>LUAS TANAH (m<sup>2</sup>)</td>
    <td><input type="text" name="luas" size="30"   value="<?php echo $d1["luas"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>PEMILIK</td>
    <td><input type="text" name="pemilik" size="40"  value="<?php echo $d1["pemilik"]; ?>" required/></td>
</tr>
<tr id="tbl-content">
	<td>ALAMAT</td>
    <td><input type="text" name="alamat" size="50"  value="<?php echo $d1["alamat"]; ?>" required/></td>
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