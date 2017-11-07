<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$Language='1';
include_once  './Include/web_inc.php';
include_once  './Templete/default/Include/Function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo  newsview("info_title",$ID)?></title> 
<meta content="<?php echo  newsview("info_keywords",$ID)?>" name="keywords">
<meta content="<?php echo  newsview("info_des",$ID)?>" name="description">
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
	$(".inq").hover(function(){$(this).focus().addClass("inqs");},function(){$(this).focus().removeClass("inqs");});
        $(".pic-dt img").hover(function(){$(this).animate({height:'230px',width:'230px'});},function(){$(this).animate({height:'200px',width:'200px'});});
 
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
        <!--mid left-->
        	<div class="sc_mid_c_left">
                <div class="sc_mid_c_new_left">
                <ul>
                <?php echo wbnews($Language,$web_url);?>
                </ul>
                </div>
                <div class="cb"></div>
                <div class="sc_mid_c_left_c sc_mid_left_bt"><?php echo $tag_hot;?></div>
                <div class="cb"></div>
                <div class="sc_mid_c_left_c"><?php echo indexpro("news",$Language,$tag_inquiry,$web_url,$webinlist);?></div>
                 
                
                
            
            </div>
         <!--mid right-->
            <div class="sc_mid_c_right">
                <div class="sc_mid_tits"><a href="<?php echo $web_url; ?>"><?php echo $tag_home; ?></a>  > <?php echo nlmcc($Language,newsview("info_lanmu",$ID));	?></div>
                <div class="cb"></div>
                <div class="sc_mid_c_right_c">
				<div class="sc_mid_c_right_title"><h1><?php echo  newsview("info_title",$ID)?></h1></div>
                <div class="cb"></div>
                <div class="sc_mid_c_new_v"><?php echo  newsview("info_content",$ID)?></div>
                <div class="cb"></div>
                
				</div>

            </div>
         <!--mid end-->
        
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
