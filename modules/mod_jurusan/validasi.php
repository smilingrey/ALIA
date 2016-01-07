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
				document.location.href='./index.php?mod=home&opt=jurusan&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$d = mysql_query("insert into tbl_jurusan (nama) values ('$nama')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=jurusan&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=jurusan&opts=tambah");
	
		}
	}
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_jurusan"] != 0)
	{
	
		if($nama == '')
		{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=jurusan&opts=edit&id_user=<?php echo (int)$_GET["id_user"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update tbl_jurusan  set nama='$nama' where id_jurusan='".(int)$_GET["id_jurusan"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=jurusan&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=jurusan&opts=edit&id_jurusan=".(int)$_GET["id_jurusan"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_jurusan"] != 0)
	{
		$d = mysql_query("delete from tbl_jurusan where id_jurusan='".(int)$_GET["id_jurusan"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=jurusan&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=jurusan&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>