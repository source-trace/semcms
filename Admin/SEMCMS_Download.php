<?php include_once 'SEMCMS_Top_include.php'; ?>
 
    <body class="rgithbd">
        <div class="divtitle"><img src="SC_Page_Config/Image/icons/house.png" align="absmiddle" /> <a href="SEMCMS_Middle.php">后台首页</a> > <a href="SEMCMS_language.php?lgid=<?php echo $_GET['lgid']; ?>">综合管理</a> > 下载资料管理 <span class="srs"><a href="javascript:history.go(-1);"><img src="SC_Page_Config/Image/icons/Return.png" align="absmiddle" /> 返回 </a></span> <span class="srs"><a href="javascript:myrefresh();"><img src="SC_Page_Config/Image/icons/refresh.png" align="absmiddle" /> 刷新 </a></span></div>

<?php 

$type=@htmlspecialchars($_GET["type"]);				
if (!isset($type)){$type=$type;}else{$type=="";}
$page=@htmlspecialchars($_GET["page"]);				
if (!isset($page)){$page=$page;}else{$page=="";}
if ($type=="add"){


?>
<form action="?Class=add&CF=download" name="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>  

          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">添加下载资料</span> </td>
  </tr>
  
   <tr><td width="200" align="center">文件名称<span class="red"> *</span></td><td><input name="down_name" type="text" id="down_name" size="40"   >  </td></tr>
    <tr><td width="200" align="center">上传文件  <span class="red"> *</span></td><td><input name="down_file" type="text" id="down_file" size="60"   > <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/default/&filed=down_file&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span><span class="red">可上传 pdf,xls,rar,zip</span></td></tr>
    <tr><td width="200" align="center">排序 <span class="red"> *</span></td><td> <input name="down_paixu" type="text" id="down_paixu" size="10"  value="10000"   > <span class="red">默认10000,从小到大排序如：1,2,3,4,5....</span></td></tr>
       
   <tr><td width="200" align="center"></td><td>
           <input type="hidden" name="languageID"  value="<?php echo $_GET["lgid"] ?>" >
         
           <input type="submit" value="增加" name="submit" id="submit" onclick="return SubmitImage();" ></td></tr> 
</table>
</form>
<?php
}elseif($type=="edit"){
    
 $row = mysql_fetch_array(mysql_query("SELECT * FROM sc_download WHERE ID=".$_GET["ID"]));
 
             
      

?>

<form action="?Class=edit&CF=download&page=<?php echo $page; ?>" name="form" id="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>  

          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">下载资料编辑</span> </td>
  </tr>
   <tr>
   <tr><td width="200" align="center">文件名称<span class="red"> *</span></td><td><input name="down_name" type="text" id="down_name" size="40" value="<?php echo $row["down_name"] ?>"   >  </td></tr>
    <tr><td width="200" align="center">上传文件  <span class="red"> *</span></td><td><input name="down_file" type="text" id="down_file" size="60" value="<?php echo $row["down_file"] ?>"   ><span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/default/&filed=down_file&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span> <span class="red">可上传 pdf,xls,rar,zip</span></td></tr>
    <tr><td width="200" align="center">排序 <span class="red"> *</span></td><td> <input name="down_paixu" type="text" id="down_paixu" size="10"  value="<?php echo $row["down_paixu"] ?>"  > <span class="red">默认10000,从小到大排序如：1,2,3,4,5....</span></td></tr>
     
   <tr><td width="200" align="center"></td><td>
           <input type="hidden" name="languageID"  value="<?php echo $_GET["lgid"] ?>" >
           <input type="hidden" name="ID"  value="<?php echo $_GET["ID"] ?>" >
           <input type="submit" value="编辑" name="submit" id="submit" onclick="return SubmitImage()" ></td></tr> 
</table>
</form>

<?php
}else{

?>
        <form name="form" id="form" method="post" action="?Class=Deleted&CF=download&page=<?php echo $page; ?>">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="8"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">下载资料管理</span> <span id="uploads" class="sr"><a href="?type=add&lgid=<?php echo $_GET["lgid"] ?>"><img src="SC_Page_Config/Image/icons/add.png" align="absmiddle" />增加下载资料</a></span> </td>
  </tr>
  <tr>
      <td width="5%" align="center"><input type="hidden" name="languageID" id="languageID" value="<?php echo  $_GET['lgid'];?>"><strong>选择</strong></td><td width="5%" align="center"><strong>序号</strong></td> <td><strong>名称</strong></td> <td><strong>文件地址</strong></td> <td><strong>排序</strong></td><td width="12%" align="center"><strong>更新时间</strong> </td><td width="5%" align="center"><strong>操作</strong></td>
      
  </tr>
   <?php 
   //
 $sql=mysql_query("select * from sc_download where languageID=".$_GET["lgid"]."");     
 $all_num=mysql_num_rows($sql); //总条数

 $page_num=10; //每页条数

 $page_all_num = ceil($all_num/$page_num); //总页数

 $page=empty($_GET['page'])?1:$_GET['page']; //当前页数

 $page=(int)$page; //安全强制转换

 $limit_st = ($page-1)*$page_num; //起始数
   
   
   
    $sql="select  * from  sc_download where languageID=".$_GET['lgid']." order by  down_paixu asc, ID asc  limit $limit_st,$page_num ";
    $query=mysql_query($sql);
    Panduans(mysql_num_rows($query));
    $js=1;
    while($row=mysql_fetch_array($query)){
        
 
        
     
 ?>
  <tr><td align="center"><input type="checkbox" name="AID[]" id="AID[]" value="<?php echo $row['ID'];?>" /></td><td align="center"><?php echo $js; ?></td>  <td> <?php echo $row['down_name'] ?> </td><td><?php echo $row['down_file'] ?></td><td><?php echo $row['down_paixu'] ?></td> <td><?php echo $row['down_time'];?> </td><td align="center">  <a href="?type=edit&lgid=<?php echo $_GET['lgid'] ?>&ID=<?php echo $row['ID']; ?>&page=<?php echo $page; ?>"><img src="SC_Page_Config/Image/icons/page_white_edit.png" align="absmiddle" >编辑</a></td></tr>
       
   <?php
   $js=$js+1;
    }
   ?>
  <tr><td colspan="8"><span style="float: left;"><input type="button" id="button" value="选择所有" onclick="checkAll('AID[]')" /> <input type="button" value="清空选中"  id="button" onclick="clearAll('AID[]')" /> <input type="submit"  id="submit" value="删除选中"  onclick="return confirm('确定将此记录删除?')" /></span> <span class="sr2">总共  <?php echo $all_num; ?> 条记录 <?php show_page($all_num,$page,$page_num);   ?></span></td></tr>
  
</table>
</form>

<?php } 
 include_once 'SEMCMS_bot.php'; 
?>
</body>
</html>
