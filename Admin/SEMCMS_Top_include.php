<?php
include_once './Include/inc.php';
include_once 'SEMCMS_Function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="SC_Page_Config/Css/SC_Back.css" type="text/css" />
<script charset="utf-8" src="SC_Page_Config/Js/jquery.js"></script>
<script charset="utf-8" src="SC_Page_Config/Js/tinybox.js"></script>
 	<link rel="stylesheet" href="../Edit/themes/default/default.css" />
	<link rel="stylesheet" href="../Edit/plugins/code/prettify.css" />
	<script charset="utf-8" src="../Edit/kindeditor.js"></script>
	<script charset="utf-8" src="../Edit/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../Edit/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="contents"]', {
				cssPath : '../Edit/plugins/code/prettify.css',
				uploadJson : '../Edit/php/upload_json.php',
				fileManagerJson : '../Edit/php/file_manager_json.php',
				allowFileManager : true
 
			});
			prettyPrint();
		});
		
		 KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="tag_homeabout"]', {
				cssPath : '../Edit/plugins/code/prettify.css',
				uploadJson : '../Edit/php/upload_json.php',
				fileManagerJson : '../Edit/php/file_manager_json.php',
				allowFileManager : true
 
			});
			prettyPrint();
		});
		
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="tag_contacts"]', {
				cssPath : '../Edit/plugins/code/prettify.css',
				uploadJson : '../Edit/php/upload_json.php',
				fileManagerJson : '../Edit/php/file_manager_json.php',
				allowFileManager : true
 
			});
			prettyPrint();
		});
		
	</script>
<script type="text/javascript">
        $(function() {
            $("body input").focus(function() {
                $(this).addClass("inputbk");
            }).blur(function() {
                $(this).removeClass("inputbk");
            })
			
		  $("body tr").mousemove(function(){
		  $(this).addClass("inputbks").siblings().removeClass("inputbks").end();
		  }); 		
 
			$("body textarea").focus(function() {
                $(this).addClass("inputbk");
            }).blur(function() {
                $(this).removeClass("inputbk");
            })
	
        })
        //删除确认   
        function delcfm() {
        if (!confirm("确认要删除?")) {
            //window.event.returnValue = false;
            return false;
        }
    }
 //自动赋值
 
	function upd(str,str2){
	document.getElementById(str2).value=replacestr(document.getElementById(str).value);
 
	}
 

           function replacestr(str) {//替换不正常字符
               str=str.replace(/\ /g,"-");
               str=str.replace(/\*/g,"");
               str=str.replace(/\?/g,"");
               str=str.replace(/\</g,"");
               str=str.replace(/\>/g,"");
               str=str.replace(/\|/g,"");
               str=str.replace(/\\/g,"");
               return str;
           }
      
      function myrefresh()//刷新当前面面
    {
      window.location.reload();
    }
      
      
 
    var imgNumber = 2;
    function addImg(){
        imgNumber++;
        $("#tp").append("<input name=\"products_Images[]\" type=\"text\" id=\"products_Images"+imgNumber+"\" size=\"60\" /> <span id=\"uploads\"> <a href=\"javascript:;\" onclick=\"javascript:window.open('SEMCMS_Upload.php?Imageurl=../Images/prdoucts/&filed=products_Images"+imgNumber+"&filedname=form','newwindow','height=185,width=500,top=300,left=400,toolbar=no,menubar=no,scrollbars=no, resizable=no,location=no, status=no')\">上传</a></span><br>");
    }
    
  function SubmitProduct(){//产品提交验证
      
      if (document.getElementById("products_category").value==""){
          
          alert('请选择商品分类！');
          document.getElementById("products_category").focus();
          return false;
      }
      
      if (document.getElementById("products_name").value==""){
          
          alert('请输入商品名称！');
          document.getElementById("products_name").focus();
          return false;
      }

      if (document.getElementById("contents").value==""){
          
           alert('请输入商品详细描述！');
           document.getElementById("contents").focus();
          return false;
      }
  }
  
  
    function SubmitInfo(){//信息提交验证
      
      if (document.getElementById("info_lanmu").value==""){
          
          alert('请选择分类！');
          document.getElementById("info_lanmu").focus();
          return false;
      }
      
      if (document.getElementById("info_title").value==""){
          
          alert('请输入信息标题！');
          document.getElementById("info_title").focus();
          return false;
      }

      if (document.getElementById("contents").value==""){
          
           alert('请输入详细内容！');
           document.getElementById("contents").focus();
          return false;
      }
  }
  
 
     function SubmitEmial(){//邮件提交验证
      
      if (document.getElementById("in_emial").value==""){
          
          alert('请输入邮件地址！');
          document.getElementById("in_emial").focus();
          return false;
      }
      
      if (document.getElementById("in_title").value==""){
          
          alert('请输入邮件标题！');
          document.getElementById("in_title").focus();
          return false;
      }
      if (document.getElementById("contents").value==""){
          
          alert('请输入邮件内容！');
          document.getElementById("contents").focus();
          return false;
      }
 
  }
 
 
     function SubmitImage(){//Banner提交验证
      
      if (document.getElementById("banner_image").value==""){
          
          alert('请上传图片！');
          document.getElementById("banner_image").focus();
          return false;
      }
      
      if (document.getElementById("banner_url").value==""){
          
          alert('请输入链接地址！');
          document.getElementById("banner_url").focus();
          return false;
      }

      if (document.getElementById("banner_paixu").value==""){
          
           alert('请输入排序！');
           document.getElementById("banner_paixu").focus();
          return false;
      }
  }
 
 
      function SubmitMenu(){//导航提交验证
      
      if (document.getElementById("menu_name").value==""){
          
          alert('请输入名称！');
          document.getElementById("menu_name").focus();
          return false;
      }
      
      if (document.getElementById("menu_link").value==""){
          
          alert('请输入链接地址！');
          document.getElementById("menu_link").focus();
          return false;
      }

      if (document.getElementById("menu_paixu").value==""){
          
           alert('请输入排序！');
           document.getElementById("menu_paixu").focus();
          return false;
      }
  }
 
       function SubmitUser(){//提用户交验证
      
      if (document.getElementById("user_name").value==""){
          
          alert('请输入姓名！');
          document.getElementById("user_name").focus();
          return false;
      }
      
      if (document.getElementById("user_admin").value==""){
          
          alert('请输入账号！');
          document.getElementById("user_admin").focus();
          return false;
      }

      if (document.getElementById("user_ps").value==""){
          
           alert('请输入密码！');
           document.getElementById("user_ps").focus();
          return false;
      }
      
        if (document.getElementById("user_email").value==""){
          
           alert('请输入邮箱！');
           document.getElementById("user_email").focus();
          return false;
      }    
      
      
  }
 
 
 //全选 与全清
 
 function checkAll(name) { 
var el = document.getElementsByTagName('input'); 
var len = el.length; 
for(var i=0; i<len; i++) { 
if((el[i].type=="checkbox") && (el[i].name==name)) { 
el[i].checked = true; 
} 
} 
} 
function clearAll(name) { 
var el = document.getElementsByTagName('input'); 
var len = el.length; 
for(var i=0; i<len; i++) { 
if((el[i].type=="checkbox") && (el[i].name==name)) { 
el[i].checked = false; 
} 
} 
} 
 
 
var checkflag = "false";
function check(field) {
if (checkflag == "false") {
for (i = 0; i < field.length; i++) {
field[i].checked = true;}
checkflag = "true";
  }
else {
for (i = 0; i < field.length; i++) {
field[i].checked = false; }
checkflag = "false";
 }
}
 
 
 
</script>
        
    <title>欢迎使用黑蚂蚁·SEMCMS外贸网站管理系统</title>
    </head>
    <?php 
    
    echo checkuser();
    ?>