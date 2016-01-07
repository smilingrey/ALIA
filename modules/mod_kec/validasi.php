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
				document.location.href='./index.php?mod=home&opt=kec&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$id_prov=$wilayah;
		$qry_id="select id_kecamatan from ref_kecamatan where id_kabupaten ='$id_prov' order by id_kecamatan desc limit 1";
		$exec_qry=mysql_query($qry_id);
		
		
		$get_id=mysql_fetch_array($exec_qry);
		$last_id=substr($get_id["id_kecamatan"],0,2);
		$last_id=(int)$last_id+1;
		$l_id=strval($last_id);
		$id_wil=$l_id.'0';
		//echo $qry_id;

		//echo $last_id;
		//echo "insert into ref_wilayah (id_wilayah,wilayah) values ('$id_wil','$nama')";
		$d = mysql_query("insert into ref_kecamatan (id_kecamatan,kecamatan,id_kabupaten) values ('$id_wil','$nama','$wilayah')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=kec&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kec&opts=tambah");
	
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
				document.location.href='./index.php?mod=home&opt=kec&opts=edit&id_prov=<?php echo $_GET["id_prov"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update ref_kecamatan set kecamatan='$nama' where id_kecamatan='".$_GET["id_prov"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=kec&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=kec&opts=edit&id_wilayah=".$_GET["id_prov"]);
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
		$d = mysql_query("delete from ref_kecamatan where id_kecamatan='".$_GET["id_prov"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=kec&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kec&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>