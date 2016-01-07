<script type="text/javascript">
	function tampil(c,uid)
	{
			var t=document.getElementById("div_cek_"+c);
			if(t.innerHTML != ''){
				t.innerHTML = '';
			}
			else
				t.innerHTML='<iframe src="./modules/mod_siup/tampil.php?link='+c+'&id_user='+uid+'" width="100%" style="height:800px" frameborder="0" scrolling="no" id="iframe_detail"></iframe>';
			
	}
	function Kirim_Cari()
	{
		var y ='<?php echo $_GET["halaman"]; ?>';
		var s;
		s='./index.php?mod=home&opt=siup&opts=list';
		//s='agenda_masuk.php?opts=view';
		if(y>1)
			s=s+'&halaman=1';
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
		var s;
		s='./index.php?mod=home&opt=siup&opts=list';
		//s='agenda_masuk.php?opts=view';
		if(nama != '')
			s=s+'&nama='+nama;
		if(nim != '')
			s=s+'&nim='+nim;			
		s=s+'&halaman='+document.f2.halaman.value;
		document.location.href=s;
	}
</script>


<div id="judul_content"><h2>DATA SURAT IZIN USAHA PERDAGANGAN</h2></div>


		<form name="fcari" method="post">
        <table cellpadding="4px" cellspacing="0px" border="0" align="left"id="tbl" >
        <tr id="tbl-label">
            <td width="30%" align="right">NOMOR SIUP</td>
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

	if(!empty($_GET["nama"]) || !empty($_GET["nim"])) 
	{
		$up = '';
		$ada = 1;
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
	if(!empty($_GET["nama"]) || !empty($_GET["nim"])) 
	{
		$qsrt = mysql_query("select * from tbl_siup where id_siup is not null and ".$up."");
	}
	else
	{
		$qsrt = mysql_query("select * from tbl_siup");
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

	if(!empty($_GET["nama"]) || !empty($_GET["nim"])) 
	{
		$qsrt = mysql_query("select * from tbl_siup where id_siup is not null and ".$up." order by no_sk limit ".$posisi.",".$batas."");
	}
	else
	{
		$qsrt = mysql_query("select * from tbl_siup order by no_sk limit ".$posisi.",".$batas."");
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
	<div><a href="./index.php?mod=home&opt=siup&opts=tambah" class="link" title="Klik untuk tambah"><button>TAMBAH DATA SIUP</button></a></div><br />
    <table cellpadding="3" cellspacing="1" align="center" id="tbl" width="100%">
    <tr id="tbl-label">
        <td width="5%">NO</td>
        <td align="left">NOMOR SIUP</td>
        <td align="left">PERUSAHAAN</td>
        <td align="left">NOMOR KOTAK</td>
        <td align="left">NOMOR BUNGKUS</td>
        <td width="10%">DETAIL</td>
        <td width="10%">EDIT</td>
        <td width="10%">HAPUS</td>
    </tr>

<?php
     if(mysql_num_rows($qsrt) == '')
     {
     ?>
     <tr id="tbl-content">
     <td colspan="8">Data tidak Ditemukan</td>
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
        <td align="left" valign="top"><?php echo $kotak; ?></td>
        <td align="left" valign="top"><?php echo $bungkus; ?></td>
		<td align="center" valign="top"><button type="button" onclick="<?php echo $onc;?>">DETAIL</button></a></td>        
        <td align="center" valign="top"><a class="edit" href="./index.php?mod=home&opt=siup&opts=edit&id_siup=<?php echo $bsrt["id_siup"]; ?>"><button>EDIT</button></a></td>
        <td align="center" valign="top"><a class="hapus" href="./index.php?mod=home&opt=siup&opts=validasi&mode=3&id_siup=<?php echo $bsrt["id_siup"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\nNomor Surat: ' + '<?php echo $bsrt["no_sk"]; ?>' + '\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')"><button>HAPUS</button></a></td>
    </tr>
<?php echo
    "<tr id='tbl-content'>
        <td colspan='8'> <div id='div_cek_$bsrt[0]'></div>
    </tr>";    
	$i++;
}


?>
</table>

