<div id="content">
<?php
if($_GET["mod"] == "home")
{
	if($_GET["opt"] == "logout")
	{
		include("./modules/mod_user/logout.php");
	}
	elseif($_GET["opt"] == "profil")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_profil/main.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_profil/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}
	elseif($_GET["opt"] == "overview")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_overview/main.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_overview/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}

	elseif($_GET["opt"] == "member")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_member/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_member/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_member/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_member/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}
	elseif($_GET["opt"] == "bungkus")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_bungkus/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_bungkus/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_bungkus/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_bungkus/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}
	elseif($_GET["opt"] == "ttd")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_ttd/main.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_ttd/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}		
	elseif($_GET["opt"] == "kotak")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_kotak/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_kotak/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_kotak/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_kotak/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}	
	elseif($_GET["opt"] == "bungkus")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_bungkus/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_bungkus/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_bungkus/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_bungkus/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}		
	elseif($_GET["opt"] == "prov")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_prov/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_prov/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_prov/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_prov/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}			
	elseif($_GET["opt"] == "kab")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_kab/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_kab/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_kab/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_kab/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}
	elseif($_GET["opt"] == "kec")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_kec/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_kec/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_kec/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_kec/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}
	elseif($_GET["opt"] == "kel")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_kel/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_kel/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_kel/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_kel/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}		
	elseif($_GET["opt"] == "st")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_st/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_st/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_st/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_st/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}	
	elseif($_GET["opt"] == "ho")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_ho/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_ho/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_ho/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_ho/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}	
	elseif($_GET["opt"] == "tdp")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_tdp/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_tdp/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_tdp/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_tdp/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}
	elseif($_GET["opt"] == "siup")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_siup/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_siup/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_siup/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_siup/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}	
	elseif($_GET["opt"] == "lap")
	{
		if($_GET["opts"] == "ho")
			include("./modules/mod_lap/main_ho.php");
		elseif($_GET["opts"] == "cetak_ho")
			include("./modules/mod_lap/cetak_ho.php");			
		elseif($_GET["opts"] == "st")
			include("./modules/mod_lap/main_st.php");
		elseif($_GET["opts"] == "siup")
			include("./modules/mod_lap/main_siup.php");
		elseif($_GET["opts"] == "tdp")
			include("./modules/mod_lap/main_tdp.php");
		else
			include("./modules/mod_main/main.php");		
	}	
	elseif($_GET["opt"] == "akses")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_akses/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_akses/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_akses/edit.php");
		elseif($_GET["opts"] == "validasi")
			include("./modules/mod_akses/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}					
	elseif($_GET["opt"] == "random")
	{
		if($_GET["opts"] == "list")
			include("./modules/mod_random/main.php");
		elseif($_GET["opts"] == "tambah")
			include("./modules/mod_random/tambah.php");
		elseif($_GET["opts"] == "edit")
			include("./modules/mod_random/edit.php");
		else if($_GET["opts"] == "validasi")
			include("./modules/mod_random/validasi.php");
		else
			include("./modules/mod_main/main.php");		
	}

}
else
{
	include("./modules/mod_main/main.php");
}
?>
</div>