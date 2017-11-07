<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$Language='1';
include_once  './Include/web_inc.php';
include_once  './Templete/default/Include/Function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo aboutview($ID,"info_title");?></title>
<meta content="<?php echo aboutview($ID,"info_keywords");?>" name="keywords">
<meta content="<?php echo aboutview($ID,"info_des");?>" name="description">
<link href="<?php echo $web_url;?>Templete/default/Css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $web_url;?>Templete/default/Js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?php echo $web_url;?>Templete/default/Js/jquery.SuperSlide.js" type="text/javascript"></script>
<script src="<?php echo $web_url;?>Templete/default/Js/public.js" type="text/javascript"></script>
<?php echo $webmeate; ?>
<script>

	$(document).ready(function(){
 	$(".fl ul li").hover(function(){$(this).find("ul").first().slideDown(1);});
        $(".fl li").mouseleave(function(){$(this).find("ul").slideUp(1);});
   	$(".pic").hover(function(){$(this).focus().addClass("pics").fadeIn();},function(){$(this).focus().removeClass("pics");});
	$(".binq").hover(function(){$(this).focus().addClass("binqs");},function(){$(this).focus().removeClass("binqs");});
        $(".pic-dt img").hover(function(){$(this).animate({height:'230px',width:'230px'});},function(){$(this).animate({height:'200px',width:'200px'});});
        $(".sc_mid_proview_1_left_2 img").click(function(){$(".sc_mid_proview_1_left_1 img").attr("src",$(this).attr("src"))});
	$(".binq").click(function(){$('html,body').animate({scrollTop: $("#buynow").offset().top}, 1000)});
	
	});
 
</script>


 
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
 			<div class="sc_mid_proview_t"><a href="<?php echo $web_url; ?>"><?php echo $tag_home; ?></a> > <?php echo aboutview($ID,"info_title");?></div>
            <div class="cb"></div>
            <div class="sc_about"><h1><?php echo aboutview($ID,"info_title");?></h1><br><?php echo htmlspecialchars_decode(aboutview($ID,"info_content"),ENT_QUOTES);?></div>
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
