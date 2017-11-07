<?php include_once 'SEMCMS_Top_include.php'; ?>
 
    <body class="rgithbd">
        <div class="divtitle"><img src="SC_Page_Config/Image/icons/house.png" align="absmiddle" /> <a href="SEMCMS_Middle.php">后台首页</a> > <a href="SEMCMS_language.php?lgid=<?php echo $_GET['lgid']; ?>">综合管理</a> > 信息管理 <span class="srs"><a href="javascript:history.go(-1);"><img src="SC_Page_Config/Image/icons/Return.png" align="absmiddle" /> 返回 </a></span> <span class="srs"><a href="javascript:myrefresh();"><img src="SC_Page_Config/Image/icons/refresh.png" align="absmiddle" /> 刷新 </a></span></div>

<?php 

$type=@htmlspecialchars($_GET["type"]);				
if (!isset($type)){$type=$type;}else{$type=="";}
$page=@htmlspecialchars($_GET["page"]);				
if (!isset($page)){$page=$page;}else{$page=="";}
$CatID=@htmlspecialchars($_REQUEST["searchml"]);				
if (!isset($CatID)){$CatID=$CatID;}else{$CatID=="";}
$Searchp=@htmlspecialchars($_REQUEST["search"]);				
if (!isset($Searchp)){$Searchp=$Searchp;}else{$Searchp=="";}

if ($type=="add"){


?>
<form action="?Class=add&CF=info" name="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>  

          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">添加信息</span> </td>
  </tr>
   <tr>

       <td width="200" align="center">信息分类  <span class="red"> *</span></td> <td  width="200"  align="left" valign="top" class='trs'><select name="info_lanmu"   id="info_lanmu"><?php echo infolm($_GET["lgid"],'0'); ?></select></td></tr>
   <tr>  <td width="200" align="center">信息标题  <span class="red"> *</span></td><td><input name="info_title" type="text" id="info_title" size="80"  > </td></tr>
  
   <tr><td width="200" align="center">信息关键词（Keywords）</td><td><input name="info_keywords" type="text" id="info_keywords" size="60"   > <span class="red"> 词与词之间用英文逗号隔开如a,b,c,d  </span></td></tr>
   <tr><td width="200" align="center">信息描述(Description)</td><td><textarea name="info_des" type="text" id="info_des" style="width:90%;height:100px;" > </textarea><span class="red"> 控制在200个字符之内   </span></td></tr>
    <tr><td width="200" align="center">产品URL(seo)</td><td><input name="info_url" type="text" id="info_url" size="40" >   <span class="red"> 词与词之间用 - 链接！如：a-b-c-d-e  </span></td></tr>   
   <tr><td width="200" align="center">详细内容  <span class="red"> *</span></td><td><textarea name="contents" id="contents" style="width:98%;height:500px;visibility:hidden;"> </textarea> <span class="red"></span></td></tr>
 <tr><td width="200" align="center">标识图</td><td><input name="info_image" type="text" id="info_image" size="70"   >  <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/default/&filed=info_image&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span></td></tr>       
   <tr><td width="200" align="center"></td><td>
           <input type="hidden" name="languageID"  value="<?php echo $_GET["lgid"] ?>" >
         
           <input type="submit" value="增加" name="submit" id="submit" onclick="return SubmitInfo();" ></td></tr> 
</table>
</form>
<?php
}elseif($type=="edit"){
    
 $row = mysql_fetch_array(mysql_query("SELECT * FROM sc_info WHERE ID=".$_GET["ID"]));
 
             
      

?>

<form action="?Class=edit&CF=info&page=<?php echo $page; ?>" name="form" id="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>  

          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">信息编辑</span> </td>
  </tr>
   <tr>

       <td width="200" align="center">信息分类  <span class="red"> *</span></td> <td  width="200"  align="left" valign="top" class='trs'><select name="info_lanmu"   id="info_lanmu"><?php echo infolm($_GET["lgid"],$row['info_lanmu']); ?></select></td></tr>
   <tr>  <td width="200" align="center">信息标题  <span class="red"> *</span></td><td><input name="info_title" type="text" id="info_title" size="80" value="<?php echo $row["info_title"] ?>"  > </td></tr>
  
   <tr><td width="200" align="center">信息关键词（Keywords）</td><td><input name="info_keywords" type="text" id="info_keywords" size="60" value="<?php echo $row["info_keywords"] ?>"  > <span class="red"> 词与词之间用英文逗号隔开如a,b,c,d  </span></td></tr>
   <tr><td width="200" align="center">信息描述(Description)</td><td><textarea name="info_des" type="text" id="info_des" style="width:90%;height:100px;" > <?php echo $row["info_des"] ?></textarea><span class="red"> 控制在200个字符之内   </span></td></tr>
    <tr><td width="200" align="center">产品URL(seo)</td><td><input name="info_url" type="text" id="info_url" size="40" value="<?php echo $row["info_url"] ?>"  >   <span class="red"> 词与词之间用 - 链接！如：a-b-c-d-e  </span></td></tr>   
   <tr><td width="200" align="center">详细内容  <span class="red"> *</span></td><td><textarea name="contents" id="contents" style="width:98%;height:500px;visibility:hidden;"> <?php echo $row["info_content"] ?></textarea> <span class="red"></span></td></tr>
   <tr><td width="200" align="center">标识图</td><td><input name="info_image" type="text" id="info_image" size="70" value="<?php echo $row['info_image'];?>"  >  <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/default/&filed=info_image&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span></td></tr>  
   <tr><td width="200" align="center"></td><td>
           <input type="hidden" name="languageID"  value="<?php echo $_GET["lgid"] ?>" >
           <input type="hidden" name="ID"  value="<?php echo $_GET["ID"] ?>" >
           <input type="submit" value="编辑" name="submit" id="submit" onclick="return SubmitInfo()" ></td></tr> 
</table>
</form>

<?php
}else{

?>
        
        
     <table width="98%" class="table" cellpadding="0" cellspacing="0">
       <tr>
          <td colspan="8"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">信息搜索</span>   </td>
  </tr>
  <tr><td colspan="8" align="center"> <form name="form" method="post" action="?lgid=<?php echo $_GET["lgid"];?>"><select name="searchml" id="searchml" style="height: 26px;"><option value="">请选择</option><?php echo get_strp('2',$_GET["lgid"],$CatID); ?></select> <input type="text" value="<?php echo $Searchp; ?>"   name="search" size="60"> <input type="submit" id="submit" value="搜索"></form> </td><tr>
 </table>
           
        <form name="form" id="form" method="post" action="?Class=Deleted&CF=info&page=<?php echo $page; ?>">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="8"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">信息管理</span> <span id="uploads" class="sr"><a href="?type=add&lgid=<?php echo $_GET["lgid"] ?>"><img src="SC_Page_Config/Image/icons/add.png" align="absmiddle" />增加信息</a></span> </td>
  </tr>
 
  <tr>
      <td width="5%" align="center"><input type="hidden" name="languageID" id="languageID" value="<?php echo  $_GET['lgid'];?>"><strong>选择</strong></td><td width="5%" align="center"><strong>序号</strong></td> <td><strong>信息标题</strong></td> <td width="12%" align="center"><strong>更新时间</strong> </td><td width="5%" align="center"><strong>操作</strong></td>
      
  </tr>
   <?php 
   //
   
 
   if ($CatID!="" && $Searchp!=""){
 
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." and info_title like '%".$Searchp."%' and info_lanmu=$CatID");     
   }elseif($CatID!="" && $Searchp==""){
 
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." and info_lanmu=$CatID"); 
   }elseif($CatID=="" && $Searchp!=""){
     
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." and info_title like '%".$Searchp."%'");       
   }else{
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]."");       
   }
 
 $all_num=mysql_num_rows($sql); //总条数

 $page_num=10; //每页条数

 $page_all_num = ceil($all_num/$page_num); //总页数

 $page=empty($_GET['page'])?1:$_GET['page']; //当前页数

 $page=(int)$page; //安全强制转换

 $limit_st = ($page-1)*$page_num; //起始数
   
 
 
   if ($CatID!="" && $Searchp!=""){
 
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." and info_title like '%".$Searchp."%' and info_lanmu=$CatID order by ID desc limit $limit_st,$page_num");     
   }elseif($CatID!="" && $Searchp==""){
 
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." and info_lanmu=$CatID order by ID desc  limit $limit_st,$page_num"); 
   }elseif($CatID=="" && $Searchp!=""){
     
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." and info_title like '%".$Searchp."%' order by ID desc  limit $limit_st,$page_num");       
   }else{
     $sql=mysql_query("select * from sc_info where languageID=".$_GET["lgid"]." order by ID desc  limit $limit_st,$page_num");       
   }    
    
    $query=$sql;
    Panduans(mysql_num_rows($query));
    $js=1;
    while($row=mysql_fetch_array($query)){
        
 
        
     
 ?>
  <tr><td align="center"><input type="checkbox" name="AID[]" id="AID[]" value="<?php echo $row['ID'];?>" /></td><td align="center"><?php echo $js; ?></td>  <td><?php echo $row['info_title'] ?></td> <td><?php echo $row['info_time'];?> </td><td align="center">  <a href="?type=edit&lgid=<?php echo $_GET['lgid'] ?>&ID=<?php echo $row['ID']; ?>&page=<?php echo $page; ?>"><img src="SC_Page_Config/Image/icons/page_white_edit.png" align="absmiddle" >编辑</a></td></tr>
       
   <?php
   $js=$js+1;
    }
   ?>
  <tr><td colspan="8"><span style="float: left;"><input type="button" id="button" value="选择所有" onclick="checkAll('AID[]')" /> <input type="button" value="清空选中"  id="button" onclick="clearAll('AID[]')" /> <input type="submit"  id="submit" value="删除选中"  onclick="return confirm('确定将此记录删除?')" /></span> <span class="sr2">总共  <?php echo $all_num; ?> 条记录 <?php pshow_page($all_num,$page,$page_num,$Searchp,$CatID);   ?></span></td></tr>
  
</table>
</form>

<?php } 
 include_once 'SEMCMS_bot.php'; 
?>
</body>
</html>
