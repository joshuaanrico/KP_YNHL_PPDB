<?php
ob_start();
session_start();


include 'config/jq-config.php';
//include_once ("view/koreksi.php");
	$sqlCekLogin="SELECT * FROM mst_tb_pegawai WHERE userid='".$_SESSION['namauser']."' 
				  AND pass ='".$_SESSION['passuser']."'
				  AND grup ='".$_SESSION['grup']."'";	
	//echo $sqlCekLogin;			  
	$hasilCekLogin= @mysql_query($sqlCekLogin);
	$rowCekLogin = @mysql_fetch_array($hasilCekLogin); 
	
	if($_SESSION[UserID]=='' or empty($_SESSION[UserID]))
	{
		header("location:../../index.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>SIS - <?php echo $_SESSION["nama_sekolah"]; ?></title>

<style type="text/css">
#idletimeout { background:#CC5100; border:3px solid #FF6500; color:#fff; font-family:arial, sans-serif; text-align:center; font-size:12px; padding:10px; position:relative; top:0px; left:0; right:0; z-index:100000; display:none; }
#idletimeout a { color:#fff; font-weight:bold }
#idletimeout span { font-weight:bold }
.a {
	font-size: 24px;
	color: #F00;
}
</style>

<link rel="stylesheet" type="text/css" href="examples.css" />
<link rel="stylesheet" type="text/css" href="<?php echo _BASE_URL; ?>templates/css/home.css"></head>
<body>

<div id="idletimeout">
	Aplilasi Akan logged off Dalam Waktu <span><!-- countdown place holder --></span>&nbsp;detik. 
	<a id="idletimeout-resume" href="#">Klik Agar Tetap Dalam Aplikasi Ini</a>.
</div>

<script src="../js/jquery.min.js" type="text/javascript"></script>
<script src="../js/jquery.idletimer.js" type="text/javascript"></script>
<script src="../js/jquery.idletimeout.js" type="text/javascript"></script>
<script type="text/javascript">
$.idleTimeout('#idletimeout', '#idletimeout a', {
	idleAfter: 1200,
	pollingInterval: 2,
	keepAliveURL: 'keepalive.php',
	serverResponseEquals: 'OK',
	onTimeout: function(){
		$(this).slideUp();
		window.location = "view/logout.php";
	},
	onIdle: function(){
		$(this).slideDown(); // show the warning bar
	},
	onCountdown: function( counter ){
		$(this).find("span").html( counter ); // update the counter
	},
	onResume: function(){
		$(this).slideUp(); // hide the warning bar
	}
});
</script>
<?php
//echo($_SERVER['HTTP_USER_AGENT']);
$useragent = $_SERVER['HTTP_USER_AGENT']; 
if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) 
{
?>	
<link href="css/stayle_.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" href="css/css_tanggal.css">
<?php
}
else
{
?>
<link href="css/stayle.css" type="text/css" rel="stylesheet" media="screen" />
<link rel="stylesheet" type="text/css" href="css/css_tanggal.css">
<?php
}
?>
<?php echo $horizontal5; ?>
<div class="clear"></div>
<span class="a">User: <?=$_SESSION['namalengkap']?></span>



<div id="content_box">
<?php
  	if(empty($_SESSION['id_sekolah']) or $_SESSION['id_sekolah']=='')
	{
		exit;
	}
   
	if(isset($_GET['url']) and !empty($_GET['url']) and !empty($rowCekLogin) and $_GET['url'] <> "atur_grup")
	{	
	    ?>
        <iframe src="view/default.php?url=<?php echo  $_GET['url']  . "&skl=".$_SESSION['id_sekolah'] ;?>" style="left:100px;" align="middle" frameborder="0" width="100%" height="1500"> </iframe>
        <?php
	}
	
	elseif($_GET['url'] == "atur_grup")
	{
		?>
	   <iframe  src="index.php?act=menu&group_id=1" style="left:100px;" align="middle" frameborder="0" width="100%" height="1500"> </iframe>
		<?php
    }
	else
	{
	   ?>
        <iframe src="view/default.php?url=chart&iduser=<?php echo $_SESSION[UserID];?>" style="left:100px;" align="middle" frameborder="0" width="100%" height="900"> </iframe>
        <?php
	   
	}	
       ?>
</div>
</body>
</html>
