<style type="text/css">
table{
	font-family:tahoma;
	font-size:12px;	
}
fieldset{
	margin-top:10px;
	padding-top:10px;
	font-family:tahoma;
	font-size:12px;	
}
</style>
<fieldset>
<legend>DETAIL SURAT TANAH</legend>
<?php
include "../../libraries/connect.php";
$id_tanah=$_GET["link"];
$data_khusus = mysql_query("select * from tbl_tanah where id_tanah='".$id_tanah."'");
$da = mysql_fetch_array($data_khusus);

	$qry  = mysql_query("select jenis from ref_jenis where id_jenis='".$da["id_jenis"]."'");
	$qrys = mysql_fetch_array($qry);
	$jenis=$qrys["jenis"];
	
	$qry  = mysql_query("select nama from tbl_kotak where id_kotak='".$da["id_kotak"]."'");
	$qrys = mysql_fetch_array($qry);
	$kotak=$qrys["nama"];
	
	$qry  = mysql_query("select nama from tbl_bungkus where id_bungkus='".$da["id_bungkus"]."'");
	$qrys = mysql_fetch_array($qry);
	$bungkus=$qrys["nama"];	
	
	$qry  = mysql_query("select kecamatan from ref_kecamatan where id_kecamatan='".$da["id_kecamatan"]."'");
	$qrys = mysql_fetch_array($qry);
	$kecamatan=$qrys["kecamatan"];		
		
?>
<fieldset>

<table border="0" cellspacing="2" cellpadding="2">
  <tr >
	<td>NOMOR SURAT KET. TANAH</td>
	<td>:&nbsp;</td>
	<td><?php echo "$da[no_sk]" ?></td>
  </tr>
  <tr >
	<td>TGL SURAT KET. TANAH</td>
	<td>:</td>
	<td><?php echo"$da[tgl_sk]"?></td>
  </tr>
  <tr >
	<td>JENIS DOKUMEN</td>
	<td>:</td>
	<td><?php echo $jenis ?></td>
  </tr>  
  <tr >
	<td>LUAS (m<sup>2</sup>)</td>
	<td>:</td>
	<td><?php echo"$da[luas]"?></td>
  </tr>  
  <tr >
  <tr >
	<td>PEMILIK</td>
	<td>:</td>
	<td><?php echo"$da[pemilik]"?></td>
  </tr>  
  <tr >  
	<td>ALAMAT</td>
	<td>:</td>
	<td><?php echo"$da[alamat]"?></td>
  </tr>
  <tr >
	<td>KECAMATAN</td>
	<td>:</td>
	<td><?php echo $kecamatan; ?></td>
  </tr>
  <tr >
	<td>KECAMATAN LAIN</td>
	<td>:</td>
	<td><?php echo"$da[kecamatan_lain]"; ?></td>
  </tr>
  <tr >
	<td>NOMOR KOTAK</td>
	<td>:</td>
	<td><?php echo $kotak; ?></td>
  </tr>
  <tr >
	<td>NOMOR BUNGKUS</td>
	<td>:</td>
	<td><?php echo $bungkus; ?></td>
  </tr>  
</table>
</fieldset>

<?php

function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			}
?>      