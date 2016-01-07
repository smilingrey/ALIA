<?php
    include("../../libraries/connect.php");
	include("../../includes/functions.php");
    include("../../dompdf_config.inc.php");

    ob_start();
	
	if(!empty($_GET["nama"]) || !empty($_GET["nim"]) || !empty($_GET["tgl1"]) || !empty($_GET["tgl2"])) 
	{
		$up = '';
		$ada = 1;
		if(!empty($_GET["tgl1"]) || !empty($_GET["tgl2"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." date(tgl_sk)>='".$_GET["tgl1"]."' and date(tgl_sk)<='".$_GET["tgl2"]."' ";
			$ada++;
		}		
		if(!empty($_GET["nama"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." no_sk like '%".$_GET["nama"]."%'";
			$ada++;		
		}
		if(!empty($_GET["nim"]))
		{
			if($ada > 1){
				$up = $up." and ";
				}
			$up = $up." nama_perusahaan like '%".$_GET["nim"]."%'";
			$ada++;			
		}		

	}	
    
	$qry  = mysql_query("select * from tbl_ttd");
	$qrys = mysql_fetch_array($qry);
	$jabatan=$qrys["jabatan"];	
	$nama=$qrys["nama"];	
	$nip=$qrys["nip"];	
	
	$jabatan1=$qrys["jabatan1"];	
	$nama1=$qrys["nama1"];	
	$nip1=$qrys["nip1"];	
	
	
?>
<!DOCTYPE HTML>
<html>
    <head>
        <style type="text/css">
            body {
                font-family: sans-serif;
                font-size: 9pt;
            }
            .judul {
                font-size: 11pt;
                font-weight: bold;
            }
            table {
                border-collapse: collapse;
            }
            td {
                padding: 5px;
                border: solid 1px black;
            }
            .center {
                text-align: center;
            }
            .right {
                text-align: right;
            }
            .kelang {
                height: 5px;
            }
            .ttd td {
                border: solid 0px;
            }
        </style>
    </head>
    <body>
        <table width="100%" cellspacing="0" cellpadding="0" class="ttd">
            <tr>
                <td width="5%"><img src="../../deli_serdang_logo.png" width="80px" height="80px"/></td>
                <td align="center" class="judul">LAPORAN PENDATAAN TANDA DAFTAR PERUSAHAAN<br>
												<?php echo skpd(); ?><br>
												<?php echo pemerintah(); ?>
                </td>
            </tr>
        </table>    

        <div class="kelang"></div>
        <div class="kelang"></div>
        <div class="kelang"></div>
        <div class="kelang"></div>
        <div class="kelang"></div>

        <div class="kelang"></div>
        <table width="100%" cellspacing="0" cellpadding="1" border="1">
            <thead>
                <tr>
                    <th width="5%">NO</th>
                    <th >NO. IZIN</th>
                    <th >PERUSAHAAN</th>
                    <th >ALAMAT PERUSAHAAN</th>
                    <th >PENANGGUNGJAWAB / PEMILIK</th>
                    <th >JENIS KEGIATAN USAHA</th>
                    <th >MASA BERLAKU</th>
                    <th >STATUS</th>                    
                    <th >TANGGAL TERBIT</th>
                    <th >NO. KOTAK</th>
                    <th >NO. BUNGKUS</th>
                </tr>
            </thead>
            <tbody>
<?php
	if(!empty($_GET["nama"]) || !empty($_GET["nim"]) || !empty($_GET["tgl1"]) || !empty($_GET["tgl2"]))
	{
		$qsrt = mysql_query("select * from tbl_tdp where id_tdp is not null and ".$up." order by no_sk ");
	}
	else
	{
		$qsrt = mysql_query("select * from tbl_tdp order by no_sk ");
	}
?>				


<?php
     if(mysql_num_rows($qsrt) == '')
     {
     ?>
     <tr >
     <td colspan="11">Data tidak Ditemukan</td>
     </tr>
     <?php
     }
     $i = $posisi + 1;
     while($bsrt = mysql_fetch_array($qsrt))
     {

	 
			$qry  = mysql_query("select nama from tbl_kotak where id_kotak='".$bsrt["id_kotak"]."'");
			$qrys = mysql_fetch_array($qry);
			$kotak=$qrys["nama"];
			
			$qry  = mysql_query("select nama from tbl_bungkus where id_bungkus='".$bsrt["id_bungkus"]."'");
			$qrys = mysql_fetch_array($qry);
			$bungkus=$qrys["nama"];		 
?>


                <tr>
                    <td align="center" valign="top"><?php echo $i; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["no_sk"]; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["nama_perusahaan"]; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["alamat"]; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["pemilik"]; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["kegiatan"]; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["masa_berlaku"]; ?></td>
                    <td align="left" valign="top"><?php echo $bsrt["status"]; ?></td>                    
                    <td align="left" valign="top"><?php echo $bsrt["tgl_sk"]; ?></td>        
                    <td align="left" valign="top"><?php echo $kotak; ?></td>
                    <td align="left" valign="top"><?php echo $bungkus; ?></td>  
                </tr>
                <?php
					$i++;
				}
                ?>
            </tbody>
        </table>
        <div class="kelang"></div>
        <table width="100%" cellspacing="0" cellpadding="0" class="ttd">
            <tr>
                <td colspan="2">&nbsp;</td>
                <td style="padding: 2px;" align="center">Lubuk Pakam, <?php echo hari_ini(); ?></td>
            </tr>
            <tr>
                <td width="20%" style="padding: 2px;"><?php echo $jabatan1; ?></td>
                <td>&nbsp;</td>
                <td width="30%" style="padding: 2px;" align="center"><?php echo $jabatan."<br>".pemerintah_kecil(); ?></td>
            </tr>
            <tr>
                <td colspan="3" style="height: 1.5cm;" style="padding: 2px;"></td>
            </tr>
            <tr>
                <td style="text-decoration: underline; font-weight: bold;" style="padding: 2px;">(<?php echo $nama1; ?>)</td>
                <td>&nbsp;</td>
                <td style="text-decoration: underline; font-weight: bold;" style="padding: 2px;" align="center">(<?php echo $nama; ?>)</td>
            </tr>
            <tr>
                <td style="padding: 2px;">NIP : <?php echo $nip; ?></td>
                <td>&nbsp;</td>
                <td style="padding: 2px;" align="center">NIP : <?php echo $nip1; ?></td>
            </tr>
        </table>
    </body>
</html>
<?php
    $hasil = ob_get_contents();
    ob_end_clean();
    //echo $hasil;
    
    $dompdf = new DOMPDF();
    $dompdf->load_html($hasil);
    $dompdf->set_paper("f4", "landscape");
    $dompdf->render();

    $dompdf->stream("lap_tdp.pdf", array("Attachment" => false));

    function hari_ini($tanggal = ""){
        $arrbulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli",
        "Agustus", "September", "Oktober", "November", "Desember");
        if($tanggal == ""){
            $sql = "SELECT CURDATE() AS sekarang";
        }else{
            $sql = "SELECT '" . $tanggal . "' AS sekarang";
        }
        $res = mysql_query($sql);
        $ds = mysql_fetch_assoc($res);
        $pecah_tanggal = explode("-", $ds["sekarang"]);
        $tahun = $pecah_tanggal[0];
        $bulan = $arrbulan[intval($pecah_tanggal[1])];
        $hari = $pecah_tanggal[2];
        $tgl = $hari . " " . $bulan . " " . $tahun;
        return $tgl; 
    }    
?>