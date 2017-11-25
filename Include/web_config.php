<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
   //获取域名

   $SERVER_NAME=$_SERVER["HTTP_HOST"];
   
   //目录
	 //如果在二级目录下测试，请把下面的/加上文件名/：
	 //例如放在test下调试如下：
	 //$weburldir="/test/"
         //如果有端口号请加上端口，如下
         //$weburldir=":90/test/"
   $weburldir="/";
   $web_url="http://".$SERVER_NAME.$weburldir;  
       
   // 固定参数

   $sql="select * from sc_config where ID=1";
   $query=mysql_query($sql);
   while($row=mysql_fetch_array($query)){
      $smtpuser=$row['web_umail'];//邮件账号
      $smtppass=$row['web_pmail'];//邮件密码
      $smtpserverport=$row['web_dmail'];//邮件端口
      $smtpserver=$row['web_smail'];//邮件stmp
      $smtpemailto=$row['web_tmail'];//邮件地址
      $smtpemailtj=$row['web_jmail'];//邮件接受账号
      $web_mailopen=$row['web_mailopen'];//邮件转发是否开启
      $webname=$row['web_name'];//网站名称
      $web_urls=$row['web_url'];//网站url
      $weblogo=$web_url.str_replace('../','',$row['web_logo']);//网站logo
      $webico=str_replace('../','',$row['web_ico']);//网站ico
      $webcopy=htmlspecialchars_decode($row['web_copy'], ENT_QUOTES);//网站版权
      $webemail=$row['web_email'];//网站邮箱
      $webskype=$row['web_skype'];//网站 skype
      $webwathsapp=$row['web_wathsapp'];//网站wathsaspp
      $webtel=$row['web_tel'];//网站电话
      $webplist=$row['web_plist'];//网站产品列表数量
      $webnlist=$row['web_nlist'];//网站新闻列表数量
      $webiflist=$row['web_iflist'];//网站推荐产品数量
      $webinlist=$row['web_inlist'];//网站新产品数量
      $webmeate=$row['web_meate'];//网站验证标签
      $webgoogle=htmlspecialchars_decode($row['web_google'], ENT_QUOTES);//网站google分析代码
      $webshare=$row['web_share'];//网站分享代码   
      $webTemplate=$row['web_Template'];//模版标志
      $web_url_ger="";
      //以下内容请勿乱修改：
      $CopyRight="<span class='spr'>".Chr(32).chr(80).chr(111).chr(119).chr(101).chr(114).chr(101).chr(100).chr(32).chr(98).chr(121).chr(32).chr(60).chr(97).chr(32).chr(104).chr(114).chr(101).chr(102).chr(61).chr(34).chr(104).chr(116).chr(116).chr(112).chr(58).chr(47).chr(47).chr(119).chr(119).chr(119).chr(46).chr(115).chr(101).chr(109).chr(45).chr(99).chr(109).chr(115).chr(46).chr(99).chr(111).chr(109).chr(34).chr(62).chr(60).chr(98).chr(32).chr(115).chr(116).chr(121).chr(108).chr(101).chr(61).chr(34).chr(99).chr(111).chr(108).chr(111).chr(114).chr(58).chr(35).Chr(70).Chr(54).chr(48).chr(34).chr(62).chr(115).chr(101).chr(109).chr(99).chr(109).chr(115).chr(32).chr(80).chr(72).chr(80).chr(32).Chr(50).chr(46).Chr(52).chr(60).chr(47).chr(98).chr(62).chr(60).chr(47).chr(97).chr(62).chr(32)."</span>";
   } 

 
