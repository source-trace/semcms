<?php include_once 'SEMCMS_Top_include.php'; ?>

<body>
<?php

//文件上传方式
 
//验证文件类型号
if (/*(($_FILES["file"]["type"] == "image/gif")//gif
|| ($_FILES["file"]["type"] == "image/jpeg")//jpg
|| ($_FILES["file"]["type"] == "image/pjpeg")//jpg
|| ($_FILES["file"]["type"] == "image/x-png")//png
|| ($_FILES["file"]["type"] == "image/png")//png
|| ($_FILES["file"]["type"] == "image/bmp")//bmp  
|| ($_FILES["file"]["type"] == "application/vnd.ms-excel")//xls
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet")//xlsx
|| ($_FILES["file"]["type"] == "application/msword")//doc
|| ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document")//docx
|| ($_FILES["file"]["type"] == "application/zip")//zip
|| ($_FILES["file"]["type"] == "application/octet-stream")//rar
|| ($_FILES["file"]["type"] == "application/x-rar-compressed")//rar 
|| ($_FILES["file"]["type"] == "application/x-zip-compressed")//zip
|| ($_FILES["file"]["type"] == "image/x-icon")//ico
 
 )&&*/ ($_FILES["file"]["size"] > 1) && ($_FILES["file"]["size"] < 30240000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
   // echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      echo "<script language='javascript'>alert('上传失败,返回重新选择');history.go(-1);</script>";
    }
  else
    {
//    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
//    echo "Type: " . $_FILES["file"]["type"] . "<br />";
//    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
//    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
      
      //文件存放路径
      $Imageurl=$_POST["imageurl"];
      $filed=$_POST["filed"];
      $filedname=$_POST["filedname"];
     
      //文件重命名
      
      $uptype = explode(".",$_FILES["file"]["name"]);//获取扩展名
      
      if (test_input($_POST["wname"])!==""){//自定义文件名
          
        $newname=test_input($_POST["wname"]).".".end($uptype); //新的文件名  
        
      }else{
      
           $rand=rand(10,100);//随机数
           $date = date("ymdhis").$rand;//文件名：时间+随机数
           $newname=$date.".".end($uptype); //新的文件名
      }
           
    // 判读文件是否存在
           
       // if (file_exists("../Images/default/" . $newname))
        // {
            // echo $_FILES["file"]["name"] . " already exists.";
        //       echo "<script language='javascript'>alert('有相同文件存在');history.go(-1);</script>";
       //  }
       // else
       //  {
            move_uploaded_file($_FILES["file"]["tmp_name"],$Imageurl.$newname); //文件写入文件夹 
            //echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
            //echo "<script language='javascript'>alert('成功上传!');history.go(-1);</script>";
             //echo "window.opener.document.".$filedname.".".$filed.".value=".$Imageurl.$newname;
             
            echo"<script language='javascript'>window.opener.document.".$filedname.".".$filed.".value='".$Imageurl.$newname."';</script>";
            echo"<script language='javascript'>window.close();</script>";
       //  }
    }
  }
else
  {
  //echo "Invalid file";
echo "<script language='javascript'>alert('1.请检查文件上传类型.\\n 允许:jpe,gif,png,doc,xls,pdf,rar,zip,bmp \\n2.上传大小1M之内.');history.go(-1);</script>";    
    
  }
?>
</body>
</html>