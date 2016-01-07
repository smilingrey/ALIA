<?php
$nama = anti_injection($_POST["nama"]);
$alamat = anti_injection($_POST["alamat"]);
$telepon = anti_injection($_POST["telepon"]);
$email = anti_injection($_POST["email"]);
$username = anti_injection($_POST["username"]);
$level = anti_injection($_POST["level"]);
$izin = anti_injection($_POST["izin"]);
$password = md5(anti_injection($_POST["password"]));

if((int)$_GET["mode"] == 1)
{
	if($nama == '' or $username == '' or $_POST["password"] == '' or $izin == '' or $level == '0' )
	{
	?>
		<script type="text/javascript">
			alert('isi dengan lengkap');
			document.location.href='./index.php?mod=home&opt=member&opts=tambah';
		</script>
	<?php
	}
	else
	{
		if($email != '')
		{
			if(cek_email($email) == false)
			{
				pesan('email tidak valid', './index.php?mod=home&opt=member&opts=tambah');
			}
		}
		
		if($telepon != '')
		{
			if(cek_telepon($telepon) == false)
			{
				pesan('no telepon tidak valid', './index.php?mod=home&opt=member&opts=tambah');
			}
		}
		
		$d = mysql_query("insert into tbl_user (nama, alamat, telepon, email, username, password, izin,level) values ('$nama','$alamat','$telepon','$email','$username', '$password', '$izin','$level')");
		
		if($d)
		{
			benar("./index.php?mod=home&opt=member&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=member&opts=tambah");
		}
	}
}
else if((int)$_GET["mode"] == 2)
{
	if((int)$_GET["id_user"] != 0)
	{
		if($nama == '' or $username == '' or $izin == '' or $level == '0')
		{
		?>
			<script type="text/javascript">
				alert('isi dengan lengkap');
				document.location.href='./index.php?mod=home&opt=member&opts=edit&id_user=<?php echo (int)$_GET["id_user"]; ?>';
			</script>
		<?php
		}
		else
		{
			if($email != '')
			{
				if(cek_email($email) == false)
				{
					pesan('email tidak valid', './index.php?mod=home&opt=member&opts=edit&id_user='.(int)$_GET["id_user"]);
				}
			}
			
			if($telepon != '')
			{
				if(cek_telepon($telepon) == false)
				{
					pesan('no telepon tidak valid', './index.php?mod=home&opt=member&opts=edit&id_user='.(int)$_GET["id_user"]);
				}
			}
			
			if($_POST["password"] == "")
			{
				$d = mysql_query("update tbl_user  set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email', username='$username', izin='$izin', level='$level' where id_user='".(int)$_GET["id_user"]."'");
			}
			else
			{
				$d = mysql_query("update tbl_user  set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email', username='$username', password='$password', izin='$izin', level='$level' where id_user='".(int)$_GET["id_user"]."'");
			}
			
			if($d)
			{
				benar("./index.php?mod=home&opt=member&opts=list");
				if($_GET["username"] == $_SESSION["username"])
					$_SESSION["username"] == $username;
			}
			else
			{
				salah("./index.php?mod=home&opt=member&opts=edit&id_user=".(int)$_GET["id_user"]);
			}
		}
	}
	else
		failed();
	

}
else if((int)$_GET["mode"] == 3)
{
	if((int)$_GET["id_user"] != 0)
	{
		$d = mysql_query("delete from tbl_user where id_user='".(int)$_GET["id_user"]."'");
		if($d)
		{
			benar("./index.php?mod=home&opt=member&opts=list");
		}
		else
		{
			salah("./index.php?mod=home&opt=member&opts=list");
		}
	}
	else
		failed();
}
else
	failed();
?>