        <div class="sc_top">
        	<div class="sc_top_conment">
            	<div class="sc_top_conment_1"></div>
                <div class="cb"></div>
                <div class="sc_top_conment_2">
                    <div class="sc_top_conment_2_left"><a href='/'><img src="<?php echo $weblogo; ?>" alt="<?php echo $webname;?>" /></a></div>
                    <div class="sc_top_conment_2_right">
                    <div class="sc_top_conment_2_right_left"><form action="<?php echo $web_url; ?>search.php" method="post"><input type="text" name="search" id="search" class="sc_top_ser_1" value="<?php echo $tag_searchtit;?>" autocomplete="off" onfocus="if(this.value!='<?php echo $tag_searchtit;?>'){this.style.color='#666666'}else{this.value='';this.style.color='#666666'}" onblur="if(this.value==''){this.value='<?php echo $tag_searchtit;?>';this.style.color='#666666'}" /><input name="submit" id="submit" type="submit" value="<?php echo $tag_search;?>" class="sc_top_ser_2" /></form> </div>
                    <div class="sc_top_conment_2_right_right"><?php echo $webtel;?></div>
                    </div>
 
                </div>
                <div class="cb"></div>
                <div class="sc_top_conment_3">
                	<div class="sc_top_conment_3_left"><?php echo $tag_productcategory;?></div>
                    <div class="sc_top_conment_3_right" id="navalink"><?php echo web_nav($Language,$web_url);?></div>
                
                </div>
            </div>
        <div class="cb"></div>
        </div>