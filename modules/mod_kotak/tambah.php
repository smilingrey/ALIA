<script type="text/javascript">
      $(document).ready(function(){
	  	$("#nama").keyup(function(){
		var nim=$("#nama").val();
			$("#cat").html('');
			$.ajax
			({
				url:'./ajax/cek_kotak.php',
				data:'nim='+nim,
				success:function(data)
				{
					$("#cat").html(data);
				}
				
			});		
		});
		});
</script>		
<div id="judul_content"><h2>TAMBAH NOMOR KOTAK</h2></div><br />
<div align="right"><a href="./index.php?mod=home&opt=kotak&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=kotak&opts=validasi&mode=1" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>NOMOR KOTAK</td>
    <td><input type="text" name="nama" size="60" id="nama" /><div id="cat" style="color:#FF0000;font-size:14px"></div></td>
</tr>
<tr id="tbl-content">
	<td></td>
	<td><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>