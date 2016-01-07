<?php
$surat = anti_injection($_POST["surat"]);
$tgl1 = anti_injection($_POST["tgl1"]);
$jenis = anti_injection($_POST["jenis"]);
$luas = anti_injection($_POST["luas"]);
$pemilik = anti_injection($_POST["pemilik"]);
$alamat = anti_injection($_POST["alamat"]);
$kecamatan = anti_injection($_POST["kecamatan"]);
$kecamatan_lain = anti_injection($_POST["kecamatan_lain"]);
$id_kotak = anti_injection($_POST["kotak"]);
$id_bungkus = anti_injection($_POST["bungkus"]);

if((int)$_GET["mode"] == 1)
{

	if($surat == '')
	{
	?>
		<script type="text/javascript">
			alert('tidak boleh kosong');
			document.location.href='./index.php?mod=home&opt=st&opts=tambah';
		</script>
	<?php
	}
	else
	{
		$d = mysql_query("insert into tbl_tanah (no_sk,tgl_sk,luas,pemilik,alamat,id_kecamatan,kecamatan_lain,id_kotak,
													 id_bungkus,id_jenis) values 
											    ('$surat','$tgl1','$luas','$pemilik','$alamat','$kecamatan','$kecamatan_lain','$id_kotak',
													 '$id_bungkus','$jenis')");

		if($d)
		{
			benar("./index.php?mod=home&opt=st&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=st&opts=tambah");
		}
	}		
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_tanah"] != 0)
	{
	
		if($surat == '')
		{
		?>
			<script type="text/javascript">
				alert('tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=st&opts=edit&id_tanah=<?php echo (int)$_GET["id_tanah"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update tbl_tanah set no_sk='$surat',tgl_sk='$tgl1',luas='$luas',pemilik='$pemilik',
						      alamat='$alamat',id_kecamatan='$kecamatan',kecamatan_lain='$kecamatan_lain',
							  id_kotak='$id_kotak',id_bungkus='$id_bungkus',id_jenis='$jenis'						  						
							  where id_tanah='".$_GET["id_tanah"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=st&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=st&opts=edit&id_tanah=".$_GET["id_tanah"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_tanah"] != 0)
	{
		$d = mysql_query("delete from tbl_tanah where id_tanah='".$_GET["id_tanah"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=st&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=st&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>