<?php
if($_GET["mod"] != "login" and $_GET["opt"] != "auth")
{
?>
<link rel="stylesheet" type="text/css" href="./css/reset.css">
<link rel="stylesheet" type="text/css" href="./css/structure.css">
<script language="javascript" type="text/javascript">
	function setFocus()
	{
		document.loginForm.username.select();
		document.loginForm.username.focus();
	}
</script>
<?php
	echo str_replace(", ,", ".", ", , , ,");
?>

</head>

<body>

<form class="box login" action="index.php?mod=login&opt=auth" method="post" name="loginForm" id="loginForm">
    <fieldset class="boxBody"><center>
    	<img src="./deli_serdang_logo.png" width="50px" height="50px"/>
		<label>APLIKASI LAYANAN INFORMASI ARSIP</label></center>
    </fieldset>
    <fieldset class="boxBody">
	  <label>Username</label>
	  <input name="username" type="text" tabindex="1" placeholder="" required>
	  <!--<label><a href="#" class="rLink" tabindex="5">Forget your password?</a>Password</label>-->
      <label>Password</label>
	  <input name="password" type="password" tabindex="2" required>
	</fieldset>
	<footer>
      <input type="submit" class="btnLogin" value="Login" tabindex="4">
	</footer>
</form>
</body>


<?php
}
else
{
	$username = anti_injection($_POST["username"]);
	$password = md5(anti_injection($_POST["password"]));
	
	$d = mysql_query("select username, id_user, level from tbl_user where username='".$username."' and password='".$password."' and izin='Y'");
	if(mysql_num_rows($d)>=1)
	{
		$d1=mysql_fetch_array($d);
		$_SESSION["username"] = $username;
		$_SESSION["logged"] = "1";
		$_SESSION["level"] = $d1["level"];
		$_SESSION["id_user"] = $d1["id_user"];
	?>
    	<script type="text/javascript">
			document.location.href='./index.php';
		</script>
    <?php
		exit();
	}
	else
	{
	?>
    	<script type="text/javascript">
			alert('Anda salah memasukkan username dan password');
			document.location.href='./index.php';
		</script>
    <?php
	}
}
?>