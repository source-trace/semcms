<?php include_once 'SEMCMS_Top_include.php'; ?>
    <body class="rgithbd">
<div class="divtitle"><img src="SC_Page_Config/Image/icons/house.png" align="absmiddle" /> <a href="SEMCMS_Middle.php">后台首页</a> > 语言设置</div>

<?php 

$type=@htmlspecialchars($_GET["type"]);	
$lgids=@htmlspecialchars($_GET["lgid"]);	
if (!isset($type)){$type=$type;}else{$type=="";}
if (!isset($lgids)){$lgids=$lgids;}else{$lgids=="";}

if ($type=="add"){


?>
<form action="?Language=add" name="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">语种添加</span> </td>
  </tr>
   <tr><td width="200" align="center">语言中文名称</td><td><input name="language_cname" type="text" id="language_cname"   >  <span class="red">如：中文,英语</span></td></tr>
   <tr><td width="200" align="center">语言英文名称</td><td><input name="language_ename" type="text" id="language_ename"  > <span class="red">如：China,English</span></td></tr>
   <tr><td width="200" align="center">语言路径</td><td><input name="language_url" type="text" id="language_url"   > <span class="red">如：cn,en,用国家的简称</span></td></tr>
   <tr><td width="200" align="center">排序</td><td><input name="language_paixu" type="text" id="language_paixu" value="10000"  >   <span class="red">默认10000,从小到大排序如：1,2,3,4,5....</span></td></tr>
   <tr><td width="200" align="center">是否设为根目录</td><td><input name="language_mulu" type="text" id="language_mulu" value="0"   > <span class="red">只能写1和0才能起作用,1表示根目录,0表示二级目录</span></td></tr>
   <tr><td width="200" align="center">语言标识图</td><td><input name="language_Image" type="text" id="language_Image" size="60"  > <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/default/&filed=language_Image&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span> <span class="red">上传国家标识图</span></td></tr>
   <tr><td width="200" align="center"></td><td><input type="submit" value="增加" name="submit" id="submit" ></td></tr> 
</table>
</form>
<?php
}elseif($type=="edit"){
    
 $row = mysql_fetch_array(mysql_query("SELECT * FROM sc_language WHERE ID=".$_GET["ID"]))

?>

<form action="?Language=edit" name="form" id="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">语种修改</span> </td>
  </tr>
  <tr><td width="200" align="center">语言中文名称</td><td><input name="language_cname" type="text" id="language_cname" value="<?php echo $row['language_cname']; ?>"   >  <span class="red">*如：中文,英语</span></td></tr>
   <tr><td width="200" align="center">语言英文名称</td><td><input name="language_ename" type="text" id="language_ename" value="<?php echo $row['language_ename']; ?>"   > <span class="red">*如：China,English</span></td></tr>
   <tr><td width="200" align="center">语言路径</td><td><input name="language_url" type="text" id="language_url" value="<?php echo $row['language_url']; ?>"  > <span class="red">*如：cn,en,用国家的简称</span></td></tr>
   <tr><td width="200" align="center">排序</td><td><input name="language_paixu" type="text" id="language_paixu" value="<?php echo $row['language_paixu']; ?>">   <span class="red">*默认10000,从小到大排序如：1,2,3,4,5....</span></td></tr>
   <tr><td width="200" align="center">是否设为根目录</td><td><input name="language_mulu" type="text" id="language_mulu"   value="<?php echo $row['language_mulu']; ?>"   > <span class="red">*只能写1和0才能起作用,1表示根目录,0表示二级目录</span></td></tr>
   <tr><td width="200" align="center">语言标识图</td><td><input name="language_Image" type="text" id="language_Image" value="<?php echo $row['language_Image']; ?>" size="60"   >  <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/default/&filed=language_Image&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span> <span class="red">*上传国家标识图</span></td></tr>
   <tr><td width="200" align="center"></td><td><input type="hidden" name="ID" value="<?php echo $_GET["ID"];?>"> <input type="submit" value="编辑" name="submit" id="submit" ></td></tr> 
</table>
</form>

<?php
}else{

?>
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">语种管理</span>   </td>
  </tr>
   <?php 
   if ($lgids==""){
  // language();
       
  // echo languageqx($lgids=1,$_COOKIE["scuserqx"]);  
   }else{
   echo languageqx($lgids,$_COOKIE["scuserqx"]);  
       
  }
   
   ?>
  
</table>



<?php
}

mysql_close($con);?>
</body>
</html>
