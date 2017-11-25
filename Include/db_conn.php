<?php
//CopyRight sem-cms.com 公元2015(黑蚂蚁.阿梁：【qq:1181698019】制作开发)
/*数据库链接代码*/
error_reporting(0);//清除错误
header("Content-type: text/html; charset=utf-8"); 
$url = "localhost";//连接数据库的地址
$user = "root4"; //账号
$password = "root7";//密码
$dbdata="2017test8";//数据库名称
$con = mysql_connect($url,$user,$password);
if(!$con){
    
    echo "<script language='javascript'>window.location.href='install/';</script>";

         } 
 mysql_query('set names utf8'); //设定编码
 if(!mysql_select_db($dbdata, $con)){
 	die("数据库名称不对,请检查是否正确安装数据库!".mysql_error());
 	
 	};//选择数据库
