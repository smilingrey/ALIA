<?php
$surat = anti_injection($_POST["surat"]);
$tgl1 = anti_injection($_POST["tgl1"]);
$tgl2 = anti_injection($_POST["tgl2"]);
$status = anti_injection($_POST["status"]);
$perusahaan = anti_injection($_POST["perusahaan"]);
$kegiatan = anti_injection($_POST["kegiatan"]);
$pemilik = anti_injection($_POST["pemilik"]);
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
			document.location.href='./index.php?mod=home&opt=tdp&opts=tambah';
		</script>
	<?php
	}
	else
	{
		$d = mysql_query("insert into tbl_tdp (no_sk,tgl_sk,masa_berlaku,status,pemilik,alamat,
											  id_provinsi,id_kabupaten,nama_perusahaan,
											  id_kecamatan,id_kelurahan,kelurahan_lain,kecamatan_lain,id_kotak,
											  id_bungkus,id_jenis,kegiatan) values 
											  ('$surat','$tgl1','$tgl2','$status','$pemilik','$alamat',
											 '$provinsi','$kabupaten','$perusahaan',
											 '$kecamatan','$kelurahan','$kelurahan_lain','$kecamatan_lain','$id_kotak',
											 '$id_bungkus','$jenis','$kegiatan')");

		if($d)
		{
			benar("./index.php?mod=home&opt=tdp&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=tdp&opts=tambah");
		}
	}		
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_tdp"] != 0)
	{
	
		if($surat == '')
		{
		?>
			<script type="text/javascript">
				alert('tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=tdp&opts=edit&id_tdp=<?php echo (int)$_GET["id_tdp"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update tbl_tdp set no_sk='$surat',tgl_sk='$tgl1',masa_berlaku='$tgl2',status='$status',pemilik='$pemilik',
						     alamat='$alamat',id_provinsi='$provinsi',id_kabupaten='$kabupaten',nama_perusahaan='$perusahaan',
							  id_kecamatan='$kecamatan',kecamatan_lain='$kecamatan_lain',
							  id_kelurahan='$kelurahan',kelurahan_lain='$kelurahan_lain',
							  id_kotak='$id_kotak',id_bungkus='$id_bungkus',id_jenis='$jenis',kegiatan='$kegiatan' 
							  where id_tdp='".$_GET["id_tdp"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=tdp&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=tdp&opts=edit&id_tdp=".$_GET["id_tdp"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_tdp"] != 0)
	{
		$d = mysql_query("delete from tbl_tdp where id_tdp='".$_GET["id_tdp"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=tdp&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=tdp&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>