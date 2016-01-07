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
				document.location.href='./index.php?mod=home&opt=kel&opts=tambah';
			</script>
		<?php
	}
	else
	{
		$id_prov=$wilayah;
		$qry_id="select id_kelurahan from ref_kelurahan where id_kecamatan ='$id_prov' order by kode_kelurahan desc limit 1";
		$exec_qry=mysql_query($qry_id);
		
		
		$get_id=mysql_fetch_array($exec_qry);
		$last_id=$get_id["kode_kelurahan"];
		$last_id=(int)$last_id+1;
		$l_id=strval($last_id);
		if(strlen($last_id)==1)
		{
			$kd_wil='00'.$l_id;
			$id_wil=$id_prov.'00'.$l_id;
		}
		elseif(strlen($last_id)==2)
		{
			$kd_wil='0'.$l_id;
			$id_wil=$id_prov.'0'.$l_id;
		}
		else
		{
			$kd_wil=$l_id;
			$id_wil=$id_prov.$l_id;
		}
		//echo $qry_id;

		//echo $last_id;
		//echo "insert into ref_wilayah (id_wilayah,wilayah) values ('$id_wil','$nama')";
		$d = mysql_query("insert into ref_kelurahan (id_kelurahan,kelurahan,id_kecamatan,kode_kelurahan) values ('$id_wil','$nama','$wilayah','$kd_wil')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=kel&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kel&opts=tambah");
	
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
				document.location.href='./index.php?mod=home&opt=kel&opts=edit&id_prov=<?php echo $_GET["id_prov"]; ?>';
			</script>
		<?php
		}
		else
		{
			$d = mysql_query("update ref_kelurahan set kelurahan='$nama' where id_kelurahan='".$_GET["id_prov"]."'");
		
			
			if($d)
			{
				benar("./index.php?mod=home&opt=kel&opts=list");
			}
			else
			{
				salah("./index.php?mod=home&opt=kel&opts=edit&id_wilayah=".$_GET["id_prov"]);
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
		$d = mysql_query("delete from ref_kelurahan where id_kelurahan='".$_GET["id_prov"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=kel&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=kel&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>