<div id="judul_content"><h2>AKSES PENGGUNA</h2></div>

<?php

	$qsrt = mysql_query("select * from vw_akses where id_level='2' order by id_menu,id_submenu");
		
?>
	<div><a href="./index.php?mod=home&opt=akses&opts=tambah" class="link" title="Klik untuk tambah"><button>TAMBAH AKSES PENGGUNA</button></a></div><br />
    <table cellpadding="3" cellspacing="1" align="center" id="tbl" width="100%">
    <tr id="tbl-label">
        <td width="5%">NO</td>
        <td align="left">MENU</td>
        <td width="10%">EDIT</td>
        <td width="10%">HAPUS</td>
    </tr>

<?php
     if(mysql_num_rows($qsrt) == '')
     {
     ?>
     <tr id="tbl-content">
     <td colspan="4">Data tidak Ditemukan</td>
     </tr>
     <?php
     }
     $i = $posisi + 1;
     while($bsrt = mysql_fetch_array($qsrt))
     {
?>
	<tr id="tbl-content">
    	<td align="center" valign="top"><?php echo $i; ?></td>
        <td align="left" valign="top"><?php echo $bsrt["submenu"]; ?></td>
        <td align="center" valign="top"><a class="edit" href="./index.php?mod=home&opt=akses&opts=edit&id_akses=<?php echo $bsrt["id_akses"]; ?>"><button>EDIT</button></a></td>
        <td align="center" valign="top"><a class="hapus" href="./index.php?mod=home&opt=akses&opts=validasi&mode=3&id_akses=<?php echo $bsrt["id_akses"]; ?>" onClick="return confirm('Apakah Anda yakin ingin menghapus data ini?' + '\nNomor: ' + '<?php echo $bsrt["submenu"]; ?>' + '\n\n' + 'Jika YA silahkan klik OK, Jika TIDAK klik CANCEL.')"><button>HAPUS</button></a></td>
    </tr>
<?php
	$i++;
}


?>
</table>

