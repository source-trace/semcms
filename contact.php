<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$Language='1';
include_once  './Include/web_inc.php';
include_once  './Templete/default/Include/Function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tag_contact;?></title>
<link href="<?php echo $web_url;?>Templete/default/Css/style.css" rel="stylesheet" type="text/css" />
<?php echo $webmeate; ?>

</head>

<body>
<?php echo $webgoogle; ?>
<div class="sc">

	<!--top-->
    	
 <?php include_once  './Templete/default/Include/Top.php';?>
    
    <!--top end-->
    <div class="cb"></div>
    <!--mid-->
    <div class="sc_mid">
    	<div class="sc_mid_c">
 			<div class="sc_mid_proview_t"><a href="<?php echo $web_url; ?>"><?php echo $tag_home; ?></a> > <?php echo $tag_contact;?></div>
            <div class="cb"></div>
            <div class="sc_about"><h1><?php echo $tag_contact;?></h1><br><?php echo $tag_contacts;?></div>
            <div class="cb"></div>
            
        </div>
    
    
    </div>
   <!--mid end-->
<div class="cb"></div>
<!--bot-->
<?php include_once  './Templete/default/Include/Bot.php';?>
<!--bot end-->

</div>

</body>
</html>
