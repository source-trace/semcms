<?php include_once 'SEMCMS_Top_include.php'; ?>
 
    <body class="rgithbd">
<div class="divtitle"><img src="SC_Page_Config/Image/icons/house.png" align="absmiddle" /> <a href="SEMCMS_Middle.php">后台首页</a> > SEO与文字标签设置 <span class="srs"><a href="javascript:history.go(-1);"><img src="SC_Page_Config/Image/icons/Return.png" align="absmiddle" /> 返回 </a></span> <span class="srs"><a href="javascript:myrefresh();"><img src="SC_Page_Config/Image/icons/refresh.png" align="absmiddle" /> 刷新 </a></span></div>

        <?php
 
        $row = mysql_fetch_array(mysql_query("SELECT * FROM sc_tagandseo WHERE languageID=".$_GET['lgid']))
     
      ?>
<form action="?Class=edit&CF=SeoAndTag" name="form" method="post">
<table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
    <td colspan="4"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" /> SEO设置 </td>
  </tr>
   <tr><td width="200" align="center">首页关键词(keywords)</td><td><input name="tag_indexkey" type="text" id="tag_indexkey" value="<?php echo $row['tag_indexkey'];?>" size="70" > <span class="red"> 词与词之间用逗号隔开 </span></td></tr>
   <tr><td width="200" align="center">首页描述（description） </td><td><textarea name="tag_indexdes" type="text" id="tag_indexdes" cols="70" rows="5"><?php echo $row['tag_indexdes'];?></textarea> <span class="red"> 控制在200字符之内 </span></td></tr>
   <tr><td width="200" align="center">产品列表页关键词(keywords)</td><td><input name="tag_prokey" type="text" id="tag_prokey" value="<?php echo $row['tag_prokey'];?>" size="70" > <span class="red"> 词与词之间用逗号隔开 </span></td></tr>
   <tr><td width="200" align="center">产品列表页描述（description） </td><td><textarea name="tag_prodes" type="text" id="tag_prodes" cols="70" rows="5"><?php echo $row['tag_prodes'];?></textarea> <span class="red"> 控制在200字符之内 </span></td></tr>
     <tr><td width="200" align="center">新闻信息列表页关键词(keywords)</td><td><input name="tag_newkey" type="text" id="tag_newkey" value="<?php echo $row['tag_newkey'];?>" size="70" > <span class="red"> 词与词之间用逗号隔开 </span></td></tr>
   <tr><td width="200" align="center">新闻信息列表页描述（description） </td><td><textarea name="tag_newdes" type="text" id="tag_indexdes" cols="70" rows="5"><?php echo $row['tag_newdes'];?></textarea> <span class="red"> 控制在200字符之内 </span></td></tr>
   
      <tr><td width="200" align="center">首页关于我们 </td><td><textarea name="tag_homeabout" type="text" id="tag_homeabout"  style="width:98%;height:300px;visibility:hidden;"><?php echo $row['tag_homeabout'];?></textarea> <span class="red"> 可自由编辑 </span></td></tr>
      
         <tr><td width="200" align="center">联系我们 </td><td><textarea name="tag_contacts" type="text" id="tag_contacts"  style="width:98%;height:300px;visibility:hidden;"><?php echo $row['tag_contacts'];?></textarea>  <span class="red"> 可自由编辑  </span></td></tr>
    
</table>
 <table width="98%" class="table" cellpadding="0" cellspacing="0">
      <tr>
    <td colspan="8"  class="tdsbg"><img src="SC_Page_Config/Image/icons/coins.png" align="absmiddle" /> 文字标签 <span class="red"> 相对应的词翻译成相应的语言 </span></td>
  </tr>
   <tr>
       <td>首页</td><td><input name="tag_home" type="text" id="tag_home" value="<?php echo $row['tag_home'];?>" size="20" ></td>
       <td>关于我们</td><td><input name="tag_about" type="text" id="tag_about" value="<?php echo $row['tag_about'];?>" size="20" ></td>
       <td>产品中心</td><td><input name="tag_product" type="text" id="tag_product" value="<?php echo $row['tag_product'];?>" size="20" ></td>
       <td>产品分类</td><td><input name="tag_productcategory" type="text" id="tag_productcategory" value="<?php echo $row['tag_productcategory'];?>" size="20" ></td>
   </tr>
   <tr>
       <td>新闻中心</td><td><input name="tag_news" type="text" id="tag_news" value="<?php echo $row['tag_news'];?>" size="20" ></td>
       <td>联系我们</td><td><input name="tag_contact" type="text" id="tag_contact" value="<?php echo $row['tag_contact'];?>" size="20" ></td>
       <td>电话</td><td><input name="tag_tel" type="text" id="tag_tel" value="<?php echo $row['tag_tel'];?>" size="20" ></td>
       <td>邮箱</td><td><input name="tag_email" type="text" id="tag_email" value="<?php echo $row['tag_email'];?>" size="20" ></td>
   </tr> 
   <tr>
       <td>下载</td><td><input name="tag_download" type="text" id="tag_download" value="<?php echo $row['tag_download'];?>" size="20" ></td>
       <td>在线留言</td><td><input name="tag_message" type="text" id="tag_message" value="<?php echo $row['tag_message'];?>" size="20" ></td>
       <td>热门产品</td><td><input name="tag_hot" type="text" id="tag_hot" value="<?php echo $row['tag_hot'];?>" size="20" ></td>
       <td>推荐产品</td><td><input name="tag_tuijian" type="text" id="tag_tuijian" value="<?php echo $row['tag_tuijian'];?>" size="20" ></td>
   </tr>    
    <tr>
       <td>产品搜索</td><td><input name="tag_search" type="text" id="tag_search" value="<?php echo $row['tag_search'];?>" size="20" ></td>
       <td>标题</td><td><input name="tag_title" type="text" id="tag_title" value="<?php echo $row['tag_title'];?>" size="20" ></td>
       <td>内容</td><td><input name="tag_content" type="text" id="tag_content" value="<?php echo $row['tag_content'];?>" size="20" ></td>
       <td>产品描述</td><td><input name="tag_proxxms" type="text" id="tag_proxxms" value="<?php echo $row['tag_proxxms'];?>" size="20" ></td>
   </tr>   
    <tr>
       <td>相关产品</td><td><input name="tag_proxgcp" type="text" id="tag_proxgcp" value="<?php echo $row['tag_proxgcp'];?>" size="20" ></td>
       <td>相关新闻</td><td><input name="tag_newsxg" type="text" id="tag_newsxg" value="<?php echo $row['tag_newsxg'];?>" size="20" ></td>
        <td>询盘</td><td><input name="tag_inquiry" type="text" id="tag_inquiry" value="<?php echo $row['tag_inquiry'];?>" size="20" ></td>
       <td>产品编号</td><td><input name="tag_Item" type="text" id="tag_Item" value="<?php echo $row['tag_Item'];?>" size="20" ></td>
     
       
   </tr> 
     <tr>
        <td>验证码</td><td><input name="tag_code" type="text" id="tag_code" value="<?php echo $row['tag_code'];?>" size="20" ><input name="languageID" type="hidden" id="languageID" value="<?php echo $_GET['lgid'];?>" size="20" ></td>
       <td>更多</td><td><input name="tag_more" type="text" id="tag_more" value="<?php echo $row['tag_more'];?>" size="20" ></td>
       <td>搜索框中提示文字</td><td><input name="tag_searchtit" type="text" id="tag_searchtit" value="<?php echo $row['tag_searchtit'];?>" size="20" ></td>
    <td>分享</td><td><input name="tag_follow" type="text" id="tag_follow" value="<?php echo $row['tag_follow'];?>" size="20" ></td>
     </tr>   

      <tr>
      
  <td >留言提示</td><td colspan="7" ><textarea name="tag_messgetj" type="text" id="tag_messgetj"   cols="70" rows="5" ><?php echo $row['tag_messgetj'];?></textarea> <span class="red">  留言成功！</span></td>
  </tr>
   <tr>
  <td  >留言提错误示</td><td colspan="7" > <textarea name="tag_messgets" type="text" id="tag_messgets"   cols="70" rows="5" ><?php echo $row['tag_messgets'];?></textarea> <span class="red">  带星号的必填！</span></td>
    </tr>  
    <tr>
  <td  >搜索提示</td><td colspan="7" > <textarea name="tag_searchms" type="text" id="tag_searchms"  cols="70" rows="5" ><?php echo $row['tag_searchms'];?></textarea> <span class="red">  没有找到相关产品！</span></td>
      </tr>   
      <tr><td colspan="8"><input type="submit" value="编辑" name="submit" id="submit" ></td></tr>
</table>
</form>
<?php 
 include_once 'SEMCMS_bot.php'; 
?>
</body>
</html>
