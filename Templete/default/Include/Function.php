<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$ID=verify_id(@htmlspecialchars($_GET["ID"]));				
if (!isset($ID)){$ID=$ID;}else{$ID=="";}
$page=@htmlspecialchars($_GET["page"]);				
if (!isset($page)){$page=$page;}else{$page=="";} 
$search=@stripslashes(htmlspecialchars($_POST["search"]));
$search = str_replace("_", "\_", $search); 
$search = str_replace("%", "\%", $search); 
if (!isset($search)){$search=$search;}else{$search=="";} 

 

function web_nav($Language,$web_url){ //网站 导航  
    
    $sql="select * from sc_menu where languageID=$Language  order by  menu_paixu asc,ID asc";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        $linkurl=str_replace("/", "", $row['menu_link']);
 
    echo '<li><a href="'.$web_url.$linkurl.'">'.$row['menu_name'].'</a></li> ';

     }
    
}

function web_banner($str,$Language){ //banner
    $banners="";
    $sql="select * from sc_banner where languageID=$Language  order by  banner_paixu asc,ID asc";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
    if ($str=="nr")  { 
    $banners.= '<li><a href="'.$row['banner_url'].'"><img src='.str_replace('../','',$row['banner_image']).' /></a></li> ';
    }else{
        
      $banners.= '<li></li> ';   
    }

     }  
 return $banners;
}


function web_link($Language){ //友情链接
    
    $sql="select * from sc_link where languageID=$Language  order by  link_paixu asc,ID asc";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
    echo '<li><a href="'.$row['link_url'].'">'.$row['link_name'].'</a></li> ';

     }  

}


function web_language(){ //语言汇总
    
    $sql="select * from sc_language where language_open=1  order by language_paixu asc,ID asc";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        if ($row['language_mulu']==1){//判断根目录网站
           echo '<li><a href="/"><img src="'.str_replace('../','',$row['language_Image']).'">'.$row['language_ename'].'</a></li> ';
        } else{
            echo '<li><a href="'.$row['language_url'].'"><img src="'.str_replace('../','',$row['language_Image']).'">'.$row['language_ename'].'</a></li> ';    
        }
     }  

}

//网站基本标签

   $sql="select * from sc_tagandseo where languageID=$Language";
   $query=mysql_query($sql);
   while($row=mysql_fetch_array($query)){
      $tag_indexkey=$row['tag_indexkey'];// 首页关键词
      $tag_indexdes=$row['tag_indexdes'];// 首页描述
      $tag_prokey=$row['tag_prokey'];// 产品关键语
      $tag_prodes=$row['tag_prodes'];// 产品描述 
      $tag_newkey=$row['tag_newkey'];// 新闻关键词
      $tag_newdes=$row['tag_newdes'];// 新闻描述 
      $tag_homeabout=htmlspecialchars_decode($row['tag_homeabout'], ENT_QUOTES);
      $tag_contacts=htmlspecialchars_decode($row['tag_contacts'], ENT_QUOTES);
      $tag_home=$row['tag_home'];// 主页
      $tag_about=$row['tag_about'];// 关于我们
      $tag_product=$row['tag_product'];// 产品中心
      $tag_productcategory=$row['tag_productcategory'];// 产品分类
      $tag_news=$row['tag_news'];// 新闻中心
      $tag_contact=$row['tag_contact'];// 联系我们
      $tag_tel=$row['tag_tel'];// 电话
      $tag_email=$row['tag_email'];// 邮箱
      $tag_download=$row['tag_download'];// 下载中心
      $tag_message=$row['tag_message'];// 在线留言 
      $tag_hot=$row['tag_hot'];// 热门产品
      $tag_tuijian=$row['tag_tuijian'];//推荐产品
      $tag_search=$row['tag_search'];//搜索
      $tag_title=$row['tag_title'];//标题
      $tag_content=$row['tag_content'];//内容
      $tag_proxxms=$row['tag_proxxms'];//产品描述
      $tag_proxgcp=$row['tag_proxgcp'];//相关产品
      $tag_newsxg=$row['tag_newsxg'];//相关新闻
      $tag_searchms=$row['tag_searchms'];//搜索提示
      $tag_messgetj=$row['tag_messgetj'];//留言提示
      $tag_messgets=$row['tag_messgets'];//提示2
      $tag_more=$row['tag_more'];//更多
      $tag_code=$row['tag_code'];// 验证码
      $tag_follow=$row['tag_follow'];//分享
      $tag_searchtit=$row['tag_searchtit'];//搜索框中提示文字
      $tag_inquiry=$row['tag_inquiry'];//询盘
      $tag_Item=$row['tag_Item'];//产品编号
   } 
   
   // 网站产品分类
   
   function get_str($id,$lgid,$web_url) { //无限给分类
    global $str; 
    $sql = "select * from sc_categories where category_pid= $id and languageID=$lgid and category_open=1 order by category_paixu,ID asc ";
    $result = mysql_query($sql);//查询pid的子类的分类 
    if($result && mysql_affected_rows()){//如果有子类 
       
        while ($row = mysql_fetch_array($result)) { //循环记录集 
            
            $str .= "<li><a href='".$web_url."product.php?ID=".$row['ID']."'>".$row['category_name']."</a>".get_str2($row['ID'],$web_url); //构建字符串 
            
               //调用get_str()，将记录集中的id参数传入函数中，继续查询下级 
            
       $str .= '</li>'; 
    } 
    if($str==""){
        $str="<li>no infomation!</li>";
    }else{$str=$str;}
    return $str; 
} 
   }

   function get_str2($ids,$web_url) { //无限给分类
    $str2="";
    $sql2 = "select * from sc_categories where category_pid=$ids and category_open=1 order by category_paixu,ID asc ";
    $results = mysql_query($sql2);//查询pid的子类的分类 
    if($results && mysql_affected_rows()){//如果有子类 
        
        while ($row = mysql_fetch_array($results)) { //循环记录集 
            
            $str2 .= "<li><a href='".$web_url."product.php?ID=".$row['ID']."'>".$row['category_name']."</a>".get_str2($row['ID'],$web_url)."</li>"; //构建字符串 
 
    } 
    if($str2==""){
        $str2=" ";
    }else{$str2="<ul>".$str2."</ul>";}
    return $str2; 
} 
   }
   
  // 首页产品推荐, //首页新产品
function indexpro($str, $Language, $tag_inquiry, $web_url,$weblist) {
    $indexpros = "";
    if ($str == "tj") {
        $sql = "select    * from  sc_products where languageID=$Language and products_zt=1 and products_index=1 order by  products_paixu asc, ID asc limit $weblist ";
    } else {
        $sql = "select    * from  sc_products where languageID=$Language and products_zt=1  order by   ID desc limit $weblist ";
    }
    $query = mysql_query($sql);
    Panduan(mysql_num_rows($query));

    while ($row = mysql_fetch_array($query)) {

        $Imgs = explode(",", $row['products_Images']);
        $Imgs = $web_url . str_replace("Images/prdoucts", "Images/prdoucts/small", $Imgs[0]);
        if ($str == "tj") {
            $indexpros.="<div class='pic'><div class='pic-div'><dt class='pic-dt'><a href='".$web_url."view.php?ID=".$row['ID']."'><img src='" . str_replace("../", "", $Imgs) . "' alt='" . $row['products_name'] . "'></a></dt><dd><a href='".$web_url."view.php?ID=".$row['ID']."'>" . $row['products_name'] . "</a></dd><dd><span class='inq'><a href='".$web_url."view.php?ID=".$row['ID']."#buynow'>" . $tag_inquiry . "</a></span></dd></div></div>";
        } else {
            $indexpros.="<div class='picl'><div class='picl-div'><dt class='picl-dt'><a href='".$web_url."view.php?ID=".$row['ID']."'><img src='" . str_replace("../", "", $Imgs) . "' alt='" . $row['products_name'] . "'></a></dt><dd><a href='".$web_url."view.php?ID=".$row['ID']."'>" . $row['products_name'] . "</a></dd><dd><span class='inq'><a href='".$web_url."view.php?ID=".$row['ID']."#buynow'>" . $tag_inquiry . "</a></span></dd></div></div>";
        }
    }
    return $indexpros;
}

//首页关于我们
    
    function indexabout($Language){

         $sql="select * from sc_info where languageID=$Language and info_url='About-us'";
         $query=mysql_query($sql);
         while($row=mysql_fetch_array($query)){
          // $preg = "/<([a-zA-Z]+)[^>]*>/";
            // $abouus=preg_replace($preg,'',$row['info_content']);
            $abouus= substr(strip_tags($row['info_content']),"0","1000");
         }
        
         return $abouus; 
    }
   
   //首页新闻信息
    
 
   function checkinfos($str,$Language){ //查询数据信息
    
    $sql="select * from sc_categories where category_url='$str' and languageID=$Language and category_open=1";    
    $result=mysql_query($sql); 
 
    $row = mysql_fetch_array($result,MYSQL_ASSOC); 
 
    if (!mysql_num_rows($result)) 
        { 
         
     echo "";
        
        } 
    else 
        {     

        $strs=$row['ID'];
        return $strs;
        }     
    
}

//网站尾部信息


function wbabout($str,$Language,$web_url){ //1)关于我们
    
         $lanmuid=checkinfos($str,$Language);
         $aboulm="";
         $sql="select * from sc_info where languageID=$Language and info_lanmu=$lanmuid";
         $query=mysql_query($sql);
         while($row=mysql_fetch_array($query)){
 
            $aboulm.="<li><a href='".$web_url."about.php?ID=".$row['ID']."'>". $row['info_title']."</a></li>";
         }
        
         return $aboulm; 
  
}

function  downloadfile($Language,$web_url,$tag_download){ //1)资料下载
    
        $aboulm="";
         $sql="select * from sc_download where languageID=$Language order by down_paixu asc ,ID asc";
         $query=mysql_query($sql);
         while($row=mysql_fetch_array($query)){
            
            $kzm=explode(".",$row['down_file']);
            
            if (end($kzm)=="xls" ||  end($kzm)=="xlsx" ){
                $img="<img src='Images/default/excel.png' width='30' alt='excel'>";
            }elseif(end($kzm)=="zip" ||  end($kzm)=="rar" ){
             $img="<img src='Images/default/zip.png' width='30' alt='rar,zip'>";   
            }elseif(end($kzm)=="pdf"){
             $img="<img src='Images/default/pdf.png' width='30' alt='pdf'>";   
            }else{
            $img="<img src='Images/default/other.png' width='30' alt='other'>";       
            }
             
            $aboulm.="<ul><li class='sc_d1'>$img</li><li class='sc_d2'>".$row['down_name']."</li><li class='sc_d3'><a href='".$web_url.str_replace("../","",$row['down_file'])."'>$tag_download</a></li></ul>";
         }
        
         return $aboulm; 
  
}


function wbnews($Language,$web_url){//新闻栏目
         $wbnews="";
         $sql="select * from sc_categories where languageID=$Language and category_pid=2 and category_open=1 and category_url<>'About'";
         $query=mysql_query($sql);
         while($row=mysql_fetch_array($query)){
 
            $wbnews.="<li><a href='".$web_url."news.php?ID=".$row['ID']."'>". $row['category_name']."</a></li>";
         }
        
         return $wbnews; 

}




function indexwbnews($Language,$web_url){//新闻栏目
         $wbnews="";
         $sql="select * from sc_categories where languageID=$Language and category_pid=2 and category_open=1 and category_url<>'About'";
         $query=mysql_query($sql);
         while($row=mysql_fetch_array($query)){

            
          $sqls="select * from sc_info where languageID=$Language and info_lanmu=".$row['ID']." order by ID desc limit 6";
         $querys=mysql_query($sqls);
         while($rows=mysql_fetch_array($querys)){
 
            $indexnews.="<div class='sc_index_new'><ul><li class='sc_indexnewli'><a href='".$web_url."info.php?ID=".$rows['ID']."'><img src='".str_replace("../", "",$rows['info_image'])."'></a></li><li><a href='".$web_url."info.php?ID=".$rows['ID']."'>". $rows['info_title']."</a></li></ul></div>";
            
         }           
            
            
            
            
         }
        
         return $indexnews; 

}



function wbpro($Language,$web_url){//产品栏目   
         $wbpro="";
         $sql="select * from sc_categories where languageID=$Language and category_pid=1 and category_open=1 order by category_paixu,ID asc limit 5 ";
         $query=mysql_query($sql);
         while($row=mysql_fetch_array($query)){
 
            $wbpro.="<li><a href='".$web_url."product.php?ID=".$row['ID']."'>". $row['category_name']."</a></li>";
         }
        
         return $wbpro; 

}

function wbcontact($webemail,$webskype,$webwathsapp,$web_url){ //联系方式
    
    $wbcontact="<li><img src='".$web_url."Images/default/Emailb.png' align='absmiddle'> <a href='mailto:".$webemail."'>".$webemail."</a></li><li><img src='".$web_url."Images/default/skypeb.png' align='absmiddle'> <a href='skype:".$webskype."?chat'>".$webskype."</a></li><li><img src='".$web_url."Images/default/Whatsappb.png' align='absmiddle'>".$webwathsapp."</li>";
    return $wbcontact;
}

function wbfollowus($webshare){ //分享
    
    $wbfollow=$webshare;
    return $wbfollow;
}

//产品总列表页面
 
// 查询所有分类的ID【共用】

function prolmid($Language,$ID){
    $str="";
    $strs="";
    $sql="select * from sc_categories where category_path like '%,".$ID.",%' and languageID=$Language and category_open=1";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){   
        
      $str.= "products_category like '%,".$row['ID'].",%' or ";
    } 
    $strs ="(".$str."products_category like '%,".$ID.",%')";
    return $strs;
}

function productslist($Language,$tag_inquiry,$web_url,$tag_more) {
    
   //显示每个栏目下的3个产品
     $indexpros = "";
     $indexprost="";
    $sql_p="select * from sc_categories where category_pid=1 and languageID=$Language and category_open=1  order by  category_paixu asc,ID asc ";
    $query_p=mysql_query($sql_p);
    Panduan(mysql_num_rows($query_p));
    while($row=mysql_fetch_array($query_p)){
  
    $lmID=prolmid($Language,$row['ID']);
    
    $protitle='<div class="sc_mid_c_right_title">'.$row['category_name'].'<span class="spr"><a href="?ID='.$row['ID'].'">'.$tag_more.'</a></span></div>';
 
    // 以下是产品信息
   
    $sql= "select * from  sc_products where languageID=$Language and products_zt=1 and  $lmID order by  products_paixu asc, ID asc limit 3 ";
    $query= mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while ($row = mysql_fetch_array($query)) {

        $Imgs = explode(",", $row['products_Images']);
        $Imgs = $web_url . str_replace("Images/prdoucts", "Images/prdoucts/small", $Imgs[0]);
 
            $indexpros.="<div class='pic'><div class='pic-div'><dt class='pic-dt'><a href='".$web_url."view.php?ID=".$row['ID']."'><img src='" . str_replace("../", "", $Imgs) . "' alt='" . $row['products_name'] . "'></a></dt><dd><a href='".$web_url."view.php?ID=".$row['ID']."'>" . $row['products_name'] . "</a></dd><dd><span class='inq'><a href='".$web_url."view.php?ID=".$row['ID']."#buynow'>" . $tag_inquiry . "</a></span></dd></div></div>";
        
       }
       
    $indexprost =$protitle.'<div class="sc_mid_c_right_c">'.$indexpros.'</div>';
    echo $indexprost;
    $indexpros="";
     }
    
    //return $indexprost;
   
}
// 产品列表，获取相应的ID 列出产品
function productslistp($Language,$tag_inquiry,$web_url,$tag_more,$ID,$webplist) {
 $indexpros="";
 $indexprost="";
    $sql_p="select * from sc_categories where ID=$ID and languageID=$Language and category_open=1  ";
    $query_p=mysql_query($sql_p);
    Panduan(mysql_num_rows($query_p));
    while($row=mysql_fetch_array($query_p)){
    $lmID=prolmid($Language,$row['ID']);
    $protitle='<div class="sc_mid_c_right_title">'.$row['category_name'].'</div>';
    }
 $sql=mysql_query("select * from sc_products where languageID=$Language and products_zt=1 and  $lmID");     
 $all_num=mysql_num_rows($sql); //总条数
 $page_num=$webplist; //每页条数
 $page_all_num = ceil($all_num/$page_num); //总页数
 $page=empty($_GET['page'])?1:$_GET['page']; //当前页数
 $page=(int)$page; //安全强制转换
 $limit_st = ($page-1)*$page_num; //起始数
  
 
    $sql="select  * from  sc_products where languageID=$Language and products_zt=1 and  $lmID order by  products_paixu asc, ID asc limit $limit_st,$page_num ";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        
        $Imgs = explode(",", $row['products_Images']);
        $Imgs = $web_url . str_replace("Images/prdoucts", "Images/prdoucts/small", $Imgs[0]);
        $indexpros.="<div class='pic'><div class='pic-div'><dt class='pic-dt'><a href='".$web_url."view.php?ID=".$row['ID']."'><img src='" . str_replace("../", "", $Imgs) . "' alt='" . $row['products_name'] . "'></a></dt><dd><a href='".$web_url."view.php?ID=".$row['ID']."'>" . $row['products_name'] . "</a></dd><dd><span class='inq'><a href='".$web_url."view.php?ID=".$row['ID']."#buynow'>" . $tag_inquiry . "</a></span></dd></div></div>";
    }
       $indexprost =$protitle.'<div class="sc_mid_c_right_c">'.$indexpros.'</div>';
  
       $fy="<div class='sc_mid_c_right_fy'>Total products ".$all_num.show_page($all_num,$page,$page_num)."</div>";
       
    echo $indexprost.$fy;
 }
 
 
 
 //分页函数----

function show_page($count,$page,$page_size)
{
    $page_count  = ceil($count/$page_size);  //计算得出总页 
 
    $init=1;
    $page_len=7;
    $max_p=$page_count;
    $pages=$page_count;
 
    //判断当前页码
    $page=(empty($page)||$page<0)?1:$page;
    //获取当前页url
    $url = $_SERVER['REQUEST_URI'];
    //去掉url中原先的page参数以便加入新的page参数
    $parsedurl=parse_url($url);
    $url_query = isset($parsedurl['query']) ? $parsedurl['query']:'';
    if($url_query != ''){
        $url_query = preg_replace("/(^|&)page=$page/",'',$url_query);
        $url = str_replace($parsedurl['query'],$url_query,$url);
        if($url_query != ''){
            $url .= '&';
        }
    } else {
        $url .= '?';
    }
     
    //分页功能代码
    $page_len = ($page_len%2)?$page_len:$page_len+1;  //页码个数
    $pageoffset = ($page_len-1)/2;  //页码个数左右偏移 
 
    $navs='';
    if($pages != 0){
        if($page!=1){
            //$navs.="<a href=\"".$url."page=1\">首页</a> ";        //第一� 
            $navs.="<a href=\"".$url."page=".($page-1)."\"> < </a>"; //上一 
        } else {
           // $navs .= "<span class='disabled'>首页</span>";
            $navs .= "";
        }
        if($pages>$page_len)
        {
            //如果当前页小于等于左偏移
            if($page<=$pageoffset){
                $init=1;
                $max_p = $page_len;
            }
            else  //如果当前页大于左偏移
            {    
                //如果当前页码右偏移超出最大分页数
                if($page+$pageoffset>=$pages+1){
                    $init = $pages-$page_len+1;
                }
                else
                {
                    //左右偏移都存在时的计�?
                    $init = $page-$pageoffset;
                    $max_p = $page+$pageoffset;
                }
            }
        }
        for($i=$init;$i<=$max_p;$i++)
        {
            if($i==$page){$navs.="<span class='current'>".$i.'</span>';} 
            else {$navs.=" <a href=\"".$url."page=".$i."\">".$i."</a>";}
        }
        if($page!=$pages)
        {
            $navs.=" <a href=\"".$url."page=".($page+1)."\"> > </a> ";//下一
           // $navs.="<a href=\"".$url."page=".$pages."\">末页</a>";    //后一
        } else {
            $navs .= "";
           // $navs .= "<span class='disabled'>末页</span>";
        }
        return " $navs";
   }
}

// 栏目层次

function lamcc($Language,$ID,$web_url){
 
   $strs="";
   $ID=rtrim($ID,",");
   $ID=ltrim($ID,",");
  // echo $ID;
    if (strpos($ID,"rand")!== false){//判断是否自定义随机产品
          $ID=explode("rand", $ID);
          $ID=explode(",",$ID[1]);
          $ID=end($ID);   
    }else{$ID=$ID; }
     $sql="select * from sc_categories where ID =$ID and languageID=$Language and category_open=1";  
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){   
 
      $str=substr(str_replace("0,1,","",$row['category_path']),0,-1);//去最后一个,号
    } 
    
    $arr = explode(",",$str);//分割
    foreach($arr as $u){
        
    $sql="select * from sc_categories where ID =$u and category_open=1";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){   
        
        $strs.="<a href='product.php?ID=$u'>".$row['category_name']."</a> > ";
     
        }      
    
    }
    $strs=substr($strs,0,-2);//去除最后两位
    return $strs;
}


//详细页面参数调用

function proview($ID,$ziduan,$web_url){
    $str2="";
    $query=mysql_query("select * from sc_products where ID =$ID ");
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){   
        if($ziduan=="products_Images"){
            
            
        $strs= explode(",",$row[$ziduan]);
        $str1= "<div class='sc_mid_proview_1_left_1'><img src='".$web_url.str_replace("../","",$strs[0])."' alt='".$row['products_name']."' /></div>";   
        foreach($strs as $st){
         if ($st!==""){ 
          $str2.= " <img src='".$web_url.str_replace("../","",$st)."' alt='".$row['products_name']."'/> ";   
          }  
        }
         $str=$str1."<div class='sc_mid_proview_1_left_2'>".$str2."</div> ";
        }elseif($ziduan=="products_category"){
               $products_xiangguan=trim($row['products_xiangguan']);//判断是否自定义随机产品
            if (strlen($products_xiangguan)>0){
               $str= $products_xiangguan."rand".$row[$ziduan];  
            }else{
                  $str=ltrim($row[$ziduan],",");
                  $str=rtrim($str,",");
                  $str=explode(",",$str); 
                  $str=end($str);   
            }
            
        }else{
          $str=htmlspecialchars_decode($row[$ziduan],ENT_QUOTES);
        }
  
     
        }
        return $str;
    
}

// 随机产品
 
function sjpro($Language, $tag_inquiry,$ID,$web_url) {
    $indexpros = "";
    if (strpos($ID,"rand")!== false){//判读随机产品是否后台选择的
        $ID= explode("rand", $ID);
    $queryx = mysql_query("select * from  sc_products where languageID=$Language and products_zt=1 and ID in ($ID[0])");    
    }else{
    $queryx = mysql_query("select * from  sc_products where languageID=$Language and products_zt=1 and products_category like '%".$ID."%' order by RAND() limit 4 ");   
    }
    
    Panduan(mysql_num_rows($queryx));

    while ($row = mysql_fetch_array($queryx)) {

        $Imgs = explode(",", $row['products_Images']);
        $Imgs = $web_url . str_replace("Images/prdoucts", "Images/prdoucts/small", $Imgs[0]);
    
            $indexpros.="<div class='pic'><div class='pic-div'><dt class='pic-dt'><a href='".$web_url."view.php?ID=".$row['ID']."'><img src='" . str_replace("../", "", $Imgs) . "' alt='" . $row['products_name'] . "'></a></dt><dd><a href='".$web_url."view.php?ID=".$row['ID']."'>" . $row['products_name'] . "</a></dd><dd><span class='inq'><a href='".$web_url."view.php?ID=".$row['ID']."#buynow'>" . $tag_inquiry . "</a></span></dd></div></div>";
  
    }
    return $indexpros;
}

// 关于我们信息调用

function aboutview($ID,$ziduan){

    $indexpros = "";
 
    $query = mysql_query("select * from  sc_info where ID=$ID ");
    Panduan(mysql_num_rows($query));
    while ($row = mysql_fetch_array($query)) {
    $str=$row[$ziduan];
    }
    return $str;  
 
}


 // 新闻信息列表


function newslist($Language,$web_url,$ID,$tag_news,$webnlist) {
 $indexpros="";
 $indexprost="";
 
 if ($ID!==""){// 新闻信息总列表
     
    $sql_p="select * from sc_categories where ID=$ID and category_open=1  ";
    $query_p=mysql_query($sql_p);
    Panduan(mysql_num_rows($query_p));
    while($row=mysql_fetch_array($query_p)){
    $protitle='<div class="sc_mid_c_right_title">'.$row['category_name'].'</div>';
    }

 $sql=mysql_query("select * from sc_info where languageID=$Language and info_lanmu=$ID");    
 }else{
     $protitle='<div class="sc_mid_c_right_title">'.$tag_news.'</div>';
     $lanmuid=checkinfos("About",$Language);
      $sql=mysql_query("select * from sc_info where languageID=$Language and info_lanmu<>$lanmuid");    
 }
 
 $all_num=mysql_num_rows($sql); //总条数
 $page_num=$webnlist; //每页条数
 $page_all_num = ceil($all_num/$page_num); //总页数
 $page=empty($_GET['page'])?1:$_GET['page']; //当前页数
 $page=(int)$page; //安全强制转换
 $limit_st = ($page-1)*$page_num; //起始数

  if ($ID!==""){// 新闻信息总列表
    $sql="select  * from  sc_info where languageID=$Language and info_lanmu=$ID order by ID desc limit $limit_st,$page_num ";
  }else{
      
    $sql="select  * from  sc_info where languageID=$Language and info_lanmu<>$lanmuid order by ID desc limit $limit_st,$page_num ";  
  }
    
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
 
         if (strpos($row['info_image'],"Images/default/")==true){
           $nimg=$row['info_image'];    
         }else{
           $nimg="Images/default/logo.png";  
         }
        $indexpros.="<li><div class='sc_mid_c_right_new_d_1'><a href='".$web_url."info.php?ID=".$row['ID']."'><img src='".$web_url.str_replace("../","",$nimg)."'/></a></div><div class='sc_mid_c_right_new_d_2'><div class='sc_mid_c_right_new_d_3'><a href='".$web_url."info.php?ID=".$row['ID']."'><strong>".$row['info_title']."</strong></a></div><div class='sc_mid_c_right_new_d_3'>".$row['info_des']."</div></div></li>";
        $nimg='';
        }
       $indexprost =$protitle.'<div class="sc_mid_c_right_new"><ul>'.$indexpros.'</ul></div>';
  
       $fy="<div class='sc_mid_c_right_fy'>".show_page($all_num,$page,$page_num)."</div>";
       
    echo $indexprost.$fy;
 }
 
 
 function pnlmcc($Language,$ID,$ziduan){ //产品分类名称及关键词描述调用 
 
    $sql="select * from sc_categories where ID =$ID ";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){   
 
      $str=$row[$ziduan];//去最后一个,号
    } 
    
    return $str;
    
 }
 
 
 
 function nlmcc($Language,$ID){ //信息分类查询
 
    $sql="select * from sc_categories where ID =$ID ";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){   
 
      $str=$row['category_name'];//去最后一个,号
    } 
    return $str;
    
 }
 
 function newsview($ziduan,$ID){ //  新闻信息显示
     
   $query=mysql_query("select * from sc_info where ID =$ID ");
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){ 
        
        $str=htmlspecialchars_decode($row[$ziduan],ENT_QUOTES);
        
    }  
    
    return $str;
    
 }
 
 //  列出搜索产品列表
 
 
 function searchprolist($Language,$tag_inquiry,$web_url,$skeywords,$webplist) {
 $indexpros="";
 $indexprost="";
 $keywordstr="";
     $keywordsc = explode(" ",$skeywords);//分割
    foreach($keywordsc as $keyw){
        
        $keywordstr="products_name like '%".$keyw."%' and ";	
        
    }
 $keywordstr=substr($keywordstr,0,-4);
 $sql=mysql_query("select * from sc_products where languageID=$Language and $keywordstr");     
 $all_num=mysql_num_rows($sql); //总条数
 $page_num=$webplist; //每页条数
 $page_all_num = ceil($all_num/$page_num); //总页数
 $page=empty($_GET['page'])?1:$_GET['page']; //当前页数
 $page=(int)$page; //安全强制转换
 $limit_st = ($page-1)*$page_num; //起始数
  
 
    $sql="select  * from  sc_products where languageID=$Language and products_zt=1 and  $keywordstr order by  products_paixu asc, ID asc limit $limit_st,$page_num ";
    $query=mysql_query($sql);
    Panduan(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        
        $Imgs = explode(",", $row['products_Images']);
        $Imgs = $web_url . str_replace("Images/prdoucts", "Images/prdoucts/small", $Imgs[0]);
        $indexpros.="<div class='pic'><div class='pic-div'><dt class='pic-dt'><a href='".$web_url."view.php?ID=".$row['ID']."'><img src='" . str_replace("../", "", $Imgs) . "' alt='" . $row['products_name'] . "'></a></dt><dd><a href='".$web_url."view.php?ID=".$row['ID']."'>" . $row['products_name'] . "</a></dd><dd><span class='inq'><a href='".$web_url."view.php?ID=".$row['ID']."#buynow'>" . $tag_inquiry . "</a></span></dd></div></div>";
    }
       $indexprost ='<div class="sc_mid_c_right_c">'.$indexpros.'</div>';
  
       $fy="<div class='sc_mid_c_right_fy'>Total products ".$all_num.show_page($all_num,$page,$page_num)."</div>";
       
    echo $indexprost.$fy;
 }
 
 
function Panduan($str){  //判断数据,输出空符

     if ($str<1){
         
            echo '<p><b>Sorry, no related products!</b></p>';
         
         }
    }   