<script type="text/javascript">
	function Kirim_Cari()
	{
		var y ='<?php echo $_GET["halaman"]; ?>';
		var s;
		s='./index.php?mod=home&opt=prov&opts=list';
		//s='agenda_masuk.php?opts=view';
		if(y>1)
			s=s+'&halaman=1';
		if (document.fcari.nama.value!='')
		{
			s=s+'&nama='+document.fcari.nama.value;
		}
		document.location.href=s;
	}
	function Kirim_Cari1()
	{
		var nama ='<?php echo $_GET["nama"]; ?>';
		var s;
		s='./index.php?mod=home&opt=prov&opts=list';
		//s='agenda_masuk.php?opts=view';
		if(nama != '')
			s=s+'&nama='+nama;
		s=s+'&halaman='+document.f2.halaman.value;
		document.location.href=s;
	}
</script>


<div id="judul_content"><h2>DATA PROVINSI</h2></div>


		<form name="fcari" method="post">
        <table cellpadding="4px" cellspacing="0px" border="0" align="left"id="tbl" >
        <tr id="tbl-label">
            <td width="30%" align="right">NAMA PROVINSI:</td>
            <td align="left" ><input type="nama" name="nama" id="nama" size="60"/>&nbsp;</td>
        </tr>
        <tr id="tbl-content">
        	<td ></td>
            <td ><button type="button" onclick="Kirim_Cari();">CARI</button></td>
        </tr>
        </table>
        </form>


<?php

	if(!empty($_GET["nama"])) 
	{
		$up = '';
		$ada = 1;
		if(!empty($_GET["nama"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." wilayah like '%".$_GET["nama"]."%'";
			$ada++;
		}

	}
	if(!empty($_GET["nama"])) 
	{
		$qsrt = mysql_query("select * from ref_provinsi where id_wilayah is not null and ".$up."");
	}
	else
	{
		$qsrt = mysql_query("select * from ref_provinsi");
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

	if(!empty($_GET["nama"])) 
	{
		$qsrt = mysql_query("select * from ref_provinsi where id_wilayah is not null and ".$up." limit ".$posisi.",".$batas."");
	}
	else
	{
		$qsrt = mysql_query("select * from ref_provinsi  limit ".$posisi.",".$batas."");
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
	<div><a href="./index.php?mod=home&opt=prov&opts=tambah" class="link" title="Klik untuk tambah"><button>TAMBAH PROVINSI</button></a></div><br />
    <table cellpadding="3" cellspacing="1" align="center" id="tbl" width="100%">
    <tr id="tbl-label">
        <td width="5%">NO</td>
        <td align="left">NAMA PROVINSI</td>
        <td width="10%">EDIT</td>
        <td width="10%">HAPUS</td>
    </tr>

<?php
     if(mysql_num_rows($qsrt) == '')
     {
     ?>
     <tr id="tbl-content">
     <td colspan="5">Data tidak Ditemukan</td>
     </tr>
     <?php
     }
     $i = $posisi + 1;
     while($bsrt = mysql_fetch_array($qsrt))
     {
?>
	<tr id="tbl-content">
    	<td align="center" valign="top"><?php echo $i; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["wilayah"]; ?></td>
        <td align="center" valign="top"><a class="edit" href="./index.php?mod=home&opt=prov&opts=edit&id_prov=<?php echo $bsrt["id_wilayah"]; ?>"><button>EDIT</button></a></td>
        <td align="center" valign="top"><a class="hapus" href="./index.php?mod=home&opt=prov&opts=validasi&mode=3&id_prov=<?php echo $bsrt["id_wilayah"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\nNama: ' + '<?php echo $bsrt["wilayah"]; ?>' + '\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')"><button>HAPUS</button></a></td>
    </tr>
<?php
	$i++;
}


?>
</table>

