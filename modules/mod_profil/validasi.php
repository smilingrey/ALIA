<?php
$nama = anti_injection($_POST["nama"]);
$alamat = anti_injection($_POST["alamat"]);
$telepon = anti_injection($_POST["telepon"]);
$email = anti_injection($_POST["email"]);
$username = anti_injection($_POST["username"]);
$password = md5(anti_injection($_POST["password"]));

if($nama == '' and $username == '')
{
?>
	<script type="text/javascript">
		alert('nama dan username tidak boleh kosong');
		document.location.href='./index.php?mod=home&opt=profil&opts=list';
	</script>
<?php
	exit();
}

if($email != '')
{
	cek_email($email, "./index.php?mod=home&opt=profil&opts=list");
}

if($telepon != '')
{
	cek_telepon($telepon, "./index.php?mod=home&opt=profil&opts=list");
}

if($$_POST["password"] == "")
{
	$d = mysql_query("update tbl_user  set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email', username='$username' where username='".$_SESSION["username"]."'");
}
else
{
	$d = mysql_query("update tbl_user  set nama='$nama', alamat='$alamat', telepon='$telepon', email='$email', username='$username', password='$password' where username='".$_SESSION["username"]."'");
}

if($d)
{
	benar("./index.php?mod=home&opt=profil&opts=list");
	$_SESSION["username"] == $username;
	exit();
}
else
{
	salah("./index.php?mod=home&opt=profil&opts=list");
	exit();
}
?>