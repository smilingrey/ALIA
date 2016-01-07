<script type="text/javascript">
      $(document).ready(function(){
	  	$("#nama").keyup(function(){
		var nim=$("#nama").val();
			$("#cat").html('');
			$.ajax
			({
				url:'./ajax/cek_bungkus.php',
				data:'nim='+nim,
				success:function(data)
				{
					$("#cat").html(data);
				}
				
			});		
		});
		});
</script>		
<div id="judul_content"><h2>TAMBAH AKSES PENGGUNA</h2></div><br />
<div align="right"><a href="./index.php?mod=home&opt=akses&opts=list" class="link" title="Klik untuk kembali ke halaman sebelumnya"><button>KEMBALI</button></a></div><br />
<form action="./index.php?mod=home&opt=akses&opts=validasi&mode=1" method="post">
<table cellpadding="3" cellspacing="1" align="center" id="tbl">
<tr id="tbl-content">
	<td>MENU</td>
    <td><select name="nama" id="nama">
        <?php
        $t = mysql_query("select * from ref_submenu order by id_menu,id_submenu");
        while($t1 = mysql_fetch_array($t))
        {
	
            	echo '<option value="'.$t1["id_submenu"].'">'.$t1["submenu"].'</option>';
        }
        ?>
        </select</td>
</tr>
<tr id="tbl-content">
	<td></td>
	<td><button type="submit">SIMPAN</button></td>
</tr>
</table>
</form>