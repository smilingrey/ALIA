<?php
$nama = anti_injection($_POST["nama"]);
$kode = anti_injection($_POST["kode"]);

if((int)$_GET["mode"] == 1)
{
	if($nama == '' )
	{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=akses&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$d = mysql_query("insert into ref_akses (id_submenu,id_level) values ('$nama','2')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=akses&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=akses&opts=tambah");
	
		}
	}
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_akses"] != 0)
	{
	
		if($nama == '')
		{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=akses&opts=edit&id_user=<?php echo (int)$_GET["id_user"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update ref_akses  set id_submenu='$nama' where id_akses='".(int)$_GET["id_akses"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=akses&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=akses&opts=edit&id_akses=".(int)$_GET["id_akses"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_akses"] != 0)
	{
		$d = mysql_query("delete from ref_akses where id_akses='".(int)$_GET["id_akses"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=akses&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=akses&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>