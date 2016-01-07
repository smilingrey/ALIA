<?php
$surat = anti_injection($_POST["surat"]);
$tgl1 = anti_injection($_POST["tgl1"]);
$tgl2 = anti_injection($_POST["tgl2"]);
$perusahaan = anti_injection($_POST["perusahaan"]);
$kegiatan = anti_injection($_POST["kegiatan"]);
$pemilik = anti_injection($_POST["pemilik"]);
$alamat = anti_injection($_POST["alamat"]);
$alamat_pemilik = anti_injection($_POST["alamat_pemilik"]);
$npwp = anti_injection($_POST["npwp"]);
$modal = anti_injection($_POST["modal"]);
$bidang = anti_injection($_POST["bidang"]);
$dagangan = anti_injection($_POST["dagangan"]);
$kelembagaan = anti_injection($_POST["kelembagaan"]);
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
			document.location.href='./index.php?mod=home&opt=siup&opts=tambah';
		</script>
	<?php
	}
	else
	{
		$d = mysql_query("insert into tbl_siup (no_sk,tgl_sk,masa_berlaku,nama_perusahaan,pemilik,alamat,id_provinsi,id_kabupaten,
											  id_kecamatan,id_kelurahan,kelurahan_lain,kecamatan_lain,id_kotak,
											  npwp,modal,bidang,dagangan,kelembagaan,alamat_pemilik,
											  id_bungkus,id_jenis,kegiatan) values 
											 ('$surat','$tgl1','$tgl2','$perusahaan','$pemilik','$alamat','$provinsi','$kabupaten',
											 '$kecamatan','$kelurahan','$kelurahan_lain','$kecamatan_lain','$id_kotak',
											 '$npwp','$modal','$bidang','$dagangan','$kelembagaan','$alamat_pemilik',
											 '$id_bungkus','$jenis','$kegiatan')");

		if($d)
		{
			benar("./index.php?mod=home&opt=siup&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=siup&opts=tambah");
		}
	}		
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_siup"] != 0)
	{
	
		if($surat == '')
		{
		?>
			<script type="text/javascript">
				alert('tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=siup&opts=edit&id_siup=<?php echo (int)$_GET["id_siup"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update tbl_siup set no_sk='$surat',tgl_sk='$tgl1',masa_berlaku='$tgl2',nama_perusahaan='$perusahaan',
							  pemilik='$pemilik',alamat='$alamat',id_provinsi='$provinsi',id_kabupaten='$kabupaten',
							  npwp='$npwp',modal='$modal',bidang='$bidang',kelembagaan='$kelembagaan',alamat_pemilik='$alamat_pemilik',
							  id_kecamatan='$kecamatan',kecamatan_lain='$kecamatan_lain',
							  id_kelurahan='$kelurahan',kelurahan_lain='$kelurahan_lain',
							  id_kotak='$id_kotak',id_bungkus='$id_bungkus',id_jenis='$jenis',kegiatan='$kegiatan' 
							  where id_siup='".$_GET["id_siup"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=siup&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=siup&opts=edit&id_siup=".$_GET["id_siup"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_siup"] != 0)
	{
		$d = mysql_query("delete from tbl_siup where id_siup='".$_GET["id_siup"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=siup&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=siup&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>