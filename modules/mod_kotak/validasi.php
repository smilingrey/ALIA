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
				document.location.href='./index.php?mod=home&opt=kotak&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$d = mysql_query("insert into tbl_kotak (nama) values ('$nama')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=kotak&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kotak&opts=tambah");
	
		}
	}
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_kotak"] != 0)
	{
	
		if($nama == '')
		{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=kotak&opts=edit&id_user=<?php echo (int)$_GET["id_user"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update tbl_kotak  set nama='$nama' where id_kotak='".(int)$_GET["id_kotak"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=kotak&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=kotak&opts=edit&id_kotak=".(int)$_GET["id_kotak"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_kotak"] != 0)
	{
		$d = mysql_query("delete from tbl_kotak where id_kotak='".(int)$_GET["id_kotak"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=kotak&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kotak&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>