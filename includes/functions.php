<?php

function skpd(){
	return "KANTOR PERPUSTAKAAN, ARSIP DAN DOKUMENTASI";
}

function pemerintah(){
	return "KABUPATEN DELI SERDANG";
}

function pemerintah_kecil(){
	return "Kabupaten Deli Serdang";
}

function cek_ogg($tipe)
{
	if($tipe == "audio/ogg" or $tipe == "video/ogg")
		return true;
	else
		return false;
}

function upload_kec($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../../map/images/peta/peta_kecamatan/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 400;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  {
	  $im_src1 = imagecreatefromjpeg($vfile_upload);
	  $src_width1 = imageSX($im_src);
	  $src_height1 = imageSY($im_src);
	
	  //Simpan dalam versi small 110 pixel
	  //Set ukuran gambar hasil perubahan
	  $dst_width1 = 600;
	  $dst_height1 = ($dst_width1/$src_width1)*$src_height1;
	
	  //proses perubahan ukuran
	  $im1 = imagecreatetruecolor($dst_width1,$dst_height1);
	  imagecopyresampled($im1, $im_src1, 0, 0, 0, 0, $dst_width1, $dst_height1, $src_width1, $src_height1);
	  
	  if(imagejpeg($im1,$vdir_upload . "besar_" . $fupload_name))
	  	return true;
	  else
	  	return false;
  }
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im_src1);
  imagedestroy($im1);
}

function upload_kab($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../../map/images/peta/peta_kabupaten/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 600;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_prov($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../../map/images/peta/peta_provinsi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 600;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_negara($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../../map/images/peta/peta_negara/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 600;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_asean($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../../map/images/peta/peta_asean/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 600;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_banner($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 230;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_banner_bawah($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 770 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 700;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_banner_foother($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../foto_banner/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 100 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 100;
  $dst_height = ($dst_width/$src_width)*$src_height;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "sedang_" . $fupload_name))
  	return true;
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_random($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "./foto_random/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 1200;
  $dst_height = 250;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "file/" . $fupload_name))
  {
	  $dst_width1 = 110;
	  $dst_height1 = 110;
	
	  //proses perubahan ukuran
	  $im1 = imagecreatetruecolor($dst_width1,$dst_height1);
	  imagecopyresampled($im1, $im_src, 0, 0, 0, 0, $dst_width1, $dst_height1, $src_width, $src_height);
	
	  //Simpan gambar
	  if(imagejpeg($im1,$vdir_upload . "thumb/" . $fupload_name))
		return true;
	  else
		return false;
  }
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im1);
}

function upload_mhs($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "./foto_mhs/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 480;
  $dst_height = 640;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "file/" . $fupload_name))
  {
	  $dst_width1 = 110;
	  $dst_height1 = 110;
	
	  //proses perubahan ukuran
	  $im1 = imagecreatetruecolor($dst_width1,$dst_height1);
	  imagecopyresampled($im1, $im_src, 0, 0, 0, 0, $dst_width1, $dst_height1, $src_width, $src_height);
	
	  //Simpan gambar
	  if(imagejpeg($im1,$vdir_upload . "thumb/" . $fupload_name))
		return true;
	  else
		return false;
  }
  else
  	return false;	    
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
  imagedestroy($im1);
}
function upload_foto($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../foto_organisasi/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 110 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 140;
  $dst_height = 180;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name))
  	return true;
  else
  	return false;	
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function upload_image($fupload_name, $link){
  //direktori gambar
  $vdir_upload = "../foto/";
  $vfile_upload = $vdir_upload . $fupload_name;

  //Simpan gambar dalam ukuran sebenarnya
  if(!move_uploaded_file($_FILES["file"]["tmp_name"], $vfile_upload))
  {
  	pesan('gagal upload', $link);
	exit();
  }

  //identitas file asli
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);

  //Simpan dalam versi small 80 pixel
  //Set ukuran gambar hasil perubahan
  $dst_width = 80;
  $dst_height = 80;

  //proses perubahan ukuran
  $im = imagecreatetruecolor($dst_width,$dst_height);
  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  //Simpan gambar
  if(imagejpeg($im,$vdir_upload . "kecil_" . $fupload_name))
  	return true;
  else
  	return false;	
  
  //Hapus gambar di memori komputer
  imagedestroy($im_src);
  imagedestroy($im);
}

function cek_image($image)
{
	if($image == 'image/jpg' or $image == 'image/jpeg')
		return true;
	else
		return false;
}

function max_file()
{
	$phpmaxsize = ini_get('upload_max_filesize');
	$phpmaxsize = trim($phpmaxsize);
	$last = strtolower($phpmaxsize{strlen($phpmaxsize)-1});
	switch($last)
	{
		case 'g':
			$phpmaxsize *= 1024;
		case 'm':
			$phpmaxsize *= 1024;
	}
	return $phpmaxsize;
}
function cek_ukuran($ukuran)
{
	if(ceil($ukuran/1024) >= max_file())
		return false;
	else
		return true;
}

function cek_link($link)
{
	$web = $link;
	if(substr($web, 0, 7) != 'http://')
	{
		if(substr($web, 0, 8) == 'https://')
			$web = $web;
		else
			$web = 'http://'.$web;
	}
	
	if(preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $web))
		return true;
	else
		return false;
}

function cek_telepon($telepon)
{
	if(is_numeric($telepon))
		return true;
	else
		return false;
}

function cek_kode_pos($kode_pos)
{
	if(preg_match("/^\d{5}([\-]\d{4})?$/", $kode_pos))
		return true;
	else
		return false;
}

function cek_email($email)
{
	if(preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email))
		return true;
	else
		return false;
}

function pesan($pesan, $link)
{
?>
	<script type="text/javascript">
		alert('<?php echo $pesan; ?>');
		document.location.href='<?php echo $link; ?>';
	</script>
<?php
}

function anti_injection($a)
{
	$d = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($a))));
	return $d;
}

function tidak_lengkap($link)
{
?>
	<script type="text/javascript">
		alert('isi form dengan lengkap');
		document.location.href='<?php echo $link; ?>';
	</script>
<?php
}

function benar($link)
{
?>
	<script type="text/javascript">
		alert('berhasil');
		document.location.href='<?php echo $link; ?>';
	</script>
<?php
}

function salah($link)
{
?>
	<script type="text/javascript">
		alert('gagal');
		document.location.href='<?php echo $link; ?>';
	</script>
<?php
}

function cek_browser()
{
	$u_agent = $_SERVER["HTTP_USER_AGENT"];
	if(!preg_match('/Firefox/i',$u_agent) and !preg_match('/Chrome/i',$u_agent))
    {
	?>
    	<script type="text/javascript">
			alert('Web ini dapat berjalan dengan baik, jika Anda menggunakan Mozilla Firefox 3.6+ atau Chrome');
		</script>
    <?php
		echo '<br>';
		echo '<div style="color:#FF0000; text-align:center; font-weight:bold; font-size:16px">Web ini dapat berjalan dengan baik, jika Anda menggunakan Mozilla Firefox 3.6+ atau Chrome</div>';	
    }
}

function failed()
{
?>
	<script type="text/javascript">
		alert('failed');
		document.location.href='./index.php';
	</script>
<?php
}
?>