<?php
	session_set_cookie_params('18000');
	session_start(); 
	$theme = "redmond";
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>jQuery UI Tabs - Default functionality</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/<?php echo $theme;?>/jquery.ui.all.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/ui.multiselect.css" />
    <style type="text">
        html, body {
        margin: 0;			/* Remove body margin/padding */
    	padding: 0;
        overflow: hidden;	/* Remove scroll bars on browser window */
        font-size: 75%;
        }
    </style>
	<style type="text/css">
        /* make default button size sane */
        .ui-button-text { font-size: .7em;    }
        #ui-datepicker-div { font-size: 12px; } 
    
    .T {	text-align: center;
            font-weight: bold;
    }
	.button-edit{
	/*background-color: #ff9d54;*/
	border: 1px solid #cccccc; 
	font-weight: bold; color: #1c94c4;
	background-image :  url(images/pencil-blue.png) ;
	background-repeat:no-repeat;
	color: #363636;
	/*padding: 5px 5px 5px 5px;*/
	width: 32px; height: 32px;
	-moz-border-radius-bottomright: 4px; 
	-webkit-border-bottom-right-radius: 4px; 
	-khtml-border-bottom-right-radius: 4px; 
	border-bottom-right-radius: 4px;
	border-radius:4px;
	}
	.button-edit:hover{	
		border: 1px solid #fbcb09; 
		font-weight: bold; color: #c77405;
		background-image :  url(images/pencil-orange.png);
	}
	
	.button-hapus{
		/*background-color: #ff9d54;*/
		border: 1px solid #cccccc; background: #f6f6f6 url(plugins/jquery/themes/ui-lightness/images/ui-bg_glass_100_f6f6f6_1x400.png) 50% 50% repeat-x; 
		font-weight: bold; color: #1c94c4;
		background-image :  url(images/hapus-biru.png);
		color: #363636;
		/*padding: 5px 5px 5px 5px;*/
		width: 32px; height: 32px;
		-moz-border-radius-bottomright: 4px; 
		-webkit-border-bottom-right-radius: 4px; 
		-khtml-border-bottom-right-radius: 4px; 
		border-bottom-right-radius: 4px;
		border-radius:4px;
	}
	.button-hapus:hover{	
		border: 1px solid #fbcb09; font-weight: bold; color: #c77405;
		background-image :  url(images/hapus-orange.png);
	}
	
	.button-print{
		/*background-color: #ff9d54;*/
		border: 1px solid #cccccc; background: #f6f6f6 url(plugins/jquery/themes/ui-lightness/images/ui-bg_glass_100_f6f6f6_1x400.png) 50% 50% repeat-x; 
		font-weight: bold; color: #1c94c4;
		background-image :  url(images/print-blue.png);
		color: #363636;
		/*padding: 5px 5px 5px 5px;*/
		width: 32px; height: 32px;
		-moz-border-radius-bottomright: 4px; 
		-webkit-border-bottom-right-radius: 4px; 
		-khtml-border-bottom-right-radius: 4px; 
		border-bottom-right-radius: 4px;
		border-radius:4px;
	}
	.button-print:hover{	
		border: 1px solid #fbcb09; font-weight: bold; color: #c77405;
		background-image :  url(images/print-orange.png);
	}
	
	.button-upload{
		/*background-color: #ff9d54;*/
		border: 1px solid #cccccc; background: #f6f6f6 url(.plugins/jquery/themes/ui-lightness/images/ui-bg_glass_100_f6f6f6_1x400.png) 50% 50% repeat-x; 
		font-weight: bold; color: #1c94c4;
		background-image :  url(.images/upload-blue.png);
		color: #363636;
		/*padding: 5px 5px 5px 5px;*/
		width: 32px; height: 32px;
		-moz-border-radius-bottomright: 4px; 
		-webkit-border-bottom-right-radius: 4px; 
		-khtml-border-bottom-right-radius: 4px; 
		border-bottom-right-radius: 4px;
		border-radius:4px;
	}
	.button-upload:hover{	
		border: 1px solid #fbcb09; font-weight: bold; color: #c77405;
		background-image :  url(.images/upload-orange.png);
	}
	
	.button{
		/*background-color: #ff9d54;*/
		padding: 5px 5px 5px 5px;
		background: -moz-linear-gradient(top, #ffffff, #abd5fd);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#abd5fd));
		border:thin solid #D0D0D0;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-khtml-border-radius: 5px;
		border-radius: 5px;
	}
	.button:hover{
		color:#fff;
		background: -moz-linear-gradient(top, #ffffff, #6499cb);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#6499cb));
		border:thin solid #D0D0D0;
	}
	.button_red{
		/*background-color: #ff9d54;*/
		padding: 5px 5px 5px 5px;
		background: -moz-linear-gradient(top, #ffffff, #ff6060);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#ff6060));
		border:thin solid #D0D0D0;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-khtml-border-radius: 5px;
		border-radius: 5px;
	}
	.button_red:hover{
		color:#fff;
		background: -moz-linear-gradient(top, #ffffff, #3a3c93);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#3a3c93));
		border:thin solid #D0D0D0;
	}
	.button_green{
		/*background-color: #ff9d54;*/
		padding: 5px 5px 5px 5px;
		background: -moz-linear-gradient(top, #ffffff, #7aff5b);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#7aff5b));
		border:thin solid #D0D0D0;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
		-khtml-border-radius: 5px;
		border-radius: 5px;
	}
	
	.button_green:hover{
		color:#fff;
		background: -moz-linear-gradient(top, #ffffff, #3a3c93);
		background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#3a3c93));
		border:thin solid #D0D0D0;
	}
    </style>      
    <script src="js/jquery-1.7.min.js" type="text/javascript"></script>    
    <script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
    <script>
	$(function() {
	$( "#tabs" ).tabs();
	});
	$(function() {
	$( "#tabs_kos" ).tabs();
	});
	$(function() {
	$( "#tabs_p" ).tabs();
	});
	$(function() {
	$( "#tabsGanjil" ).tabs();
	});
	$(function() {
	$( "#tabsGenap" ).tabs();
	});
	</script>
    <script type="text/javascript">
    $.jgrid.no_legacy_api = true;
    $.jgrid.useJSON = true;
	$(document).ready(function() {
	
	
	$('#cetakformulirsmp').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#cetakformulirsma').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#cetakformulirsmk').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#cetakformulirsd').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#cetakformulirckmp').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
								   
	$('#getlaporan1').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporan2').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporan3').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});			
	$('#getlaporan4').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#export_bulanan').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#export_harian').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	
	$('#getlaporanSiswa').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getRapor1').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getRapor2').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getselected').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporan1').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#getcocard').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getcocardB').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#getdelete').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporanbk').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporanbk1').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#getlaporanSiswa1').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporanSiswa2').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporanSiswa3').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporanSiswa4').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getSetting').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#gethistori').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#getpermohonan').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getC').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#getlaporan5').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#getlaporan6').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporan8').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#getlaporan9').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});
	$('#gettransferan').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});			
	$('#getKW').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#cetakReturS').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	$('#cetakReturP').button({
					text: true,
					icons: {primary: "ui-icon-document"}
				});	
	});			
    </script>
    <script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-custom.min.js" type="text/javascript"></script>
    
    <style type="text/css" title="cureencystyle">
	@import "plugins/datatables/media/css/demo_page.css";
	@import "plugins/datatables/media/css/demo_table.css";
	</style>
	
	<script type="text/javascript" language="javascript" src="plugins/datatables/media/js/jquery.dataTables.js"></script>
	<script type="text/javascript" charset="utf-8" src="plugins/datatables/media/js/ZeroClipboard.js"></script>
	<script type="text/javascript" charset="utf-8" src="plugins/datatables/media/js/TableTools.js"></script>


    <script src="ajaxfileupload1.0/ajaxfileupload.js" type="text/javascript"></script>
    <script src="js/jquery.jqChart.min.js" type="text/javascript"></script>
    <script src="js/jquery.number.min.js" type="text/javascript"></script>
    <script src="js/jTerbilang.js" type="text/javascript"></script>    
	<script type="text/javascript" src="plugins/jquery-validation/dist/jquery.numeric.js"></script>      
	<script type="text/javascript" language="javascript" src="plugins/jcombo/jcombo.js"></script> 
    <script type="text/javascript" src="plugins/jquery-validation/dist/jquery.validate.min.js"></script>  
</head>
<body>
<table width="1100" border="0" style="font-size:11px">
  <tr>
    <td><div id="tabs">
<ul>

    <li><a href="#tabs-1">Pendaftaran SMP</a></li>
    <li><a href="#tabs-2">Pendaftaran SMA</a></li>
    <li><a href="#tabs-3">Pendaftaran SMK</a></li>
	<li><a href="#tabs-4">Pendaftaran SD</a></li>
    <li><a href="#tabs-5">Person</a></li>
    </ul>
    <div id="tabs-1">
    <?php include_once ("siswa_smp.php");?><br>   
	<button id="cetakformulirsmp" style="margin-left:40px; margin-top:10px">Cetak Formulir</button> 
    </div>
    <div id="tabs-2">
    <?php include_once ("siswa_sma.php");?><br>
	<button id="cetakformulirsma" style="margin-left:40px; margin-top:10px">Cetak Formulir</button> 
    </div>
    <div id="tabs-3">
    <?php include_once ("siswa_smk.php");?><br>    
	<button id="cetakformulirsmk" style="margin-left:40px; margin-top:10px">Cetak Formulir</button> 
    </div>
    <div id="tabs-4">
    <?php include_once ("siswa_sd.php");?><br>
	<button id="cetakformulirsd" style="margin-left:40px; margin-top:10px">Cetak Formulir</button> 
    </div>
	<div id="tabs-5">
    <?php include_once ("person.php");?><br>
	<button id="cetakformulirckmp" style="margin-left:40px; margin-top:10px">Cetak Formulir</button> 
    </div>
    <div id="dialog-print"></div>
    

</div>&nbsp;</td>
  </tr>
</table>

</body>
</html>