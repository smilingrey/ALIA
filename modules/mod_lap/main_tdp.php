<script type="text/javascript">
	function tampil(c,uid)
	{
			var t=document.getElementById("div_cek_"+c);
			if(t.innerHTML != ''){
				t.innerHTML = '';
			}
			else
				t.innerHTML='<iframe src="./modules/mod_ho/tampil.php?link='+c+'&id_user='+uid+'" width="100%" style="height:800px" frameborder="0" scrolling="no" id="iframe_detail"></iframe>';
			
	}
	function Kirim_Cari()
	{
		var y ='<?php echo $_GET["halaman"]; ?>';
		var s;
		s='./index.php?mod=home&opt=lap&opts=tdp';
		//s='agenda_masuk.php?opts=view';
		if(y>1)
			s=s+'&halaman=1';
		if (document.fcari.tgl1.value!='')
		{
			s=s+'&tgl1='+document.fcari.tgl1.value;
		}
		if (document.fcari.tgl2.value!='')
		{
			s=s+'&tgl2='+document.fcari.tgl2.value;
		}			
		if (document.fcari.nama.value!='')
		{
			s=s+'&nama='+document.fcari.nama.value;
		}
		if (document.fcari.nim.value!='')
		{
			s=s+'&nim='+document.fcari.nim.value;
		}		
		document.location.href=s;
	}
	function Kirim_Cari1()
	{
		var nama ='<?php echo $_GET["nama"]; ?>';
		var nim ='<?php echo $_GET["nim"]; ?>';
		var tgl1 ='<?php echo $_GET["tgl1"]; ?>';
		var tgl2 ='<?php echo $_GET["tgl2"]; ?>';		
		var s;
		s='./index.php?mod=home&opt=lap&opts=tdp';
		//s='agenda_masuk.php?opts=view';
		if(tgl1 != '')
			s=s+'&tgl1='+tgl1;
		if(tgl2 != '')
			s=s+'&tgl2='+tgl2;		
		if(nama != '')
			s=s+'&nama='+nama;
		if(nim != '')
			s=s+'&nim='+nim;			
		s=s+'&halaman='+document.f2.halaman.value;
		document.location.href=s;
	}
</script>
<script type="text/javascript">
      $(document).ready(function(){
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

<div id="judul_content"><h2>LAPORAN ARSIP TANDA DAFTAR PERUSAHAAN</h2></div>


		<form name="fcari" method="post">
        <table cellpadding="4px" cellspacing="0px" border="0" align="left"id="tbl" >
        <tr id="tbl-label">
            <td width="30%" align="right">TANGGAL TERBIT MULAI</td>
            <td align="left"><input type="date" name="tgl1" id="tgl1" size="12" readonly="readonly"/>&nbsp;
            s.d&nbsp;<input type="date" name="tgl2" id="tgl2" size="12" readonly="readonly" /></td>
        </tr>  
        <tr id="tbl-label">
            <td width="30%" align="right">NOMOR IZIN</td>
            <td align="left" ><input type="nama" name="nama" id="nama" size="60"/>&nbsp;</td>
        </tr>
        <tr id="tbl-label">
            <td width="30%" align="right" >PERUSAHAAN</td>
            <td align="left" ><input type="nim" name="nim" id="nim" size="30"/>&nbsp;</td>
        </tr>            
        <tr id="tbl-content">
        	<td ></td>
            <td ><button type="button" onclick="Kirim_Cari();">CARI</button></td>
        </tr>
        </table>
        </form>


<?php

	if(!empty($_GET["nama"]) || !empty($_GET["nim"]) || !empty($_GET["tgl1"]) || !empty($_GET["tgl2"])) 
	{
		$up = '';
		$ada = 1;
		if(!empty($_GET["tgl1"]) || !empty($_GET["tgl2"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." date(tgl_sk)>='".$_GET["tgl1"]."' and date(tgl_sk)<='".$_GET["tgl2"]."' ";
			$ada++;
		}		
		if(!empty($_GET["nama"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." no_sk like '%".$_GET["nama"]."%'";
			$ada++;		
		}
		if(!empty($_GET["nim"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." nama_perusahaan like '%".$_GET["nim"]."%'";
			$ada++;			
		}		

	}
	if(!empty($_GET["nama"]) || !empty($_GET["nim"]) || !empty($_GET["tgl1"]) || !empty($_GET["tgl2"]))
	{
		$qsrt = mysql_query("select * from tbl_tdp where id_tdp is not null and ".$up."");
	}
	else
	{
		$qsrt = mysql_query("select * from tbl_tdp");
	}	
	$batas = 20;
	$halaman = $_GET["halaman"];
	
	if(empty($halaman))
	{
		$posisi = 0;
		$halaman = 1;
	}
	else
		$posisi = ($halaman - 1) * $batas;
		
					
	$jmldata = mysql_num_rows($qsrt);
	$jmlhal  = ceil($jmldata/$batas);

	if(!empty($_GET["nama"]) || !empty($_GET["nim"]) || !empty($_GET["tgl1"]) || !empty($_GET["tgl2"]))
	{
		$qsrt = mysql_query("select * from tbl_tdp where id_tdp is not null and ".$up." order by no_sk limit ".$posisi.",".$batas."");
	}
	else
	{
		$qsrt = mysql_query("select * from tbl_tdp order by no_sk limit ".$posisi.",".$batas."");
	}
	echo '<span > <BR>JUMLAH DATA: '.$jmldata;
	echo '<form name=f2><span>';
	echo '<span >HALAMAN: <select name=halaman onchange="javascript:Kirim_Cari1();">';
	echo '<option value="'.$halaman.'" selected="selected">'.$halaman.'</option>';
		for($i = 1; $i <= $jmlhal; $i++)
			if ($i!=$halaman)
			{
				echo '<option values="'.$i.'">'.$i.'</option>';
			}
	echo '</option>';
	echo '</select>';
	echo ' DARI '.$jmlhal.' HALAMAN</span>';
	echo '</span></form>';
?>
	<div><a href="./modules/mod_lap/cetak_tdp.php?nama=<?php echo $_GET["nama"];?>&nim=<?php  echo $_GET["nim"];?>&tgl1=<?php  echo $_GET["tgl1"];?>&tgl2=<?php  echo $_GET["tgl2"];?>" class="link" target="_blank"><button>CETAK</button></a></div><br />
    <table cellpadding="3" cellspacing="1" align="center" id="tbl" width="100%">
    <tr id="tbl-label">
        <td width="5%">NO</td>
        <td >NOMOR TDP</td>
        <td >PERUSAHAAN</td>
        <td >ALAMAT PERUSAHAAN</td>
        <td >PENANGGUNGJAWAB/PEMILIK</td>
        <td >KEGIATAN USAHA POKOK</td>
        <td >MASA BERLAKU</td>
        <td >STATUS</td>
        <td >TGL TERBIT</td>
        <td >NOMOR KOTAK</td>
        <td >NOMOR BUNGKUS</td>
    </tr>

<?php
     if(mysql_num_rows($qsrt) == '')
     {
     ?>
     <tr id="tbl-content">
     <td colspan="11">Data tidak Ditemukan</td>
     </tr>
     <?php
     }
     $i = $posisi + 1;
     while($bsrt = mysql_fetch_array($qsrt))
     {
	 $onc = "tampil('".$bsrt[0]."')";
	 
	$qry  = mysql_query("select nama from tbl_kotak where id_kotak='".$bsrt["id_kotak"]."'");
	$qrys = mysql_fetch_array($qry);
	$kotak=$qrys["nama"];
	
	$qry  = mysql_query("select nama from tbl_bungkus where id_bungkus='".$bsrt["id_bungkus"]."'");
	$qrys = mysql_fetch_array($qry);
	$bungkus=$qrys["nama"];		 
?>
	<tr id="tbl-content">
    	<td align="center" valign="top"><?php echo $i; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["no_sk"]; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["nama_perusahaan"]; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["alamat"]; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["pemilik"]; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["kegiatan"]; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["masa_berlaku"]; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["status"]; ?></td>        
		<td align="left" valign="top"><?php echo $bsrt["tgl_sk"]; ?></td>        
        <td align="left" valign="top"><?php echo $kotak; ?></td>
        <td align="left" valign="top"><?php echo $bungkus; ?></td>
    </tr>
<?php    
	$i++;
}


?>
</table>
