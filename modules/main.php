<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<title>:: APLIKASI LAYANAN INFORMASI ARSIP ::</title>
<script type="text/javascript" src="./libraries/jquery.js"></script>

<style type="text/css">@import "./css/template.css";</style>
<style type="text/css">@import "./css/styles.css";</style>
<!--<style type="text/css">@import "./bootstrap/css/bootstrap-theme.css";</style>
<style type="text/css">@import "./bootstrap/css/bootstrap.css";</style>

<script type="text/javascript" src="./bootstrap/js/bootstrap.js"></script>
-->
<link rel="stylesheet" type="text/css" href="./libraries/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<link type="text/css" href="./libraries/development-bundle/themes/base/ui.all.css" rel="stylesheet" />
<link rel="stylesheet" href="./css/styles.css">


<script type="text/javascript" src="./libraries/development-bundle/ui/ui.core.js"></script>
<script type="text/javascript" src="./libraries/development-bundle/ui/ui.datepicker.js"></script>
<script type="text/javascript" src="./libraries/development-bundle/ui/i18n/ui.datepicker-id.js"></script>

</head>

<body>

 
<?php
if($_SESSION["logged"] == '1')
{
?>
<div id="wrapper">
<div id="main">
<table cellpadding="0" cellspacing="0" width="80%" align="center" id="shadow_table">
   
<!--<tr>
	<td valign="bottom"><?php //include("./modules/componen/link_atas.php"); ?></td>    
</tr>

<tr>
	<td valign="top">
    <?php //include ("./modules/componen/random.php"); ?>
    </td>
</tr> -->
<tr>
	<td height="32" bgcolor="#66a5ad" style="background: #fff;
	background: -moz-linear-gradient(top, #66a5ad, #000);
	background: -ms-linear-gradient(top, #66a5ad, #000);
	background: -o-linear-gradient(top, #66a5ad, #000);
	background: -webkit-linear-gradient(top, #66a5ad, #000);
	background: linear-gradient(top, #66a5ad, #000);
	padding: 15px 5px 5px 5px; height: 80px;
    color:#FFF; font-family:tahoma; font-weight:bold;">
    APLIKASI LAYANAN INFORMASI ARSIP</td>
</tr>
<tr>
	<td height="32" bgcolor="#66a5ad">
    </td>
</tr>
<tr>
	<td>
    	<table cellpadding="0" cellspacing="0" width="100%">
        <tr>
			<td width="230px" valign="top" bgcolor="#003b46">
			<?php 
				include("./modules/menu_kiri.php"); 
            ?>
            </td>
        	<td valign="top"  bgcolor="#c4dfe6" height="800"><?php include("./modules/menu_kanan.php"); ?></td>            
        </tr>
        
               
        </table>
    </td>
</tr>
<tr>
	<td height="40" bgcolor="#66a5ad">
    </td>
</tr>
<tr>
	<td height="40" bgcolor="#07575b" align="center">
    	<font face="Verdana, Arial, Helvetica, sans-serif" color="#FFFFFF" size="2">Copyright&copy;Kantor Perpustakaan, Arsip dan Dokumentasi Kabupaten Deli Serdang 2015
    	</font>
    </td>
</tr>

</table>
</div>
</div>
<?php
}
else
{
	include("./modules/mod_user/login.php");
}
?>
</body>
</html>
