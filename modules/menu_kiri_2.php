<script src="./libraries/script.js"></script>
<style type="text/css">@import "./css/styles.css";</style>
<div id='cssmenu'>
<ul>
<?php
	$a = mysql_query("select * from ref_menu");
	while($a1 = mysql_fetch_array($a))
	{
?>
   <li class='has-sub'><?php echo $a1["nama"]; ?></li>
   <ul>
<?php
	$d = mysql_query("select * from vw_akses where id_level='".$_SESSION["level"]."'");
	while($d1 = mysql_fetch_array($d))
	{   
?>
   	<li><a href="<?php echo $d1["opt"]; ?>"><?php echo $d1["submenu"]; ?></a></li>
<?php 
	}
?>
	</ul>
<?php 
	}
?>    
	<li><a href="./index.php?mod=home&opt=logout">LOGOUT</a></li>
</ul>
</div>
<ul class="nav12">
<?php
/*
	$d = mysql_query("select * from vw_akses where id_level='".$_SESSION["level"]."'");
	while($d1 = mysql_fetch_array($d))
	{
?>
	<li><a href="<?php echo $d1["opt"]; ?>"><?php echo $d1["submenu"]; ?></a></li>
    <!--<li><a href="./index.php?mod=home&opt=profil&opts=list">PROFIL USER</a></li>
    <li><a href="./index.php?mod=home&opt=member&opts=list">PENGGUNA LAIN</a></li>
    <li><a href="./index.php?mod=home&opt=jurusan&opts=list">JURUSAN</a></li>  
    <li><a href="./index.php?mod=home&opt=matakul&opts=list">MATA KULIAH</a></li>
    <li><a href="./index.php?mod=home&opt=mahasiswa&opts=list">DATA MAHASISWA</a></li>  
	<li><a href="./index.php?mod=home&opt=berkas&opts=list">FILE MAHASISWA</a></li>   
	<li><a href="./index.php?mod=home&opt=khs&opts=list">KARTU HASIL STUDI</a></li>
    <li><a href="./index.php?mod=home&opt=lap&opts=main">LAPORAN DATA MAHASISWA</a></li>-->

    
<?php
	}
	}
?>  <!--<li><a href="./index.php?mod=home&opt=overview&opts=list">OVERVIEW</a></li>
    <li><a href="./index.php?mod=home&opt=random&opts=list">RANDOM IMAGE</a></li>-->  
	<li><a href="./index.php?mod=home&opt=logout">LOGOUT</a></li>
</ul>
*/