<div id="judul_content"><h2>PENGGUNA LAIN</h2></div><br />

<a href="./index.php?mod=home&opt=member&opts=tambah" class="link" title="Klik untuk tambah pengguna"><button>TAMBAH PENGGUNA</button></a><br /><br />
<table cellpadding="3" cellspacing="1" align="center" id="tbl" width="100%">
<tr id="tbl-label">
	<td>NO</td>
	<td>NAMA</td>
    <td>ALAMAT</td>
    <td>TELEPON</td>
    <td>EMAIL</td>
    <td>USERNAME</td>
    <td>LEVEL</td>
    <td>IZIN</td>
    <td>EDIT</td>
    <td>HAPUS</td>
</tr>
<?php
$d = mysql_query("select count(*) as jumlah from tbl_user where username<>'".$_SESSION["username"]."'");
$d1 = mysql_fetch_array($d);
$jumlah = $d1["jumlah"];

$batas = 20;
$posisi = 0;

if((int)$_GET["page"] != 0)
	$posisi = ($_GET["page"] -1) * $batas;
		
$i = $posisi + 1;
$d = mysql_query("select * from tbl_user where username<>'".$_SESSION["username"]."' limit $posisi, $batas");
while($d1 = mysql_fetch_array($d))
{
		$nmpri=mysql_query("select level from tbl_level where id_level='".$d1["level"]."'");
		$rnmpri = mysql_fetch_array($nmpri);

		$lev=$rnmpri["level"];

?>
	<tr id="tbl-content">
    	<td valign="top"><?php echo $i; ?></td>
        <td valign="top"><?php echo $d1["nama"]; ?></td>
        <td valign="top"><?php echo $d1["alamat"]; ?></td>
        <td valign="top"><?php echo $d1["telepon"]; ?></td>
        <td valign="top"><?php echo $d1["email"]; ?></td>
        <td valign="top"><?php echo $d1["username"]; ?></td>
        <td valign="top"><?php echo $lev; ?></td>
        <td valign="top" align="center"><?php echo $d1["izin"]; ?></td>
        <td valign="top" align="center"><a class="edit" href="./index.php?mod=home&opt=member&opts=edit&id_user=<?php echo $d1["id_user"]; ?>"><button>EDIT</button></a></td>
        <td valign="top" align="center"><a class="hapus" href="./index.php?mod=home&opt=member&opts=validasi&mode=3&id_user=<?php echo $d1["id_user"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\nNama: ' + '<?php echo $d1["nama"]; ?>' + '\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')"><button>HAPUS</button></a></td>
    </tr>
<?php
	$i++;
}


?>
</table>
<?php
if($jumlah > $batas)
	doPages($batas, 'index.php', 'mod=home&opt=member&opts=list', $jumlah);
?>