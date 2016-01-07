<?php
$nama = anti_injection($_POST["nama"]);

if((int)$_GET["mode"] == 1)
{
	if($nama == '' )
	{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=prov&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$qry_id="select id_wilayah from ref_provinsi where right(id_wilayah,2)='00' order by id_wilayah desc limit 1";
		$exec_qry=mysql_query($qry_id);
		
		
		$get_id=mysql_fetch_array($exec_qry);
		$last_id=substr($get_id["id_wilayah"],0,2);
		$id_wil=(int)$last_id+1 .'00';
		echo $id_wil;
		echo $last_id;
		$d = mysql_query("insert into ref_provinsi (id_wilayah,wilayah) values ('$id_wil','$nama')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=prov&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=prov&opts=tambah");
	
		}
	}
}
else if((int)$_GET["mode"] == 2)
{
	if($_GET["id_prov"] != 0)
	{
	
		if($nama == '')
		{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=prov&opts=edit&id_prov=<?php echo $_GET["id_prov"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update ref_provinsi set wilayah='$nama' where id_wilayah='".$_GET["id_prov"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=prov&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=prov&opts=edit&id_wilayah=".$_GET["id_prov"]);
			}
		}
	}
	else
		failed();

}
else if((int)$_GET["mode"] == 3)
{
	if($_GET["id_prov"] != 0)
	{
		$d = mysql_query("delete from ref_provinsi where id_wilayah='".$_GET["id_prov"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=prov&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=prov&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>