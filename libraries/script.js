( function( $ ) {
$( document ).ready(function() {
	
	function getURLParameter(name) {
  return decodeURIComponent((new RegExp('[?|&]' + name + '=' + '([^&;]+?)(&|#|;|$)').exec(location.search)||[,""])[1].replace(/\+/g, '%20'))||null
	}
	
	function cek(idlink, rel)
	{
		$("#" + idlink).addClass('active');
		$("#" + idlink + " ul").slideDown('normal');
		$("#" + idlink + " ul li").find("[rel=" + rel + "]").css({
			'background-color':'#66A5AD',
			'color':'#FFF'
			}) ;
	}
	
	if(getURLParameter('opt') == 'prov')
		cek("MASTERDATA", "1");
	if(getURLParameter('opt') == 'kab')
		cek("MASTERDATA", "2");
	if(getURLParameter('opt') == 'kec')
		cek("MASTERDATA", "3");
	if(getURLParameter('opt') == 'kel')
		cek("MASTERDATA", "4");
	if(getURLParameter('opt') == 'ttd')
		cek("MASTERDATA", "5");
	if(getURLParameter('opt') == 'kotak')
		cek("MASTERDATA", "6");
	if(getURLParameter('opt') == 'bungkus')
		cek("MASTERDATA", "7");	
	if(getURLParameter('opt') == 'st')
		cek("DATAENTRY", "8");
	if(getURLParameter('opt') == 'siup')
		cek("DATAENTRY", "9");
	if(getURLParameter('opt') == 'tdp')
		cek("DATAENTRY", "10");
	if(getURLParameter('opt') == 'ho')
		cek("DATAENTRY", "11");
	if(getURLParameter('opts') == 'st')
		cek("LAPORAN", "12");
	if(getURLParameter('opts') == 'siup')
		cek("LAPORAN", "13");
	if(getURLParameter('opts') == 'tdp')
		cek("LAPORAN", "14");
	if(getURLParameter('opts') == 'ho')
		cek("LAPORAN", "15");
	if(getURLParameter('opt') == 'member')
		cek("TOOLS", "16");
	if(getURLParameter('opt') == 'profil')
		cek("TOOLS", "17");
	if(getURLParameter('opt') == 'akses')
		cek("TOOLS", "18");																			
		
	
$('#cssmenu ul ul li:odd').addClass('odd');
$('#cssmenu ul ul li:even').addClass('even');
$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});
});
} )( jQuery );

