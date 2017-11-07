<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//邮件发送代码

require("class.phpmailer.php"); 

function SendEmail($smtpserver,$smtpuser,$smtppass,$smtpusermail,$smtpserverport,$smtptoemail,$mailtitle,$mailcontent){
 
 

$mail = new PHPMailer(); //建立邮件发送类
$mail->IsSMTP();                // 使用SMTP方式发送
$mail->CharSet = "utf-8"; 
$mail->Host = $smtpserver;     // 您的企业邮局域名

$mail->SMTPAuth = true;       // 启用SMTP验证功能
if ($smtpserverport<>25){     //除25端口外启用ssl
$mail->SMTPSecure = "ssl";     // SMTP 安全协议 
}
$mail->Username = $smtpuser;   // 邮局用户名(请填写完整的email地址)
$mail->Password = $smtppass;   // 邮局密码
$mail->Port=$smtpserverport;   // 邮件端口
$mail->From = $smtpusermail;   // 邮件发送者email地址
$mail->FromName = $_SERVER['SERVER_NAME'];//以当前域名为名称
$mail->AddAddress($smtptoemail,"");

//$arr = array($smtpemailto,$D_Emial); // 群发
//foreach ($arr as $value) {
//$mail->AddAddress($value,"");
//} 
//$mail->AddReplyTo("", "");
//$mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件

$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
$mail->Subject = $mailtitle; //邮件标题
$mail->Body = $mailcontent; //邮件内容
$mail->AltBody = ""; //附加信息，可以省略      
        
if(!$mail->Send())
{
//echo "sb: " . $mail->ErrorInfo;
  echo "The mailbox parameter is not set correctly";
exit;
} 
}
//获取IP方法 
 function getRealIp()
{
    $ip=false;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
 

function inject_check($sql_str) { // 防sql入注
    return preg_match('/select|insert|=|<|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile/i', $sql_str);
} 

function verify_id($ID) { 
 
   if(inject_check($ID)) { 
        exit('Sorry,You do this is wrong！');
    } 
 
    return $ID; 
} 

