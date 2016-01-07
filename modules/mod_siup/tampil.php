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
<legend>DETAIL TDP</legend>
<?php
include "../../libraries/connect.php";
$id_siup=$_GET["link"];
$data_khusus = mysql_query("select * from tbl_siup where id_siup='".$id_siup."'");
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
	
	$qry  = mysql_query("select wilayah from ref_provinsi where id_wilayah='".$da["id_provinsi"]."'");
	$qrys = mysql_fetch_array($qry);
	$prov=$qrys["wilayah"];
	
	$qry  = mysql_query("select wilayah from ref_kabupaten where id_wilayah='".$da["id_kabupaten"]."'");
	$qrys = mysql_fetch_array($qry);
	$kab=$qrys["wilayah"];
	
	$qry  = mysql_query("select kecamatan from ref_kecamatan where id_kecamatan='".$da["id_kecamatan"]."'");
	$qrys = mysql_fetch_array($qry);
	$kecamatan=$qrys["kecamatan"];

	$qry  = mysql_query("select kelurahan from ref_kelurahan where id_kelurahan='".$da["id_kelurahan"]."'");
	$qrys = mysql_fetch_array($qry);
	$kelurahan=$qrys["kelurahan"];					
		
?>
<fieldset>
<table border="0" cellspacing="2" cellpadding="2">
  <tr >
	<td>NOMOR SIUP</td>
	<td>:&nbsp;</td>
	<td><?php echo "$da[no_sk]" ?></td>
  </tr>
  <tr >
	<td>TGL TERBIT</td>
	<td>:</td>
	<td><?php echo"$da[tgl_sk]"?></td>
  </tr>
  <tr >
	<td>BERLAKU SAMPAI</td>
	<td>:</td>
	<td><?php echo"$da[masa_berlaku]"?></td>
  </tr>  
  <tr >
	<td>JENIS DOKUMEN</td>
	<td>:</td>
	<td><?php echo $jenis ?></td>
  </tr>  
  <tr >
	<td>NAMA PERUSAHAAN</td>
	<td>:</td>
	<td><?php echo"$da[nama_perusahaan]"?></td>
  </tr>
    <tr >  
	<td>ALAMAT PERUSAHAAN</td>
	<td>:</td>
	<td><?php echo"$da[alamat]"?></td>
  </tr>  
  <tr >
	<td>PROVINSI</td>
	<td>:</td>
	<td><?php echo $prov; ?></td>
  </tr>
  <tr >
	<td>KABUPATEN</td>
	<td>:</td>
	<td><?php echo $kab; ?></td>
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
	<td>KELURAHAN</td>
	<td>:</td>
	<td><?php echo $kelurahan; ?></td>
  </tr>
  <tr >
	<td>KELURAHAN LAIN</td>
	<td>:</td>
	<td><?php echo"$da[kelurahan_lain]"; ?></td>
  </tr>       
  <tr >
	<td>NPWP</td>
	<td>:</td>
	<td><?php echo"$da[npwp]"?></td>
  </tr> 
  <tr >
	<td>NILAI MODAL KEKAYAAN BERSIH</td>
	<td>:</td>
	<td><?php echo"$da[modal]"?></td>
  </tr> 
  <tr >
	<td>KEGIATAN USAHA</td>
	<td>:</td>
	<td><?php echo"$da[kegiatan]"?></td>
  </tr> 
  <tr >
	<td>BIDANG USAHA</td>
	<td>:</td>
	<td><?php echo"$da[bidang]"?></td>
  </tr>     
  <tr >
	<td>JENIS BARANG/JASA DAGANGAN UTAMA</td>
	<td>:</td>
	<td><?php echo"$da[dagangan]"?></td>
  </tr>    
  <tr >
	<td>KELEMBAGAAN</td>
	<td>:</td>
	<td><?php echo"$da[kelembagaan]"?></td>
  </tr> 
  <tr >
	<td>PEMILIK</td>
	<td>:</td>
	<td><?php echo"$da[pemilik]"?></td>
  </tr> 
  <tr >
	<td>ALAMAT PEMILIK</td>
	<td>:</td>
	<td><?php echo"$da[alamat_pemilik]"?></td>
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