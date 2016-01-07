<?php
$nama = anti_injection($_POST["nama"]);
$nip = anti_injection($_POST["nip"]);
$jabatan = anti_injection($_POST["jabatan"]);
$pangkat = anti_injection($_POST["pangkat"]);

if($nama == '' and $nip == '')
{
?>
	<script type="text/javascript">
		alert('nama dan nip tidak boleh kosong');
		document.location.href='./index.php?mod=home&opt=ttd&opts=list';
	</script>
<?php
	exit();
}


	$d = mysql_query("update tbl_ttd set nama='$nama', nip='$nip', jabatan='$jabatan', pangkat='$pangkat'");


if($d)
{
	benar("./index.php?mod=home&opt=ttd&opts=list");
	exit();
}
else
{
	salah("./index.php?mod=home&opt=ttd&opts=list");
	exit();
}
?>