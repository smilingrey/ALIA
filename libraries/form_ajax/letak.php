<select name="urutan">
<?php
	include("./connect.php");
	$i=1;

	$qorder=mysql_query("select nama, urutan from tbl_module where letak='".$_GET["letak"]."' order by urutan asc");
	$qcount=mysql_query("select max(urutan) as torder from tbl_module where letak='".$_GET["letak"]."'");
			
	if ($qcount)
	{
		$tcount1=mysql_fetch_array($qcount);
		$tcount=$tcount1["torder"]+1;
	}else
	{
		$tcount=0;
	}
	
	if ($qorder)
	{
		$i=1;
		while ($rorder=mysql_fetch_array($qorder))
		{
			if($d1["urutan"] == $rorder["urutan"])
				echo '<option value="'.$rorder["urutan"].'" selected="selected">'.$rorder["urutan"].'. '.$rorder["nama"].'</option>';
			else
				echo '<option value="'.$rorder["urutan"].'">'.$rorder["urutan"].'. '.$rorder["nama"].'</option>';
			$i+=1;
		}
		echo '<option value="'.$tcount.'">'.$tcount.'. *Kosong*</option>';
	}
?></select><input type="hidden" name="max" value="<?php echo $tcount; ?>" />