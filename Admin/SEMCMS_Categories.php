<?php include_once 'SEMCMS_Top_include.php'; ?>
 
    <body class="rgithbd">
        <div class="divtitle"><img src="SC_Page_Config/Image/icons/house.png" align="absmiddle" /> <a href="SEMCMS_Middle.php">后台首页</a> > <a href="SEMCMS_language.php?lgid=<?php echo $_GET['lgid']; ?>">综合管理</a> > 产品分类管理 <span class="srs"><a href="javascript:history.go(-1);"><img src="SC_Page_Config/Image/icons/Return.png" align="absmiddle" /> 返回 </a></span> <span class="srs"><a href="javascript:myrefresh();"><img src="SC_Page_Config/Image/icons/refresh.png" align="absmiddle" /> 刷新 </a></span></div>

<?php 

$type=@htmlspecialchars($_GET["type"]);				
if (!isset($type)){$type=$type;}else{$type=="";}

if ($type=="add"){


?>
<form action="?Class=add&CF=category" name="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">产品分类添加</span> </td>
  </tr>
   <tr><td width="200" align="center">分类名称</td><td><input name="category_name" type="text" id="category_name" size="40" onchange="upd('category_name','category_url');" >  <span class="red"> *</span></td></tr>
   <tr><td width="200" align="center">分类关键词（Keywords）</td><td><input name="category_key" type="text" id="category_key" size="60"   > <span class="red"> 词与词之间用英文逗号隔开如a,b,c,d  </span></td></tr>
   <tr><td width="200" align="center">分类描述(Description)</td><td><textarea name="category_des" type="text" id="category_des" style="width:60%;height:100px;" ></textarea><span class="red"> 控制在200个字符之内   </span></td></tr>
   <tr><td width="200" align="center">分类标识图</td><td><input name="category_img" type="text" id="category_img" size="60"  > <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/categories/&filed=category_img&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span> <span class="red">上传标识图</span></td></tr>
   <tr><td width="200" align="center">分类URL(seo)</td><td><input name="category_url" type="text" id="category_url" size="40" >   <span class="red"> 词与词之间用 - 链接！如：a-b-c-d-e  </span></td></tr>
   <tr><td width="200" align="center">分类排序</td><td><input name="category_paixu" type="text" id="category_paixu" size="10"  value="10000"    > <span class="red">默认10000,从小到大排序如：1,2,3,4,5....</span></td></tr>
   <tr><td width="200" align="center">分类详细描述</td><td><textarea name="contents" style="width:95%;height:200px;visibility:hidden;"></textarea> <span class="red"></span></td></tr>
      
   <tr><td width="200" align="center"></td><td>
           <input type="hidden" name="langugageID"  value="<?php echo $_GET["lgid"] ?>" >
           <input type="hidden" name="PID"  value="<?php echo $_GET["pid"] ?>" > 
            <input type="hidden" name=""  value="<?php echo $_GET["pid"] ?>" >  
             <input type="hidden" name="types"  value="<?php echo $_GET["types"] ?>" >   
           <input type="submit" value="增加" name="submit" id="submit" ></td></tr> 
</table>
</form>
<?php
}elseif($type=="edit"){
    
 $row = mysql_fetch_array(mysql_query("SELECT * FROM sc_categories WHERE ID=".$_GET["pid"]))

?>

<form action="?Class=edit&CF=category" name="form" id="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">产品分类修改</span> </td>
  </tr>
  <tr><td width="200" align="center">分类名称</td><td><input name="category_name" type="text" id="category_name" size="40" value="<?php echo $row['category_name']; ?>"    >  <span class="red"> *</span></td></tr>
   <tr><td width="200" align="center">分类关键词（Keywords）</td><td><input name="category_key" type="text" id="category_key" size="60" value="<?php echo $row['category_key']; ?>"   > <span class="red"> 词与词之间用英文逗号隔开如a,b,c,d  </span></td></tr>
   <tr><td width="200" align="center">分类描述(Description)</td><td><textarea name="category_des" type="text" id="category_des" style="width:60%;height:100px;" ><?php echo $row['category_des']; ?> </textarea><span class="red"> 控制在200个字符之内   </span></td></tr>
   <tr><td width="200" align="center">分类标识图</td><td><input name="category_img" type="text" id="category_img" size="60" value="<?php echo $row['category_img']; ?>"  > <span id="uploads"><a href="javascript:;" onclick="javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/categories/&filed=category_img&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')">上传</a></span> <span class="red">上传标识图</span></td></tr>
   <tr><td width="200" align="center">分类URL(seo)</td><td><input name="category_url" type="text" id="category_url" size="40" value="<?php echo $row['category_url']; ?>" >   <span class="red"> 词与词之间用 - 链接！如：a-b-c-d-e  </span></td></tr>
   <tr><td width="200" align="center">分类排序</td><td><input name="category_paixu" type="text" id="category_paixu" size="10"  value="<?php echo $row['category_paixu']; ?>"> <span class="red">默认10000,从小到大排序如：1,2,3,4,5....</span></td></tr>
   <tr><td width="200" align="center">分类详细描述</td><td><textarea name="contents" style="width:95%;height:200px;visibility:hidden;"><?php echo $row['category_dest']; ?></textarea> <span class="red"></span></td></tr>
      
   <tr><td width="200" align="center"></td><td>
 <input type="hidden" name="langugageID"  value="<?php echo $_GET["lgid"] ?>" >
           <input type="hidden" name="PID"  value="<?php echo $_GET["pid"] ?>" >
           <input type="hidden" name="types"  value="<?php echo $_GET["types"] ?>" >    
           <input type="submit" value="修改" name="submit" id="submit" ></td></tr> 
</table>
</form>

<?php
}else{

?>
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
          <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" />  <span class="red">产品分类管理</span>  <span id="uploads" class="sr"><a href="?type=add&pid=<?php echo $_GET["pid"]; ?>&lgid=<?php echo $_GET["lgid"]; ?>&types=p"><img src="SC_Page_Config/Image/icons/add.png" align="absmiddle" />增加一级分类</a></span></td>
  </tr>
   <?php echo get_str('1',$_GET["lgid"],"&types=p");?>
  
</table>


<?php } 
 include_once 'SEMCMS_bot.php'; 
?>
</body>
</html>
