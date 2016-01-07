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
	  
	  	$("#surat").keyup(function(){
		var nim=$("#surat").val();
			$("#cat").html('');
			$.ajax
			({
				url:'./ajax/cek_nomor_siup.php',
				data:'nim='+nim,
				success:function(data)
				{
					$("#cat").html(data);
					if(data==''){
						$("#simpan").removeAttr("disabled");	
					}
					else
					$("#simpan").attr("disabled","disabled");						
				}
				
			});		
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

<div id="judul_content"><h2>TAMBAH DATA SIUP</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=siup&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=siup&opts=validasi&mode=1" method="post">

<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NOMOR SIUP</td>
    <td><input type="text" name="surat" size="60"  id="surat" required/><div id="cat" style="color:#FF0000;font-size:14px"></div></td>
</tr>
<tr id="tbl-content">
	<td>TGL TERBIT</td>
    <td><input type="text" name="tgl1" id="tgl1" size="12"  readonly="readonly" /></td>
</tr>
<tr id="tbl-content">
	<td>BERLAKU SAMPAI</td>
    <td><input type="text" name="tgl2" id="tgl2" size="12"  readonly="readonly" /></td>
</tr>
<tr id="tbl-content">
	<td>JENIS DOKUMEN</td>
    <td><select name="jenis" id="jenis">
        <?php
        $t = mysql_query("select * from ref_jenis");
        while($t1 = mysql_fetch_array($t))
        {
	
			echo '<option value="'.$t1["id_jenis"].'">'.$t1["jenis"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>NAMA PERUSAHAAN</td>
    <td><input type="text" name="perusahaan" size="30"   required/></td>
</tr>
<tr id="tbl-content">
	<td>ALAMAT PERUSAHAAN</td>
    <td><input type="text" name="alamat" size="50"  required/></td>
</tr>
<tr id="tbl-content">
	<td>PROVINSI</td>
    <td><select name="provinsi" id="provinsi">
        <?php
        $t = mysql_query("select * from ref_provinsi order by wilayah");
        while($t1 = mysql_fetch_array($t))
        {
	
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
	
			echo '<option value="'.$t1["id_kecamatan"].'">'.$t1["kecamatan"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td>KECAMATAN LAIN</td>
    <td><input type="text" name="kecamatan_lain" size="30" value="-" required/></td>
</tr>
<tr id="tbl-content">
	<td>KELURAHAN</td>
    <td><select name="kelurahan" id="kelurahan">
        </select></td>
</tr>
<tr id="tbl-content">
	<td>KELURAHAN LAIN</td>
    <td><input type="text" name="kelurahan_lain" size="30" value="-" required/></td>
</tr>
<tr id="tbl-content">
	<td>NPWP</td>
    <td><input type="text" name="npwp" size="40"  required/></td>
</tr>
<tr id="tbl-content">
	<td>NILAI MODAL KEKAYAAN BERSIH</td>
    <td><input type="text" name="modal" size="40"   required/></td>
</tr>
<tr id="tbl-content">
	<td>KEGIATAN USAHA</td>
    <td><input type="text" name="kegiatan" size="40"   required/></td>
</tr>
<tr id="tbl-content">
	<td>BIDANG USAHA</td>
    <td><input type="text" name="bidang" size="40"   required/></td>
</tr>
<tr id="tbl-content">
	<td>JENIS BARANG/JASA DAGANGAN UTAMA</td>
    <td><textarea name="dagangan" rows="4" cols="30"   required></textarea></td>
</tr>
<tr id="tbl-content">
	<td>KELEMBAGAAN</td>
    <td><input type="text" name="kelembagaan" size="40"   required/></td>
</tr>
<tr id="tbl-content">
	<td>PEMILIK</td>
    <td><input type="text" name="pemilik" size="40"  required/></td>
</tr>
<tr id="tbl-content">
	<td>ALAMAT PEMILIK</td>
    <td><input type="text" name="alamat_pemilik" size="40"  required/></td>
</tr>

<tr id="tbl-content">
	<td>NOMOR KOTAK</td>
    <td><select name="kotak" id="kotak">
        <?php
        $t = mysql_query("select * from tbl_kotak");
        while($t1 = mysql_fetch_array($t))
        {
	
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
	
			echo '<option value="'.$t1["id_bungkus"].'">'.$t1["nama"].'</option>';
        }
        ?>
        </select></td>
</tr>
<tr id="tbl-content">
	<td></td>
    <td ><button type="submit" id="simpan" disabled="disabled">SIMPAN</button></td>
</tr>
</table>
</form>