<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$Language='<{Language}>';
include_once  '<{dirpaths}>Include/web_inc.php';
include_once  '<{dirpaths}>Templete/<{Template}>/Include/Function.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($ID==""){echo $tag_prokey;}else{ echo pnlmcc($Language,$ID,"category_key");}?></title>
<meta content="<?php if($ID==""){echo $tag_prokey;}else{ echo pnlmcc($Language,$ID,"category_key");}?>" name="keywords">
<meta content="<?php if($ID==""){echo $tag_prodes;}else{ echo pnlmcc($Language,$ID,"category_des");}?>" name="description">
<link href="<?php echo $web_url;?>Templete/<{Template}>/Css/style.css" rel="stylesheet" type="text/css" />
<script src="<?php echo $web_url;?>Templete/<{Template}>/Js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="<?php echo $web_url;?>Templete/<{Template}>/Js/jquery.SuperSlide.js" type="text/javascript"></script>
<script src="<?php echo $web_url;?>Templete/<{Template}>/Js/public.js" type="text/javascript"></script>
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
    	
 <?php include_once  '<{dirpaths}>Templete/<{Template}>/Include/Top.php';?>
    
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
                <div class="sc_mid_c_left_c"><?php echo indexpro("news",$Language,$tag_inquiry,$web_url,$webinlist);?></div>
                
                
            
            </div>
         <!--mid right-->
            <div class="sc_mid_c_right">
                <div class="sc_mid_tits" id="botalink"><a href="<?php echo $web_url; ?>"><?php echo $tag_home; ?></a> > <?php if ($ID==""){echo $tag_product;}else{ echo lamcc($Language,$ID,$web_url);}	?></div>
                <div class="cb"></div>
                <div class="sc_mid_c_right_c"><?php
                
               
                if ($ID==""){
                //    echo productslistp($Language,$tag_inquiry,$web_url,$tag_more,"p",$webplist);
                echo productslist($Language,$tag_inquiry,$web_url,$tag_more);
                }else{
                    
              echo productslistp($Language,$tag_inquiry,$web_url,$tag_more,$ID,$webplist);
                }
                
                ?></div>

            </div>
         <!--mid end-->
        
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
