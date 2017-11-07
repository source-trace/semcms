<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
include_once  'web_inc.php';

$Type=@htmlspecialchars($_GET["type"]);				
if (!isset($Type)){$Type = "$Type";}else{$Type=="";}

// 找回密码

if ($Type=="fintpassword"){
    
    
  if (@htmlspecialchars($_POST['Email']) !==""){ // 判断是否输入邮箱
        
    $sql="select * from sc_user where user_email='".$_POST['Email']."'"; 
    $result=mysql_query($sql); 
    $row = mysql_fetch_array($result,MYSQL_ASSOC); 
    if (mysql_num_rows($result)>0) 
        { 
   $fsjs=rand(10,10000);  //邮件认证码 
   $fhurl=str_replace("SEMCMS_Remail.php","",$_POST['furl']);
   $smtpusermail=$smtpemailto;
   $smtptoemail=@htmlspecialchars($_POST['Email']);
   $mailtitle="来自".$_SERVER['SERVER_NAME']."密码找回邮件！";
   $mailcontent="网站管理员你好：<br>你的邮箱是：".$_POST['Email']."<br> 点击<a href='".$fhurl."?umail=".$_POST['Email']."&type=ok' target='_blank'>找回密码</a>"
           . " 或者复制以下链接到浏览器浏览 <br>"
           . "".$fhurl."?umail=".$_POST['Email']."&type=ok <br>认证码：".$fsjs."<br>请妥善保管！";
   
  mysql_query("UPDATE sc_user SET user_rzm='$fsjs' WHERE user_email='".$_POST['Email']."'");
  
  // 邮件发送
  echo  SendEmail($smtpserver,$smtpuser,$smtppass,$smtpusermail,$smtpserverport,$smtptoemail,$mailtitle,$mailcontent);
  
  echo'<script language="javascript">alert("已发送到你的'.$_POST['Email'].'邮箱！");location.href="'.$fhurl.'";</script>'; 
        } 
    else 
        {     
         echo'<script language="javascript">alert("此邮箱不存在！");history.go(-1);</script>'; 

        }    

  
  }else{
      
      echo'<script language="javascript">alert("请输入正确的邮箱！");history.go(-1);</script>';
  }
}elseif ($Type=="findok"){ //  密码找回  
 
     $umail=@htmlspecialchars($_POST['Email']);
     $umm=@htmlspecialchars($_POST['umima']);
     $urzm=@htmlspecialchars($_POST['uyzm']);
     $fhurl=str_replace("SEMCMS_Remail.php","",$_POST['furl']);
     if(empty($umail) || empty($umm) || empty($urzm)  ){
         
      echo'<script language="javascript">alert("请输入密码与认证码！");history.go(-1);</script>';   
         
     }else{
         
       mysql_query("UPDATE sc_user SET user_ps=md5($umm)  WHERE user_email='".$umail."' and user_rzm='$urzm'"); 
       
        echo'<script language="javascript">alert("操作成功返回登陆！");location.href="'.$fhurl.'";</script>';   
         
     }   
    
}elseif ($Type=="MSG"){ //询盘发送！
    
 $msg_email=@htmlspecialchars($_POST['mail']);
 $msg_content=@htmlspecialchars($_POST['tent']);
 $yzm=$_POST['yzm'];
 $msg_tel=$_POST['tel'];
 $names=@htmlspecialchars($_POST['name']);
 $msg_pid=@htmlspecialchars($_POST['PID']);
 $msg_languageID=@htmlspecialchars($_POST['languageID']);
 $msg_time=date("Y-m-d h:i:s",time()+8*60*60);
 $msg_ip=getRealIp();
 
 if($yzm==$_SESSION['authcode']){
 
if(preg_match('/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[-_a-z0-9][-_a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})$/i',$msg_email) && $names!==""){ 
    //写入数据库
      mysql_query("INSERT INTO sc_msg(msg_pid,msg_email,msg_content,msg_ip,msg_name,msg_tel,msg_time,languageID)"
         . "VALUES ('$msg_pid','$msg_email','$msg_content','$msg_ip','$names','$msg_tel','$msg_time','$msg_languageID')");   
    //邮件发送 
    $mailtitle="注意:来自".$_SERVER['SERVER_NAME']."网站的询盘";
    $mailcontent="邮箱:".$msg_email."<br>"
            . "姓名:".$names."<br>"
            . "电话:".$msg_tel."<br>"
            . "留言:".$msg_content."<br>"
            . "IP地址:".$msg_ip."<br>"
            . "详细信息登陆网站后台查看！";
    if ($web_mailopen==1){
    echo  SendEmail($smtpserver,$smtpuser,$smtppass,$smtpemailto,$smtpserverport,$smtpemailtj,$mailtitle,$mailcontent);  
    }
    echo "<script language='javascript'>alert('Thank you!');window.location.href=document.referrer;</script>'";

}else{ echo "<script language='javascript'>alert('Write your mail address correctly and Name!');history.go(-1);</script>'"; } 

 }else{
 echo "<script language='javascript'>alert('Enter the correct verification code!');history.go(-1);</script>'";     
     
 }

    
}elseif ($Type=="Remail"){//邮件回复
    
 $msg_email=@htmlspecialchars($_POST['in_emial']);
 $msg_content=$_POST['contents'];
 $mailtitles=@htmlspecialchars($_POST['in_title']);
 
 
if(preg_match('/^[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[-_a-z0-9][-_a-z0-9]*\.)*(?:[a-z0-9][-a-z0-9]{0,62})\.(?:(?:[a-z]{2}\.)?[a-z]{2,})$/i',$msg_email) && $msg_content!==""){ 
 
    //邮件发送 
    $mailtitle=$mailtitles;
    $mailcontent=$msg_content;
    echo  SendEmail($smtpserver,$smtpuser,$smtppass,$smtpemailto,$smtpserverport,$msg_email,$mailtitle,$mailcontent);  
    echo "<script language='javascript'>alert('成功发送!');window.location.href=document.referrer;</script>'";

}else{ echo "<script language='javascript'>alert('发送错误!');history.go(-1);</script>'"; } 
    
    
}