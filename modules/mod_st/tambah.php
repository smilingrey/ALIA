<script type="text/javascript">
      $(document).ready(function(){
	  
	  	$("#surat").keyup(function(){
		var nim=$("#surat").val();
			$("#cat").html('');
			$.ajax
			({
				url:'./ajax/cek_nomor.php',
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
		});
</script>

<div id="judul_content"><h2>TAMBAH DATA SURAT TANAH</h2></div>
<div align="right"><a href="./index.php?mod=home&opt=st&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=st&opts=validasi&mode=1" method="post">

<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NOMOR SURAT KET. TANAH</td>
    <td><input type="text" name="surat" size="60"  id="surat" required/><div id="cat" style="color:#FF0000;font-size:14px"></div></td>
</tr>
<tr id="tbl-content">
	<td>TGL SURAT KET. TANAH</td>
    <td><input type="text" name="tgl1" id="tgl1" size="12"  readonly="readonly" /></td>
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
	<td>LUAS TANAH (m<sup>2</sup>)</td>
    <td><input type="text" name="luas" size="30"   required/></td>
</tr>
<tr id="tbl-content">
	<td>PEMILIK</td>
    <td><input type="text" name="pemilik" size="40"  required/></td>
</tr>
<tr id="tbl-content">
	<td>ALAMAT</td>
    <td><input type="text" name="alamat" size="50"  required/></td>
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
    <td ><button type="submit" id="simpan" disabled="disabled" >SIMPAN</button></td>
</tr>
</table>
</form>