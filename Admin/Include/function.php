<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
function checkuser(){ //判断账号 
    $cookieuser=@htmlspecialchars($_COOKIE["scuser"]);
    $cookieuserqx=@htmlspecialchars($_COOKIE["scuserqx"]);
    $sql="select * from sc_user where user_ps='$cookieuser' and user_qx='$cookieuserqx'"; 
    $result=mysql_query($sql); 
    $row = mysql_fetch_array($result,MYSQL_ASSOC); 
    if (!mysql_num_rows($result)){ echo "<script language='javascript'>alert('账号密码不正确重新登陆！');top.location.href='index.html';</script>";} 
    else {echo'';}     
  
}


function Panduans($str){  //判断数据,输出空符

     if ($str<1){
         
            echo '<tr><td colspan="10">没有相关信息！</td></tr>';
         
         }
    }     



  function language(){  //汇总语言    
      
    $sql="select * from sc_language order by language_paixu,ID asc";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
    // echo $row[$strs];
       if ($row["language_open"]=="1"){
           $openstr=" <a href='?Language=open&ID=".$row['ID']."&flag=0'><img src='SC_Page_Config/Image/icons/open.png' align='absmiddle'>关闭</a>";           
       }else{
           $openstr=" <a href='?Language=open&ID=".$row['ID']."&flag=1'><img src='SC_Page_Config/Image/icons/close.png' align='absmiddle'>开启</a>";   
           }
     echo  '<tr><td width="300" align="left"><strong>'.$row["language_cname"].'</strong> <a href="?type=edit&ID='.$row['ID'].'"><img src="SC_Page_Config/Image/icons/page_white_edit.png" align="absmiddle" />[编辑]</a> <a href="?Language=delete&ID='.$row['ID'].'" onClick="return delcfm();"><img src="SC_Page_Config/Image/icons/cross.png" align="absmiddle" />[删除]</a>'.$openstr.'</td>'
             . '<td><a href="SEMCMS_Categories.php?pid=1&lgid='.$row['ID'].'">产品分类管理</a>'
             . ' <a href="SEMCMS_Products.php?lgid='.$row['ID'].'">产品管理</a> '
             . ' <a href="SEMCMS_Infocategories.php?pid=2&lgid='.$row['ID'].'">信息分类管理</a>'
             . ' <a href="SEMCMS_Info.php?lgid='.$row['ID'].'">信息管理</a>'
             . ' <a href="SEMCMS_Banner.php?lgid='.$row['ID'].'">Banner管理</a>'
             . ' <a href="SEMCMS_Link.php?lgid='.$row['ID'].'">友链管理</a>'
             . ' <a href="SEMCMS_SeoAndTag.php?lgid='.$row['ID'].'">SEO与标签</a>'
             . ' <a href="SEMCMS_Menu.php?lgid='.$row['ID'].'">导航管理</a>' 
             . ' <a href="SEMCMS_Quanxian.php?pid=3&lgid='.$row['ID'].'">权限管理</a>'  
              . ' </td></tr>';
     } 
      
  }
  

  function languageqx($cstr,$cooks){  //汇总语言权限
      
    $sql="select * from sc_language where ID=$cstr ";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
    // echo $row[$strs];
       if ($row["language_open"]=="1"){
           $openstr=" <a href='?Language=open&ID=".$row['ID']."&flag=0'><img src='SC_Page_Config/Image/icons/open.png' align='absmiddle'>关闭</a>";           
       }else{
           $openstr=" <a href='?Language=open&ID=".$row['ID']."&flag=1'><img src='SC_Page_Config/Image/icons/close.png' align='absmiddle'>开启</a>";   
           }
   //  echo  '<tr><td width="300" align="left"><strong>'.$row["language_cname"].'</strong> <a href="?type=edit&ID='.$row['ID'].'"><img src="SC_Page_Config/Image/icons/page_white_edit.png" align="absmiddle" />[编辑]</a> <a href="?Language=delete&ID='.$row['ID'].'" onClick="return delcfm();"><img src="SC_Page_Config/Image/icons/cross.png" align="absmiddle" />[删除]</a>'.$openstr.'</td>'
            // . '<td>'.twofenlei($cooks,75).'</td></tr>';
     
          echo  '<tr><td width="100" align="left"><strong>'.$row["language_cname"].'</strong>  </td>'
             . '<td>'.twofenlei($cooks,75).'</td></tr>';
     } 
      
  }  
  
  
  
  function test_input($data) { //表单验证
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data,ENT_QUOTES);
  return $data;
}


function get_str($id,$lgid,$types) { //无限给分类
    global $str; 
    $sql = "select * from sc_categories where category_pid= $id and languageID=$lgid order by category_paixu,ID asc ";
    $result = mysql_query($sql);//查询pid的子类的分类 
    if($result && mysql_affected_rows()){//如果有子类 
       // $str .= '<tr>'; 
        while ($row = mysql_fetch_array($result)) { //循环记录集 
            
         $js="<img src='SC_Page_Config/Image/emptys.gif' align='absmiddle'>";
         $retArr =explode(',',$row['category_path']);
         $countd=count($retArr)-3;
         $kg="";
          for($i=0;$i<$countd;$i++) {
              $kg=$kg."<img src='SC_Page_Config/Image/empty.gif' align='absmiddle'>";
              
          } 
    if ($row["category_open"]=="1"){
           $openstr="<a href='?Class=open&CF=category&pid=".$row['ID']."&flag=0&lgid=".$lgid.$types."'><img src='SC_Page_Config/Image/icons/open.png' align='absmiddle'>关闭</a>";           
       }else{
           $openstr="<a href='?Class=open&CF=category&pid=".$row['ID']."&flag=1&lgid=".$lgid.$types."'><img src='SC_Page_Config/Image/icons/close.png' align='absmiddle'>开启</a>";   
           }
           if ($id==2){
               $str .= "<tr><td colspan='2'>".$kg.$js." ".$row['category_name'] . " </td><td colspan='2'>   <a href='?type=edit&pid=".$row['ID']."&lgid=".$lgid.$types."'><img src='SC_Page_Config/Image/icons/page_white_edit.png' align='absmiddle'>编辑</a> ".$openstr." <a href='?Class=delete&CF=category&pid=".$row['ID']."&lgid=".$lgid.$types."' onClick='return delcfm();'><img src='SC_Page_Config/Image/icons/cross.png' align='absmiddle'>删除</a> </td></tr>"; //构建字符串 
           }else{
            $str .= "<tr><td colspan='2'>".$kg.$js." ".$row['category_name'] . " </td><td colspan='2'>   <a href='SEMCMS_Categories.php?type=add&pid=".$row['ID']."&lgid=".$lgid.$types."'><img src='SC_Page_Config/Image/icons/application_add.png' align='absmiddle'>增加下一级</a> <a href='?type=edit&pid=".$row['ID']."&lgid=".$lgid.$types."'><img src='SC_Page_Config/Image/icons/page_white_edit.png' align='absmiddle'>编辑</a> ".$openstr." <a href='?Class=delete&CF=category&pid=".$row['ID']."&lgid=".$lgid.$types."' onClick='return delcfm();'><img src='SC_Page_Config/Image/icons/cross.png' align='absmiddle'>删除</a> </td></tr>"; //构建字符串 
            }
            $kg="";
            $js="";
            get_str($row['ID'],$lgid,$types); //调用get_str()，将记录集中的id参数传入函数中，继续查询下级 

        } 
       // $strs = '<tr>'.$strs.'</tr>'; 
    } 
    if($str==""){
        $str="<tr><td colospan='3'>暂无分类！</td></tr>";
    }else{$str=$str;}
    return $str; 
} 

function infolm($lgid,$flag){ //信息分类
    $sql="select * from sc_categories where languageID=".$lgid." and category_pid=2";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
                      
              if ($flag==$row['ID']){
              
                  $xuanzes='selected="selected"';
                  
              }else{$xuanzes='';}
              
        echo "<option value=".$row['ID']." $xuanzes >".$row['category_name']."</option>";
        
    }
    
    
}


function get_strp($id,$lgid,$flag) { //无限分类产品列表
    global $strs;
    
    $sql = "select * from sc_categories where category_pid=$id and languageID=$lgid ";
    $result = mysql_query($sql);//查询pid的子类的分类 
    if($result && mysql_affected_rows()){//如果有子类 
       // $str .= '<tr>'; 
        while ($row = mysql_fetch_array($result)) { //循环记录集 
            
        $xuanze='';
         $retArr =explode(',',$row['category_path']);
         $countd=count($retArr)-4;
         $kg="";
         $js="&nbsp;";
          for($i=0;$i<$countd;$i++) {
              $kg=$kg."-";
          if ($i==0){
             $js="&nbsp;&nbsp;|";
           }else{  $js=$js."";}    
          } 

          if ($flag!=="0"){
              
                          
              $flid= explode(",", $flag);
              
             foreach ($flid as $value){
                 
                 if ($row['ID']==$value){
                   $xuanze='selected="selected"';   
                 } 
                 
             }
              
              
 //             if (strpos($flag,$row['ID'])!==false){
              
  //                $xuanze='selected="selected"';
                  
 //             }else{$xuanze='';}
              
          }
          
           $strs .= "<option value=".$row['ID']." $xuanze>".$js.$kg."".$row['category_name'] ."&nbsp;&nbsp;</option>";
            get_strp($row['ID'],$lgid,$flag); //调用get_str()，将记录集中的id参数传入函数中，继续查询下级 

        } 
       // $strs = '<tr>'.$strs.'</tr>'; 
    } 
    if($strs==""){
        $strs="<option value=''>暂无分类</option>";
    }else{$strs=$strs;}
    return $strs; 
} 

function checkstr($biao,$ziduan,$str){ //查询数据是否存在
    
    $sql="select * from $biao where $ziduan='$str'"; 
    $result=mysql_query($sql); 
    $row = mysql_fetch_array($result,MYSQL_ASSOC); 
 
    if (mysql_num_rows($result)>0) 
        { 
 
            return true;
        } 
    else 
        {     
          return false;   

        }  

}
 
 
function checkinfo($biao,$ziduan,$str,$fl,$id){ //查询数据信息
    
    if ($fl=="f") {
 
    $sql="select * from $biao where $ziduan=$str"; 
    }else{
       $sql="select * from $biao where $ziduan='$str'";    
        
    }
    $result=mysql_query($sql); 
 
    $row = mysql_fetch_array($result,MYSQL_ASSOC); 
 
    if (!mysql_num_rows($result)) 
        { 
         
  echo "<script language='javascript'>alert('数据不存在!');history.go(-1);</script>";
        
        } 
    else 
        {     
          
            
        $strs=$row[$id];
        return $strs;
        }     
    
}

//操作提示信息

function actioninfo($str){
    
    if ($str=="001"){
        
        $str=" <img src='SC_Page_Config/Image/icons/tick.png' align='absmiddle'> 恭喜！操作成功！";
        
    }elseif ($str=="002") {
        
         $str=" <img src='SC_Page_Config/Image/icons/cross.png' align='absmiddle'> Sorry！有相同存在！";
        
    } elseif($str=="003"){
        
        $str=" <img src='SC_Page_Config/Image/icons/cross.png' align='absmiddle'> Sorry！带星号的必填！";
        
    } elseif($str=="004"){
        
        $str=" <img src='SC_Page_Config/Image/icons/cross.png' align='absmiddle'> Sorry！请选择要删除的内容！";
    } elseif($str=="005"){
        
        $str=" <img src='SC_Page_Config/Image/icons/cross.png' align='absmiddle'> Sorry！请选择要分配的内容！";
    }
  
  return $str;  
}


//获取IP
 
 function getIP()
{
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
 
 
    return $realip;
}
 


//使用如下类就可以生成图片缩略图,
class resizeimage
{
    //图片类型
    var $type;
    //实际宽度
    var $width;
    //实际高度
    var $height;
    //改变后的宽度
    var $resize_width;
    //改变后的高度
    var $resize_height;
    //是否裁图
    var $cut;
    //源图象
    var $srcimg;
    //目标图象地址
    var $dstimg;
    //临时创建的图象
    var $im;
 
    function resizeimage($img, $wid, $hei,$c,$dstpath)
    {
        $this->srcimg = $img;
        $this->resize_width = $wid;
        $this->resize_height = $hei;
        $this->cut = $c;
        //图片的类型
    
$this->type = strtolower(substr(strrchr($this->srcimg,"."),1));
 
        //初始化图象
        $this->initi_img();
        //目标图象地址
        $this -> dst_img($dstpath);
        //--
        $this->width = imagesx($this->im);
        $this->height = imagesy($this->im);
        //生成图象
        $this->newimg();
        ImageDestroy ($this->im);
    }
    function newimg()
    {
        //改变后的图象的比例
        $resize_ratio = ($this->resize_width)/($this->resize_height);
        //实际图象的比例
        $ratio = ($this->width)/($this->height);
        if(($this->cut)=="1")
        //裁图
        {
            if($ratio>=$resize_ratio)
            //高度优先
            {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width,$this->resize_height, (($this->height)*$resize_ratio), $this->height);
                ImageJpeg ($newimg,$this->dstimg);
            }
            if($ratio<$resize_ratio)
            //宽度优先
            {
                $newimg = imagecreatetruecolor($this->resize_width,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, $this->resize_height, $this->width, (($this->width)/$resize_ratio));
                ImageJpeg ($newimg,$this->dstimg);
            }
        }
        else
        //不裁图
        {
            if($ratio>=$resize_ratio)
            {
                $newimg = imagecreatetruecolor($this->resize_width,($this->resize_width)/$ratio);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, $this->resize_width, ($this->resize_width)/$ratio, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg);
            }
            if($ratio<$resize_ratio)
            {
                $newimg = imagecreatetruecolor(($this->resize_height)*$ratio,$this->resize_height);
                imagecopyresampled($newimg, $this->im, 0, 0, 0, 0, ($this->resize_height)*$ratio, $this->resize_height, $this->width, $this->height);
                ImageJpeg ($newimg,$this->dstimg);
            }
        }
    }
    //初始化图象
    function initi_img()
    {
        if($this->type=="jpg")
        {
            $this->im = imagecreatefromjpeg($this->srcimg);
        }
        if($this->type=="gif")
        {
            $this->im = imagecreatefromgif($this->srcimg);
        }
        if($this->type=="png")
        {
            $this->im = imagecreatefrompng($this->srcimg);
        }
    }
    //图象目标地址
    function dst_img($dstpath)
    {
        $full_length  = strlen($this->srcimg);
 
        $type_length  = strlen($this->type);
        $name_length  = $full_length-$type_length;
 
 
        $name         = substr($this->srcimg,0,$name_length-1);
        $this->dstimg = $dstpath;
 
 
//echo $this->dstimg;
    }
}

 //分页函数----



function show_page($count,$page,$page_size)
{
    $page_count  = ceil($count/$page_size);  //计算得出总页�?
 
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
            $navs.="<a href=\"".$url."page=".($page-1)."\">前一页</a>"; //上一 
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
            $navs.=" <a href=\"".$url."page=".($page+1)."\">下一页</a> ";//下一�?
           // $navs.="<a href=\"".$url."page=".$pages."\">末页</a>";    //�?后一�?
        } else {
            $navs .= "";
           // $navs .= "<span class='disabled'>末页</span>";
        }
        echo "$navs";
   }
}



 //产品分页函数----



function pshow_page($count,$page,$page_size,$Searchp,$flID)
{
    $page_count  = ceil($count/$page_size);  //计算得出总页�?
 
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
    $url=  str_replace("&err=001", "", $url);
    //分页功能代码
    $page_len = ($page_len%2)?$page_len:$page_len+1;  //页码个数
    $pageoffset = ($page_len-1)/2;  //页码个数左右偏移 
 
    $navs='';
    if($pages != 0){
        if($page!=1){
            //$navs.="<a href=\"".$url."page=1\">首页</a> ";        //第一� 
            $navs.="<a href=\"".$url."page=".($page-1)."&searchml=".$flID."&search=".$Searchp."\">前一页</a>"; //上一 
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
            else {$navs.=" <a href=\"".$url."page=".$i."&searchml=".$flID."&search=".$Searchp."\">".$i."</a>";}
        }
        if($page!=$pages)
        {
            $navs.=" <a href=\"".$url."page=".($page+1)."&searchml=".$flID."&search=".$Searchp."\">下一页</a> ";//下一�?
           // $navs.="<a href=\"".$url."page=".$pages."\">末页</a>";    //�?后一�?
        } else {
            $navs .= "";
           // $navs .= "<span class='disabled'>末页</span>";
        }
        echo "$navs";
   }
}

 
//权限调用


function onefenlei($cstr){ // 后台权限栏目
    
    
    
    $sql="select * from sc_categories where  category_pid=3 and category_name<>'信息操作'";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    echo '<dl>';
    while($row=mysql_fetch_array($query)){
        if (strpos($cstr,$row['ID'])!==false){   
        echo '<dt class="back_left_top"><img src="SC_Page_Config/Image/left.jpg" align="absmiddle" /><a href="javascript;">'.$row['category_name'].'</a></dt>' ;
        }else{
           echo''; 
        }
        echo '<dd><ul>';
        echo twofenlei($cstr,$row['ID']);
        
        }
        echo '</ul></dd></dl>';

}


function twofenlei($cstr,$pid){ // 后台权限栏目
$qx75="";
    $sql="select * from sc_categories where  category_pid=$pid order by  category_paixu asc,ID asc";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        if ($pid==75){
            if (strpos($cstr,$row['ID'])!==false){ 
            $qx75.=' <a href="'.$row['category_url'].$_GET['lgid'].'" target="mainFrame" >'.$row['category_name'].'</a> ' ;  
            }  else {
              echo'';  
            }
        }else{
         if (strpos($cstr,$row['ID'])!==false){   
        echo '<li><img src="SC_Page_Config/Image/left2.jpg" align="absmiddle" /> <a href="'.$row['category_url'].'" target="mainFrame" >'.$row['category_name'].'</a></li>' ;
         }else
             {echo'';}
        
        }
        
    }
 return $qx75 ;
}

function languagefenlei($cstr){ // 语种权限
    
    $sql="select * from sc_language";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        
      if (strpos($cstr,$row['language_url'])!==false){
          echo '<li><img src="SC_Page_Config/Image/left2.jpg" align="absmiddle" /> <a href="SEMCMS_language.php?lgid='.$row['ID'].'" target="mainFrame" >'.$row['language_cname'].'</a></li>' ; 
        }else{
          echo''; 
        }
  
    }   
  
}


//权限分配

function fonefenlei($cstr){ // 后台权限栏目
    
    
    
    $sql="select * from sc_categories where  category_pid=3";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    
    while($row=mysql_fetch_array($query)){
        if (strpos($cstr,$row['ID'])!==false){
        $che=' checked="checked"';    
        }else{
         $che="";   
        }
        
        echo '<ul>';
        echo '<li><input type="checkbox" name="ID[]" id="ID[]" value="'.$row['ID'].'" '.$che.'  /><b>'.$row['category_name'].'</b></li>' ;
        echo ftwofenlei($row['ID'],$cstr);
        echo '</ul>';
        }
        

}


function ftwofenlei($pid,$cstr){ // 后台权限栏目
 
    $sql="select * from sc_categories where  category_pid=$pid";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){

         if (strpos($cstr,$row['ID'])!==false){
        $che=' checked="checked"';    
        }else{
         $che="";   
        }
        
        echo '<li><input type="checkbox" name="ID[]" id="ID[]" value="'.$row['ID'].'" '.$che.'  />'.$row['category_name'].'</li>' ;
     
        
    }

}

function flanguagefenlei($cstr){ // 语种权限
    

     $sql="select * from sc_language";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        if (strpos($cstr,$row['language_url'])!==false){
        $che=' checked="checked"';    
        }else{
         $che="";   
        }
        
        echo '<li><input type="checkbox" name="ID[]" id="ID[]" value="'.$row['language_url'].'"  '.$che.'  />'.$row['language_cname'].'</li>' ;
        
    }   
  
}

function allproducts($Language){
    $indexpros="";
    $queryx = mysql_query("select * from  sc_products where languageID=$Language and products_zt=1  order by ID desc ");
    Panduans(mysql_num_rows($queryx));

    while ($row = mysql_fetch_array($queryx)) {

        $Imgs = explode(",", $row['products_Images']);
        $Imgs = str_replace("Images/prdoucts", "Images/prdoucts/small", $Imgs[0]);
    
            $indexpros.="<tr><td><img src='" . str_replace("../", "../", $Imgs) . "' alt='" . $row['products_name'] . "' width='50'></a></td><td>" . $row['products_name'] . "</td><td><input type='checkbox' name='AID[]' id='AID[]' value='".$row['ID']."' /></td></tr>";
  
    }
    return $indexpros;  
    
}

function TemplateDir($dir,$webTemplate){   //列出模版
  $x=0;
  $directory=scandir($dir);
  for($i=0;$i<sizeof($directory);$i++){
  
      if (is_dir($dir.$directory[$i]."/")&& $directory[$i]!="." && $directory[$i]!=".."){
          
          if ($webTemplate==$directory[$i]){ //判断当前模版
              
              $current_mb='<img src="SC_Page_Config/Image/icons/tick.png" align="absmiddle" />';
          }else{
              
              $current_mb='<img src="SC_Page_Config/Image/icons/cross.png" align="absmiddle" />' ;
           }
	 
      echo "<tr><td>".$x=$x+1 ."</td><td>".$directory[$i]."</td><td>".$current_mb."</td><td><a href='?CF=template&mb=".$directory[$i]."'>应用</a></td></tr>";
           
           
	  };
  }
          
}

//筛选调用产品分类ID

function prolmid($ID){
    $str="";
    $strs="";
    $sql="select * from sc_categories where category_path like '%,".$ID.",%'  and category_open=1";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    while($row=mysql_fetch_array($query)){
        
      $str.= "products_category like '%,".$row['ID'].",%' or ";
    } 
    $strs ="(".$str."products_category like '%,".$ID.",%')";
    return $strs;
}

// 文件名替换方法

function Streplace($str){
    $str=trim($str);
    $str=str_replace(" ","-",$str);
    $str=str_replace("*","-",$str);
    $str=str_replace("?","-",$str);
    $str=str_replace("<","-",$str);
    $str=str_replace(">","-",$str);
    $str=str_replace("|","-",$str);
    $str=str_replace("/","-",$str);
    $str=str_replace("&","-",$str);
    $str=str_replace("'","",$str);
    return $str;
    
}


function xmltogoogle($Language,$web_url){// 生成 google xml 
   $nav_xml="";$cate_xml="";$pro_xml="";$new_xml="";
    //取导航链接
    $hchx=chr(13).chr(10);
    $sql="select * from sc_menu where languageID=$Language order by  menu_paixu asc,ID asc";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
        if (strlen($row['menu_link'])<2){
        $linkurl=str_replace("/", "", $row['menu_link']);
        }else{
        $linkurl=$row['menu_link'];       
        }
       $nav_xml.="<url>".$hchx;
       $nav_xml.='<loc>'.$web_url.$linkurl.'</loc>'.$hchx;
       $nav_xml.='<changefreq>always</changefreq>'.$hchx;
       $nav_xml.='<priority>1.0</priority>'.$hchx;
       $nav_xml.="</url>".$hchx;
 
     }
     
  //取产品分类链接
     
    $sql="select * from sc_categories where languageID=$Language  and category_pid=1 order by ID asc";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
         
        $linkurl="product.php?ID=".$row['ID'];
 
       $cate_xml.="<url>".$hchx;
       $cate_xml.='<loc>'.$web_url.$linkurl.'</loc>'.$hchx;
       $cate_xml.='<changefreq>always</changefreq>'.$hchx;
       $cate_xml.='<priority>1.0</priority>'.$hchx;
       $cate_xml.="</url>".$hchx;
 
     }
     
   //取产品链接
     
   $sql="select * from sc_products where languageID=$Language order by ID asc";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
   
        $linkurl="view.php?ID=".$row['ID'];
 
       $pro_xml.="<url>".$hchx;
       $pro_xml.='<loc>'.$web_url.$linkurl.'</loc>'.$hchx;
       $pro_xml.='<changefreq>always</changefreq>'.$hchx;
       $pro_xml.='<priority>1.0</priority>'.$hchx;
       $pro_xml.="</url>".$hchx;
 
     }
     
 //取新闻信息链接
     
    $sql="select * from sc_info where languageID=$Language order by ID asc";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
        $linkurl="info.php?ID=".$row['ID'];
       $new_xml.="<url>".$hchx;
       $new_xml.='<loc>'.$web_url.$linkurl.'</loc>'.$hchx;
       $new_xml.='<changefreq>always</changefreq>'.$hchx;
       $new_xml.='<priority>0.8</priority>'.$hchx;
       $new_xml.="</url>".$hchx;
 
     } 
     
   
 
     $item=$nav_xml.$cate_xml.$pro_xml.$new_xml;
     
    return $item;
}


//检测权限

function checkqx($dirname){
$fd=@opendir($dirname);
if($fd===false){
echo $dirname."文件存在:不可读,不可写<br />" ;
}else{
if(is_writable($dirname)){
echo $dirname."   文件可读可写<br />" ;
}else{
echo $dirname."     文件可读,不可写<br />" ;
}
}
}




?>


