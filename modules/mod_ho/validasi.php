<?php
$surat = anti_injection($_POST["surat"]);
$tgl1 = anti_injection($_POST["tgl1"]);
$tgl2 = anti_injection($_POST["tgl2"]);
$luas = anti_injection($_POST["luas"]);
$kegiatan = anti_injection($_POST["kegiatan"]);
$pemilik = anti_injection($_POST["pemilik"]);
$perusahaan = anti_injection($_POST["perusahaan"]);
$alamat = anti_injection($_POST["alamat"]);
$provinsi = anti_injection($_POST["provinsi"]);
$kabupaten = anti_injection($_POST["kabupaten"]);
$kelurahan = anti_injection($_POST["kelurahan"]);
$kecamatan = anti_injection($_POST["kecamatan"]);
$kecamatan_lain = anti_injection($_POST["kecamatan_lain"]);
$kelurahan_lain = anti_injection($_POST["kelurahan_lain"]);
$jenis = anti_injection($_POST["jenis"]);
$id_kotak = anti_injection($_POST["kotak"]);
$id_bungkus = anti_injection($_POST["bungkus"]);

if((int)$_GET["mode"] == 1)
{

	if($surat == '')
	{
	?>
		<script type="text/javascript">
			alert('tidak boleh kosong');
			document.location.href='./index.php?mod=home&opt=ho&opts=tambah';
		</script>
	<?php
	}
	else
	{
		$d = mysql_query("insert into tbl_ho (no_sk,tgl_sk,masa_berlaku,luas,pemilik,alamat,id_provinsi,id_kabupaten,
											  id_kecamatan,id_kelurahan,kelurahan_lain,kecamatan_lain,id_kotak,nama_perusahaan,
											  id_bungkus,id_jenis,kegiatan) values 
											 ('$surat','$tgl1','$tgl2','$luas','$pemilik','$alamat','$provinsi','$kabupaten',
											 '$kecamatan','$kelurahan','$kelurahan_lain','$kecamatan_lain','$id_kotak','$perusahaan',
											 '$id_bungkus','$jenis','$kegiatan')");

		if($d)
		{
			benar("./index.php?mod=home&opt=ho&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=ho&opts=tambah");
		}
	}		
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_ho"] != 0)
	{
	
		if($surat == '')
		{
		?>
			<script type="text/javascript">
				alert('tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=ho&opts=edit&id_ho=<?php echo (int)$_GET["id_ho"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update tbl_ho set no_sk='$surat',tgl_sk='$tgl1',masa_berlaku='$tgl2',luas='$luas',pemilik='$pemilik',
						     alamat='$alamat',id_provinsi='$provinsi',id_kabupaten='$kabupaten',
							  id_kecamatan='$kecamatan',kecamatan_lain='$kecamatan_lain',nama_perusahaan='$perusahaan',
							  id_kelurahan='$kelurahan',kelurahan_lain='$kelurahan_lain',
							  id_kotak='$id_kotak',id_bungkus='$id_bungkus',id_jenis='$jenis',kegiatan='$kegiatan' 
							  where id_ho='".$_GET["id_ho"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=ho&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=ho&opts=edit&id_ho=".$_GET["id_ho"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_ho"] != 0)
	{
		$d = mysql_query("delete from tbl_ho where id_ho='".$_GET["id_ho"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=ho&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=ho&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>