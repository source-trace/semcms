<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$Language='1';
include_once  './Include/web_inc.php';
include_once  './Templete/default/Include/Function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tag_indexkey;?></title>
<meta content="<?php echo $tag_indexkey;?>" name="keywords">
<meta content="<?php echo $tag_indexdes;?>" name="description">
<link rel="shortcut icon" href="<?php echo $webico;?>" />
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
                <div class="sc_mid_c_left_c">
                <?php
                echo"<div class='fl' id='fl'><ul>";
                echo get_str(1,$Language,$web_url);
                echo"</ul></div>";
                ?>
                </div>
                <div class="cb"></div>
                <div class="sc_mid_c_left_c sc_mid_left_bt"><?php echo $tag_hot;?></div>
                <div class="cb"></div>
                <div class="sc_mid_c_left_c">
                <?php echo indexpro("news",$Language,$tag_inquiry,$web_url,$webinlist);?>
                </div>
                
                
            
            </div>
         <!--mid right-->
            <div class="sc_mid_c_right">
            	<div class="sc_mid_c_right_c">
                    <!--jdt-->
                    <div class="mBan2">
                    <div id="slideBox" class="slideBox">
                        <div class="hd">
                            <ul><?php echo  web_banner("an",$Language);?></ul>
                        </div>
                        <div class="bd">
                            <ul>
 			<?php echo  web_banner("nr",$Language);?>
                            </ul>
                        </div>
                    </div>
                    </div>
                    <script language="javascript">
                    jQuery(".slideBox").slide({mainCell:".bd ul",effect:"fold",autoPlay:true,trigger:"click"});
                    </script>
                    <!--jdt end-->
                    
                </div>
            	<div class="cb"></div>
                <div class="sc_mid_c_right_title"><?php echo $tag_tuijian;?></div>
                <div class="cb"></div>
                <div class="sc_mid_c_right_c"><?php echo indexpro("tj",$Language,$tag_inquiry,$web_url,$webiflist);?></div>
            
            
            </div>
         <!--mid end-->
        
        </div>
    
    
    </div>
   <!--mid end-->
<div class="cb"></div>
<!--bot-->

<div class="sc_bot">
	<div class="sc_bot_1">
    	<div class="sc_bot_1_t"><?php echo $tag_about;?></div>
        <div class="cb"></div>
        <div class="sc_bot_1_c"><?php echo $tag_homeabout;?></div>
        <div class="cb"></div>
    
    </div>
</div>

<div class="cb"></div>
<div class="sc_indexnews">
    <div class="sc_indexnews_t"><h3>Last News</h3></div>
    <div class="cb"></div>
    <div class="sc_indexnews_c">
        
        <?php echo indexwbnews($Language,$web_url);?>
    </div>

</div>
    <div class="cb"></div>
<?php include_once  './Templete/default/Include/Bot.php';?>
<!--bot end-->

</div>



</body>
</html>
