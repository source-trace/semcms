<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$Language='<{Language}>';
include_once  '<{dirpaths}>Include/web_inc.php';
include_once  '<{dirpaths}>Templete/<{Template}>/Include/Function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tag_download;?></title>
<link href="<?php echo $web_url;?>Templete/<{Template}>/Css/style.css" rel="stylesheet" type="text/css" />
<?php echo $webmeate; ?>
</head>
<body>
<?php echo $webgoogle; ?>
<div class="sc">

	<!--top-->
    	
 <?php include_once  '<{dirpaths}>Templete/<{Template}>/Include/Top.php';?>
    
    <!--top end-->
    <div class="cb"></div>
    <!--mid-->
    <div class="sc_mid">
    	<div class="sc_mid_c">
 			<div class="sc_mid_proview_t"><a href="<?php echo $web_url; ?>"><?php echo $tag_home; ?></a> > <?php echo $tag_download;?></div>
            <div class="cb"></div>
            <div class="sc_about"><h1><?php echo $tag_download;?></h1><br><div class="sc_download"> <?php echo downloadfile($Language,$web_url,$tag_download)?></div></div>
            <div class="cb"></div>
            
        </div>
    
    
    </div>
   <!--mid end-->
<div class="cb"></div>
<!--bot-->
<?php include_once  '<{dirpaths}>Templete/<{Template}>/Include/Bot.php';?>
<!--bot end-->

</div>

</body>
</html>
