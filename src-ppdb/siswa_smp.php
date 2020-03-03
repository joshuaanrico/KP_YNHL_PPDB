<?php
session_start();
include_once 'config/jq-config.php';
 // include the jqGrid Class
include_once "config/jqGrid.php";
// include the driver class
include_once "config/jqGridPdo.php"; 
// include the datepicker
include_once "config/jqCalendar.php"; 
// Connection to the server
$conn = new PDO(DB_DSN,DB_USER,DB_PASSWORD);
// Tell the db that we use utf-8
$conn->query("SET NAMES utf8");

$bln_mulai_penerimaan = 3;
if(date("m")>$bln_mulai_penerimaan){
	$tahun_ajaran = date("Y");
}else{
	$tahun_ajaran = date("Y")-1;
}

// Create the jqGrid instance
$grid = new jqGridRender($conn);
// Write the SQL Query
$grid->SelectCommand = "SELECT id,id_sekolah,id_tingkat,NISS,NISN,detail_kelas,Kelas,Kelas_Pondok, Nama_Lengkap,NO_KTP, Nama_Panggilan, Jenis_Kelamin, Tempat_Lahir, Tanggal_Lahir, status_diri, Pendidikan,Jurusan_Pondok,Warganegara,Kewarganegaraan,Anak_ke, Jumlah_Saudara,Status_anak, Status_Mukim,Bahasa,Alamat_Lengkap,No_hp,Kelompok,Desa,Daerah,Status_Pondok,utusan,Tanggal_Masuk_CKM,mulai_pengajian,Tinggal_dengan,Penanggung_Jawab,No_HP_Penanggung_Jawab,Tanggal_Masuk,Nama_Ayah,Alamat_Ayah,NO_Telp_Ayah,No_HP_Ayah,Nama_Ibu,Alamat_Ibu,NO_Telp_Ibu,Pekerjaan_Ayah,Pekerjaan_Ibu,MKTime,Status_Siswa,pindah_pondok,Keterangan,kelompok_pondok,Tanggal_Kelas,
Tahun_Ajaran FROM tb_siswa WHERE  id_sekolah = 1 AND Tahun_Ajaran = '".$tahun_ajaran."'  ";     
/* altered by eko 29-12-2015  "OR Status_Siswa = ''",,,, tgl 09-01-2016 ==> deleting OR Status_Siswa = 'Tidak Aktif'*/

// Set the table to where you add the data
$grid->table = 'tb_siswa';
$grid->setPrimaryKeyId('id');
$grid->serialKey = false;
// Set output format to json
$grid->dataType = 'json';
// Let the grid create the model
$Model = array(   
   	array("name"=>"id","width"=>50,"hidden"=>true),	   
	array("name"=>"Tahun_Ajaran","width"=>50,"hidden"=>true),
	array("name"=>"id_sekolah", "width"=>22),
	array("name"=>"id_tingkat","label"=>"Tingkat", "width"=>22),
	array("name"=>"Status_Mukim","width"=>20),
	array("name"=>"NISS","width"=>32), 
	array("name"=>"NISN","width"=>32), 
	/* array("name"=>"Kelas","width"=>30), */
	array("name"=>"detail_kelas","width"=>25), 
	array("name"=>"Nama_Lengkap","width"=>60),
	array("name"=>"Nama_Panggilan","width"=>70,"hidden"=>true),
	array("name"=>"NO_KTP","width"=>70,"hidden"=>true),
	array("name"=>"Tanggal_Masuk","label"=>"Tgl Masuk","width"=>30,"hidden"=>false),		
	array("name"=>"Jenis_Kelamin", "label"=>"JK", "width"=>7),
	array("name"=>"No_hp","width"=>20,"hidden"=>true),
	array("name"=>"Tempat_Lahir","width"=>40),
	array("name"=>"Tanggal_Lahir", "label"=>"Tgl Lahir","width"=>30,"newformat"=>"Y-m-d"),
	array("name"=>"status_diri","width"=>20,"hidden"=>true),	
	array("name"=>"Warganegara","width"=>20,"hidden"=>true),
	array("name"=>"Kewarganegaraan","width"=>20,"hidden"=>true),	
	array("name"=>"kelompok_pondok","width"=>30),
	array("name"=>"Tinggal_dengan","width"=>20,"hidden"=>true),
	array("name"=>"Anak_ke","width"=>20,"hidden"=>true),	
	array("name"=>"Jumlah_Saudara","width"=>20,"hidden"=>true),
	array("name"=>"Status_anak","width"=>20,"hidden"=>true),
	//array("name"=>"Bahasa","width"=>20,"hidden"=>true),
	array("name"=>"Alamat_Lengkap","width"=>80,"hidden"=>false, "searchoptions"=>array("searchhidden"=>true)),
	//array("name"=>"Pendidikan","width"=>35,"hidden"=>true, "searchoptions"=>array("searchhidden"=>true)),
	//array("name"=>"Jurusan_Pondok","width"=>35,"hidden"=>true),
	array("name"=>"Keterangan","width"=>20,"hidden"=>true),
	array("name"=>"Kelompok","width"=>20,"hidden"=>false),
	array("name"=>"Desa","width"=>20,"hidden"=>true),
	array("name"=>"Daerah","width"=>35,"hidden"=>false),
	array("name"=>"Status_Pondok","width"=>20,"hidden"=>true, "searchoptions"=>array("searchhidden"=>true)),
	//array("name"=>"utusan","width"=>20,"hidden"=>true, "searchoptions"=>array("searchhidden"=>true)),
	//array("name"=>"Tanggal_Masuk_CKM","width"=>20,"hidden"=>true),
	array("name"=>"mulai_pengajian","width"=>20,"hidden"=>true),	
	array("name"=>"Penanggung_Jawab","width"=>20,"hidden"=>true),
	array("name"=>"No_HP_Penanggung_Jawab","width"=>20,"hidden"=>false),	
	array("name"=>"Nama_Ayah","width"=>30,"hidden"=>false, "searchoptions"=>array("searchhidden"=>true)),
	array("name"=>"Alamat_Ayah","width"=>20,"hidden"=>true),
	array("name"=>"No_HP_Ayah","width"=>20,"hidden"=>true),
	array("name"=>"NO_Telp_Ayah","width"=>20,"hidden"=>true),
	array("name"=>"Pekerjaan_Ayah","width"=>20,"hidden"=>true),
	array("name"=>"Nama_Ibu","width"=>20,"hidden"=>true, "searchoptions"=>array("searchhidden"=>true)),
	array("name"=>"Alamat_Ibu","width"=>20,"hidden"=>true),
	array("name"=>"NO_Telp_Ibu","width"=>20,"hidden"=>true),
	array("name"=>"Pekerjaan_Ibu","width"=>20,"hidden"=>true),
	array("name"=>"Nama_Wali","width"=>20,"hidden"=>true),
	array("name"=>"Alamat_Wali","width"=>20,"hidden"=>true),
	array("name"=>"NO_Telp_Wali","width"=>20,"hidden"=>true),
	array("name"=>"MKTime","width"=>20,"hidden"=>true),
	array("name"=>"Status_Siswa","width"=>15,"hidden"=>false, "searchoptions"=>array("searchhidden"=>true))
	
);

$grid->setColModel($Model);
// Set the url from where we obtain the data
$grid->setUrl('siswa_smp.php');
// Set some grid options
$grid->setGridOptions(array(
    "caption"=>"Form Buku Induk Santri",
    "rowNum"=>10,    
    "rowList"=>array(10,20,30),
	"height"=>'auto',
	"hoverrows"=>true,
	"width"=>'1100',
	"rownumbers"=>true,
	"sortname"=>"id",
	"sortorder"=>"desc"
    ));
// The primary key should be entered
//Set Property 

$grid->setDbDate('d/m/Y');
$grid->setDbTime('Y-m-d H:i:s'); 

$grid->setUserDate('d/m/Y');
// the same as formatter
$grid->setUserTime('d/m/Y');

$grid->setColProperty('id', array("label"=>"ID","editrules"=>array("required"=>false),"editoptions"=>array("tabindex"=>0,"size"=>8,"readonly"=>true)));

/* added by ekozul 24-12-2015*/
$grid->setColProperty('id_sekolah',  array("label"=>"Sekolah","editoptions"=>array("tabindex"=>1,"readonly"=>true)));

$grid->setColProperty('Status_Mukim', array("formoptions"=>array("label"=>"St. Mukim","elmsuffix"=>"(Wajib Isi)"),"edittype"=>"select","editrules"=>array("required"=>false), "editoptions"=>array("tabindex"=>6,"value"=>"Mukim:Mukim;Non Mukim:Non Mukim; : ")));

$grid->setColProperty('NISS', array("label"=>"NIS","editrules"=>array("required"=>false),"editoptions"=>array("tabindex"=>1,"size"=>25,"readonly"=>true)));
$grid->setColProperty('NISN', array("label"=>"NISN","editrules"=>array("required"=>false),"editoptions"=>array("tabindex"=>1,"size"=>25)));
$grid->setColProperty('detail_kelas', array("label"=>"Kelas","editoptions"=>array("tabindex"=>1,"readonly"=>true)));
$grid->setColProperty('Nama_Lengkap', array("label"=>"Nama Lengkap","formoptions"=>array("elmsuffix"=>""),"editrules"=>array("edithidden"=>true,"required"=>true,"readonly"=>false),"editoptions"=>array("tabindex"=>2,"size"=>35,"required"=>true,"readonly"=>false)));
$grid->setColProperty('Nama_Panggilan', array("label"=>"Nama Panggilan","editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("tabindex"=>3,"size"=>35,"readonly"=>false)));
$grid->setColProperty('NO_KTP', array("searchrules"=>array(
		"required"=>true,
		"number"=>false),"formoptions"=>array("label"=>"No KTP","elmsuffix"=>""),"editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("tabindex"=>4)));
$grid->setColProperty('Tanggal_Masuk', 
        array("formoptions"=>array("label"=>"Tanggal Masuk","elmsuffix"=>""),"formatter"=>"date","datefmt"=>'d/m/Y',
            "formatoptions"=>array("srcformat"=>"d/m/Y H:i:s", "newformat"=>"d/m/Y"),
			"editrules"=>array("required"=>true),
            "editoptions"=>array("tabindex"=>5,"readonly"=>false,"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'dd/mm/yy'});
                    jQuery('.ui-datepicker').css({'zIndex':'1200','font-size':'75%'});},100);}","required"=>true,"readonly"=>false)
            ));
$grid->setColProperty('Jenis_Kelamin', array("formoptions"=>array("label"=>"Jenis Kelamin","elmsuffix"=>"(Wajib Isi)"),"edittype"=>"select","editrules"=>array("required"=>true), "editoptions"=>array("tabindex"=>6,"value"=>" : ;L:L;P:P")));
$grid->setColProperty('Tempat_Lahir', array("label"=>"Tempat Lahir","editrules"=>array("required"=>true),"editoptions"=>array("tabindex"=>7,"size"=>30,"readonly"=>false,"required"=>true)));
$grid->setColProperty('Tanggal_Lahir', array("label"=>"Tgl Lahir","editrules"=>array("required"=>false),"editoptions"=>array("tabindex"=>8,"size"=>12,"required"=>true,"readonly"=>false)));
$grid->setColProperty('Tanggal_Lahir', 
        array("formoptions"=>array("elmsuffix"=>"(Wajib Isi)"),"formatter"=>"date","datefmt"=>'d/m/Y',
            "formatoptions"=>array("srcformat"=>"d/m/Y H:i:s", "newformat"=>"d/m/Y"),
			"editrules"=>array("required"=>true),
            "editoptions"=>array("tabindex"=>9,"readonly"=>false,"dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'dd/mm/yy'});
                    jQuery('.ui-datepicker').css({'zIndex':'1200','font-size':'75%'});},100);}")
            ));

$grid->setColProperty('status_diri', array("label"=>"Status","edittype"=>"select","editrules"=>array("edithidden"=>true,"required"=>false), "editoptions"=>array("tabindex"=>10,"value"=>" : ;Menikah:Menikah;Belum Menikah:Belum Menikah")));
$grid->setColProperty('warganegara', array("label"=>"Warganegara","edittype"=>"select","editrules"=>array("edithidden"=>true,"required"=>false), "editoptions"=>array("tabindex"=>11,"value"=>"WNI:WNI;WNA:WNA")));
$grid->setColProperty('kewarganegaraan', array("label"=>"Kewarganegaraan","editoptions"=>array("tabindex"=>11),"editrules"=>array("edithidden"=>true,"required"=>false)));

$grid->setColProperty('kelompok_pondok', array("label"=>"Kamar","editoptions"=>array("tabindex"=>12)));

$grid->setColProperty('Tinggal_dengan', array("label"=>"Tinggal di","edittype"=>"select","editrules"=>array("edithidden"=>true,"required"=>false), "editoptions"=>array("tabindex"=>10,"value"=>" : ;Rumah Orang Tua:Rumah Orang Tua;Rumah Saudara:Rumah Saudara;Rumah Wali:Rumah Wali;Asrama:Asrama;Kost:Kost;Lainnya:Lainnya")));

$grid->setColProperty('Anak_ke', array("label"=>"Anak Ke","editoptions"=>array("tabindex"=>15),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Jumlah_Saudara', array("label"=>"Jumlah Saurdara","editoptions"=>array("tabindex"=>16),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Status_anak', array("label"=>"Status Anak","edittype"=>"select","editrules"=>array("edithidden"=>true,"required"=>false), "editoptions"=>array("tabindex"=>17,"value"=>" : ;Lengkap:Lengkap;Yatim:Yatim;Piatu:Piatu;Yatim Piatu:Yatim Piatu")));
$grid->setColProperty('Bahasa', array("label"=>"Bahasa Ma'na","editoptions"=>array("tabindex"=>18),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Alamat_Lengkap', array("label"=>"Alamat","edittype"=>"textarea","editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("tabindex"=>19,"rows"=>2,"cols"=>35,"required"=>true,"readonly"=>false)));

$grid->setColProperty('Pendidikan', array("label"=>"Pendidikan Terakhir","editoptions"=>array("tabindex"=>21),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Jurusan_Pondok', array("label"=>"Jurusan","editoptions"=>array("tabindex"=>21,"size"=>30),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Keterangan', array("label"=>"Prestasi/Hobi/Keterampilan","edittype"=>"textarea","editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("tabindex"=>22,"rows"=>2,"cols"=>30)));
$grid->setColProperty('Status_Siswa', array("label"=>"Status Santri","editrules"=>array("edithidden"=>true,"required"=>false), "editoptions"=>array("tabindex"=>17,"readonly"=>true)));

//Column 2=====================================================
//$grid->setColProperty('Status_Siswa', array("label"=>"Status Santri","formoptions"=>array("rowpos"=>4,"colpos"=>1),"edittype"=>"select","editrules"=>array("edithidden"=>true,"required"=>false), "editoptions"=>array("tabindex"=>11,"value"=>"Aktif:Aktif")));
$grid->setColProperty('Kelompok', array("label"=>"Kelompok","formoptions"=>array("rowpos"=>4,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>true),"editoptions"=>array("required"=>true)));
$grid->setColProperty('Desa', array("label"=>"Desa","formoptions"=>array("rowpos"=>3,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("required"=>true)));
$grid->setColProperty('Daerah', array("label"=>"Daerah","formoptions"=>array("rowpos"=>5,"colpos"=>2,"elmsuffix"=>"&nbsp;(Wajib)"),"editrules"=>array("edithidden"=>true,"required"=>true)));
$grid->setColProperty('mulai_pengajian', array("label"=>"Mulai Mengaji","formoptions"=>array("rowpos"=>6,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Status_Pondok', array("label"=>"Status Mondok","formoptions"=>array("rowpos"=>7,"colpos"=>2, "elmsuffix"=>"(Wajib Isi)"),"edittype"=>"select","editrules"=>array("required"=>true), "editoptions"=>array("value"=>"Sekolah:Sekolah")));
$grid->setColProperty('utusan', array("label"=>"Utusan","formoptions"=>array("rowpos"=>8,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Tanggal_Masuk_CKM', array("label"=>"Tanggal Masuk CKM","formoptions"=>array("rowpos"=>9,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Tanggal_Masuk_CKM', 
        array("formatter"=>"date",
            "formatoptions"=>array("srcformat"=>"Y-m-d H:i:s", "newformat"=>"Y-m-d"),
            "editoptions"=>array("dataInit"=>
                "js:function(elm){setTimeout(function(){
                    jQuery(elm).datepicker({dateFormat:'yy-mm-dd'});
                    jQuery('.ui-datepicker').css({'zIndex':'1200','font-size':'75%'});},100);}")
            ));	

$grid->setColProperty('Penanggung_Jawab', array("label"=>"Penanggung Jawab","edittype"=>"select","formoptions"=>array("rowpos"=>10,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("value"=>" : ;Ayah:Ayah;Ibu:Ibu;Wali:Wali")));
$grid->setColProperty('No_HP_Penanggung_Jawab', array("label"=>"No HP Penanggung Jawab","formoptions"=>array("rowpos"=>11,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("required"=>true)));
$grid->addCol(array("name"=>"fileToUpload","label"=>"Upload Foto", "hidden"=>true,"formoptions"=>array("rowpos"=>26,"colpos"=>2), "editable"=>true, "edittype"=>"file", "editrules"=>array("edithidden"=>true)));

$grid->setColProperty('Nama_Ayah', array("label"=>"Nama Ayah","formoptions"=>array("rowpos"=>13,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>true),"editoptions"=>array("required"=>true)));
$grid->setColProperty('Alamat_Ayah', array("label"=>"Alamat ayah","edittype"=>"textarea","editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("rows"=>2,"cols"=>30,"required"=>true),"formoptions"=>array("rowpos"=>17,"colpos"=>2)));
$grid->setColProperty('No_HP_Ayah', array("label"=>"No HP Ayah","formoptions"=>array("rowpos"=>15,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("required"=>true)));
;
$grid->setColProperty('Pekerjaan_Ayah', array("label"=>"Pekerjaan Ayah","formoptions"=>array("rowpos"=>16,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('Nama_Ibu', array("label"=>"Nama Ibu","formoptions"=>array("rowpos"=>21,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("required"=>true)));
$grid->setColProperty('Alamat_Ibu', array("label"=>"Alamat Ibu","edittype"=>"textarea","editrules"=>array("edithidden"=>true,"required"=>false),"editoptions"=>array("rows"=>2,"cols"=>30),"formoptions"=>array("rowpos"=>24,"colpos"=>2)));
$grid->setColProperty('NO_Telp_Ibu', array("label"=>"No HP Ibu","formoptions"=>array("rowpos"=>22,"colpos"=>2),"editrules"=>array("edithidden"=>false,"required"=>false)));
$grid->setColProperty('Pekerjaan_Ibu', array("label"=>"Pekerjaan Ibu","formoptions"=>array("rowpos"=>23,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false)));
$grid->setColProperty('pindah_pondok', array("label"=>"Pindah Pondok","formoptions"=>array("rowpos"=>25,"colpos"=>2),"editrules"=>array("edithidden"=>true,"required"=>false)));

$grid->setSelect("id_sekolah", "SELECT DISTINCT id_sekolah, nama_sekolah AS nama_sekolah FROM mst_tb_sekolah WHERE id_sekolah = 1 ORDER BY 1", true, true, true, array(""=>"All"));

$grid->setSelect("id_tingkat", "SELECT DISTINCT id, Tingkat AS Tingkat FROM mst_tb_tingkat WHERE id_sekolah = 1 ORDER BY 1", true, true, true, array(""=>"All"));

$grid->setSelect("Daerah", "SELECT DISTINCT nama_daerah, nama_daerah AS nama_daerah FROM tb_master_daerah ORDER BY 1", true, true, false, array(""=>"All"));
$grid->setSelect("utusan", "SELECT DISTINCT nama_daerah, nama_daerah AS nama_daerah FROM tb_master_daerah ORDER BY 1", true, true, true, array(""=>"All"));
$grid->setSelect("detail_kelas", "SELECT DISTINCT id, Nama_Kelas AS Nama_Kelas FROM mst_tb_setting_kelas_pondok ORDER BY No_Urut", true, true, true, array(""=>"All"));

/*
$grid->setSelect("Kelas", "SELECT DISTINCT id, Nama_Kelas AS Nama_Kelas FROM mst_tb_setting_kelas ORDER BY 1", true, true, true, array(""=>"All"));
*/

$grid->setSelect("kelompok_pondok", "SELECT DISTINCT id, kelompok AS kelompok FROM tbs_kelompok ORDER BY 2", true, true, true, array(""=>"All"));


$grid->setDatepicker("Tanggal_Lahir",array("changeMonth"=>true,"changeYear"=>true,"dateFormat"=>'dd/mm/yy',"yearRange"=>'c-30:c+35'), true, false); 
$grid->setDatepicker("Tanggal_Masuk",array("changeMonth"=>true,"changeYear"=>true,"dateFormat"=>'dd/mm/yy',"yearRange"=>'c-35:c+35'), true, false); 

//javascript

$custom = <<<CUSTOM
jQuery("#cetakformulirsmp").click(function(){
	var selr = $('#grid_smp').jqGrid('getGridParam','selrow');
    var qID = $('#grid_smp').jqGrid('getCell',selr,'id');
	
	//alert(qID);
    if(qID) 	
	{
		alert(qID);
		$("#dialog-print").dialog({
										 position: ['top', 0],
										 height: 620,
									  	 width: 800,
										 open: function(event, ui) {								 
										 $.get("identitas_santri_baru.php?NoP="+qID, function(data,status) {
											  if (status == "success") {	
													$("div#dialog-print").html(data);	
											  }
										  });
										}
		});	
	}	
	/*{
    var page = "../report/identitas_santri.php?NoP="+qID;			
			vWinCal = window.open(page, "AWins", "toolbar=no,menubar=no,location=no,scrollbars=yes,width=600,height=907,leff=90,top=115,resizable=yes");
			vWinCal.opener = self;			
				}*/		
	else alert("No selected row");
    return false;
	
});



jQuery("#getpembayaran").click(function(){
    var selr = $('#grid_smp').jqGrid('getGridParam','selrow');
    var qIDs = $('#grid_smp').jqGrid('getCell',selr,'id');
	
	
    if(qIDs) 
	{
		$("#dialog-print").dialog({
										 position: ['top', 200],
										 height: 500,
									  	 width: 900,
										 open: function(event, ui) {								 
										 $.get("../report/detail_pembayaran.php?NoP="+qIDs, function(data,status) {
											  if (status == "success") {	
													$("div#dialog-print").html(data);	
											  }
										  });
										}
		});	
	}		
	else alert("No selected row");
    return false;
});




CUSTOM;
$grid->setJSCode($custom);

$upload = <<<UPLOAD
function(formid) {	


$(formid).attr("method","POST");
$(formid).attr("action","");
$(formid).attr("enctype","multipart/form-data");
// Create a button bellow the file field
$("<br/><button id='buttonUpload'>Upload</button>").insertAfter("#fileToUpload",formid);
// bind a event
$("#buttonUpload",formid).click(function(){
	$.ajaxFileUpload({	   
		url:'../model/upload_siswa.php?nis='+$("#id").val(),
		secureuri:false,
		fileElementId:'fileToUpload',
		dataType: 'json',
		success: function (data, status) {
			console.log(data);
			if(typeof(data.error) != 'undefined')
			{
				if(data.error != '')
				{
					alert(data.error);
				}else{
					$("#fileToUpload").val("");
					alert(data.msg);
				}
			}
		},
		error: function (data, status, e)
		{
			alert(e);
		}
	});
	return false;
	
});


	jQuery("#Nama_Lengkap",formid).change(function(e) {
        var sks = $("#Nama_Lengkap",formid).val();	   
	    var sta = $("#Nama_Ayah",formid).val();
	    var dateObject = $("#Tanggal_Lahir").datepicker("getDate");
	    var kel = $.datepicker.formatDate("yy-mm-dd", dateObject);
        if(sks) {
			
            jQuery("#Nama_Lengkap",formid).html("");
            jQuery.ajax({
                url: '../model/cek_nama.php?sks='+sks+'&kel='+kel+'&sta='+sta,
                dataType: 'json',
                data: {sks:sks},
                success: function(result){			
	          		if(result)
					{
						alert ('Data Sudah Ada Sebelumnya, Nama Santri : ' + result );
					}
			  }   
            });
        }
    });
	
		
	jQuery("#Tanggal_Lahir",formid).change(function(e) {
        var sks = $("#Nama_Lengkap",formid).val();	   
	    var sta = $("#Nama_Ayah",formid).val();
	    var dateObject = $("#Tanggal_Lahir").datepicker("getDate");
	    var kel = $.datepicker.formatDate("yy-mm-dd", dateObject);
		
        if(sks) {
			
            jQuery("#Nama_Lengkap",formid).html("");
            jQuery.ajax({
                url: '../model/cek_nama.php?sks='+sks+'&kel='+kel+'&sta='+sta,
                dataType: 'json',
                data: {sks:sks},
                success: function(result){			
	          		if(result)
					{
						alert ('Data Sudah Ada Sebelumnya, Nama Santri : ' + result );
					}
			  }   
            });
        }
    });
	
	
}
UPLOAD;

$selectorder = <<<ORDER
function(rowid, selected)
{
    if(rowid != null) {
		var qID = $('#grid').jqGrid('getCell',rowid,'id');
		
        //alert(qID);
        jQuery("#detail").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detail").trigger("reloadGrid");	
		jQuery("#detail_kelas").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detail_kelas").trigger("reloadGrid");
		jQuery("#detail_kes").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detail_kes").trigger("reloadGrid");
    
		 jQuery(document).ready(function(){
                $.ajax({
                   url: "detail_perilaku.php?nis="+qID,
                    dataType : "html",
                    data : {gridheigh: "300"},
                    success : function(data) {
                        $("#griddef").html( data );
                       
                    }
                });
            });	
	}	
}

ORDER;

$beforeshow = <<< BEFORESHOW
function(formid)
{
	
	var year = new Date().getFullYear() ;
    var month = new Date().getMonth() + 1 ;
	
	if(month<3)
	{
		var nxt = year;
		var thn_ajaran = year - 1 ;
		$("input#Tahun_Ajaran").val(thn_ajaran);
	}
	else
	{
		var nxt = year;
		var thn_ajaran = year;
		$("input#Tahun_Ajaran").val(thn_ajaran);
	}
   	
	var now = new Date().getTime() / 1000;
    var s = parseInt(now, 10);
	$("input#MKTime").val(s) ;
	//$("#id_sekolah",formid).val(5);	
	
	
	$("#detail_kelas").attr('disabled','disabled');
	
		
}
BEFORESHOW;



$grid->setGridEvent('onSelectRow', $selectorder);
$grid->setNavEvent('add', 'beforeShowForm', $beforeshow);
$grid->setNavEvent('edit', 'beforeShowForm', $beforeshow);
//javascript

//after crud action

$cid = jqGridUtils::GetParam('MKTime');
//Event After Crud

/*$grid->setAfterCrudAction('add', "INSERT INTO  tb_biaya_pondok (id_siswa,id_biaya,Jumlah,Tahun_Ajaran) (SELECT (SELECT id FROM tb_siswa WHERE MKTime = ?),  id , Biaya, CASE WHEN MONTH(NOW()) < 6 THEN YEAR(NOW()) ELSE YEAR(NOW()) END FROM mst_tb_komponen_biaya WHERE  Status_Biaya = 'Aktif' AND (Kategori = 'Sekolah & Person' OR Kategori = 'Sekolah')  ORDER BY  No_Urut)",array($cid));*/

/*$grid->setAfterCrudAction('add', "INSERT INTO  tb_histori_kelas (id_siswa,id_tingkat,id_kelas,Tahun_Ajaran)  (SELECT (SELECT id FROM tb_siswa WHERE MKTime = ?),(SELECT id_tingkat FROM tb_siswa WHERE MKTime = ?),(SELECT kelas FROM tb_siswa WHERE MKTime = ?),CASE WHEN MONTH(NOW()) < 6 THEN YEAR(NOW()) ELSE YEAR(NOW()) END)",array($cid));*/

/*$grid->setAfterCrudAction('add', "INSERT INTO tb_biaya_sekolah (id_siswa,id_tingkat,id_biaya,Jumlah,Jum_Seragam,Tahun_Ajaran) 
  (SELECT (SELECT id FROM tb_siswa WHERE MKTime = 1),
  (SELECT id_tingkat FROM tb_siswa WHERE MKTime = ?),id,Biaya,'1',
  CASE WHEN MONTH(NOW()) < 6 THEN YEAR(NOW()) ELSE YEAR(NOW())  END FROM mst_tb_komponen_biaya 
  WHERE id_tingkat = (SELECT id_tingkat FROM tb_siswa WHERE MKTime = ?) AND id_sekolah = '1' AND Status_Biaya = 'AKTIF')",array($cid));*/

/*$grid->setAfterCrudAction('add', "INSERT INTO tb_saldo_uang_makan (id_siswa,Keterangan,Kredit,Saldo,Tanggal) (SELECT id,'Biaya Makan',Uang_Makan(CONCAT(SUBSTR(Tanggal_Masuk,7,4),'-',SUBSTR(Tanggal_Masuk,4,2),'-',SUBSTR(Tanggal_Masuk,1,2)),1),	Uang_Makan(CONCAT(SUBSTR(Tanggal_Masuk,7,4),'-',SUBSTR(Tanggal_Masuk,4,2),'-',SUBSTR(Tanggal_Masuk,1,2)),1), CONCAT(SUBSTR(Tanggal_Masuk,7,4),'-',SUBSTR(Tanggal_Masuk,4,2),'-',SUBSTR(Tanggal_Masuk,1,2))  FROM tb_siswa WHERE MKTime = ?)",array($cid));

$grid->setAfterCrudAction('add', "INSERT INTO tb_histori_tunggakan_pondok (id_siswa,Ketentuan,Tahun_Ajaran) (SELECT (SELECT id FROM tb_siswa WHERE MKTime = '$cid'), SUM(Jumlah), Tahun_Ajaran FROM tb_biaya_pondok WHERE id_siswa = (SELECT id FROM tb_siswa WHERE MKTime = '$cid'))",array($cid));

$grid->setAfterCrudAction('edit', "INSERT INTO tb_histori_tunggakan_pondok (id_siswa,Ketentuan,Tahun_Ajaran) (SELECT (SELECT id FROM tb_siswa WHERE MKTime = '$cid'), SUM(Jumlah), Tahun_Ajaran FROM tb_biaya_pondok WHERE id_siswa = (SELECT id FROM tb_siswa WHERE MKTime = '$cid'))",array($cid));*/

$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET NISS = Create_Nis_Siswa(Tanggal_Masuk) WHERE MKTime=? AND (NISS = '' or NISS IS NULL)",array($cid));
$grid->setAfterCrudAction('edit', "UPDATE tb_siswa SET NISS = Create_Nis_Siswa(Tanggal_Masuk) WHERE MKTime=? AND (NISS = '' or NISS IS NULL)",array($cid));


$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET id_card = Create_IDCard(Tanggal_Masuk,'".$cid."') WHERE MKTime=? AND (id_card = '' or id_card IS NULL)",array($cid));
$grid->setAfterCrudAction('edit', "UPDATE tb_siswa SET id_card = Create_IDCard(Tanggal_Masuk,'".$cid."') WHERE MKTime=? AND (id_card = '' or id_card IS NULL)",array($cid));


$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET Kelas = '' WHERE MKTime=?",array($cid));
// $grid->setAfterCrudAction('edit', "UPDATE tb_siswa SET Kelas = '' WHERE MKTime=?",array($cid));


$grid->setAfterCrudAction('add', "INSERT INTO tb_histori_kelas_pondok (id_siswa,id_tingkat,id_kelas,Tanggal_Masuk) (SELECT id,1,1,Tanggal_Masuk FROM tb_siswa WHERE MKTime = ?)",array($cid));

$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET Kelas_Pondok = 1 WHERE MKTime=?",array($cid));
//$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET Tanggal_Kelas = Tanggal_Masuk WHERE MKTime=?",array($cid));
$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET warganegara = 'WNI' WHERE MKTime=?",array($cid));
$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET Status_Siswa = 'Aktif' WHERE (Status_Mukim = 'Mukim' or Status_Mukim = 'Non Mukim') AND MKTime=?",array($cid));
$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET Status = 'Aktif' WHERE MKTime=?",array($cid));
$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET Tanggal_Lahir = NULL  WHERE Tanggal_Lahir='1970-01-01'",array($cid));
//$grid->setAfterCrudAction('add', "UPDATE tb_siswa SET asal_pondok = SUBSTR(NISS,1,3)  WHERE MKTime=?",array($cid));
//subgrid

$grid->setSubGridGrid('details_siswa.php');



$selectorder = <<<ORDER
function(rowid, selected)
{
   
    if(rowid != null) 
	{
		var qID = $('#grid').jqGrid('getCell',rowid,'id');
		
		jQuery("#subdetail").jqGrid('setGridParam',{postData:{id:0}});
        jQuery("#subdetail").trigger("reloadGrid");	
		jQuery("#subdetail").jqGrid('setGridParam',{postData:{kls:0}});
        jQuery("#subdetail").trigger("reloadGrid");
        jQuery("#detail").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detail").trigger("reloadGrid");
        jQuery("#detailK").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detailK").trigger("reloadGrid");
		jQuery("#detail_kes").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detail_kes").trigger("reloadGrid");		
		jQuery("#detailKh").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detailKh").trigger("reloadGrid");
		jQuery("#detailKhp").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detailKhp").trigger("reloadGrid");
		jQuery("#detailKhpb").jqGrid('setGridParam',{postData:{id:qID}});
        jQuery("#detailKhpb").trigger("reloadGrid");
		
        // Enable CRUD buttons in navigator when a row is selected
        jQuery("#add_detail").removeClass("ui-state-disabled");
        jQuery("#edit_detail").removeClass("ui-state-disabled");
        jQuery("#del_detail").removeClass("ui-state-disabled");		
    }
	
}

ORDER;

$cleargrid = <<<CLEAR
function(rowid, selected)
{
   // clear the grid data and footer data
    jQuery("#detail").jqGrid('clearGridData',true);
    // Disable CRUD buttons in navigator when a row is not selected
    jQuery("#add_detail").addClass("ui-state-disabled");
    jQuery("#edit_detail").addClass("ui-state-disabled");
    jQuery("#del_detail").addClass("ui-state-disabled");
}
CLEAR;

$grid->setGridEvent('onSelectRow', $selectorder);
$grid->setGridEvent('onSortCol', $cleargrid);
$grid->setGridEvent('onPaging', $cleargrid);
// Enable navigator
$grid->navigator = true;
$grid->toolbarfilter = true;
$grid->setFilterOptions(array("stringResult"=>true));

//Event
$grid->setNavEvent('edit', 'onInitializeForm', $upload);
$grid->setNavEvent('add', 'onInitializeForm', $upload);




//form setting

$grid->setNavOptions('add', array("height"=>'auto',"dataheight"=>'auto',"width"=>"auto","closeAfterAdd"=>true));
$grid->setNavOptions('edit', array("height"=>'auto',"dataheight"=>'auto',"width"=>"auto","closeAfterEdit"=>true));
$grid->setNavOptions('view', array("height"=>'auto',"dataheight"=>'auto',"width"=>"850","closeAfterEdit"=>true));
// Enable only deleting
$grid->setNavOptions('navigator', array("excel"=>true,"add"=>true,"edit"=>true,"del"=>false,"view"=>true, "search"=>true));
// Enjoy
$grid->renderGrid('#grid_smp','#pager_smp',true, null, null, true,true);
$conn = null;
?>
