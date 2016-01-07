<?php
$nama = anti_injection($_POST["nama"]);
$wilayah = anti_injection($_POST["wilayah"]);

if((int)$_GET["mode"] == 1)
{
	if($nama == '' )
	{
		?>
			<script type="text/javascript">
				alert('nama tidak boleh kosong');
				document.location.href='./index.php?mod=home&opt=kab&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$id_prov=substr($wilayah,0,2);
		$qry_id="select id_wilayah from ref_kabupaten where left(id_wilayah,2)='$id_prov' order by id_wilayah desc limit 1";
		$exec_qry=mysql_query($qry_id);
		
		
		$get_id=mysql_fetch_array($exec_qry);
		$last_id=substr($get_id["id_wilayah"],2,2);
		$last_id=(int)$last_id+1;
		$l_id=strval($last_id);
		$id_wil=$id_prov.$l_id;
		//echo $qry_id;

		//echo $last_id;
		//echo "insert into ref_wilayah (id_wilayah,wilayah) values ('$id_wil','$nama')";
		$d = mysql_query("insert into ref_kabupaten (id_wilayah,wilayah,id_prov) values ('$id_wil','$nama','$wilayah')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=kab&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kab&opts=tambah");
	
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
				document.location.href='./index.php?mod=home&opt=kab&opts=edit&id_prov=<?php echo $_GET["id_prov"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update ref_kabupaten set wilayah='$nama' where id_wilayah='".$_GET["id_prov"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=kab&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=kab&opts=edit&id_wilayah=".$_GET["id_prov"]);
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
		$d = mysql_query("delete from ref_kabupaten where id_wilayah='".$_GET["id_prov"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=kab&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kab&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>