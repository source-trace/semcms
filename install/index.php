<?php
error_reporting(0);//清除错误
!defined( 'DB_CHARSET' ) && define( 'DB_CHARSET' , 'utf8' );// 数据库保存编码, 不可缺少
header( 'Content-Type:text/html; charset=utf-8' ); // 本程序执行编码

// 显示填写mysql信息的表单 , 并停止
if ( !isset( $_POST['dbinfo'] ) ) {
	include 'install_form.html';
	exit;
}

// 提交表单后, 获得mysql账号信息
$db = array(  );
$data = $_POST['dbinfo'];
$db['host'] = $data['dbhost'];
$db['dbname'] = $data['dbname'];
$db['user'] = $data['dbuser'];
$db['pwd'] = $data['dbpw'];


// 导入数据文件
$sql_file = dirname(__FILE__)."/semcms.sql";
run_sql_file( $sql_file , $db );

 //删除安装文件
 
 delDirAndFile(dirname(__FILE__));

// 安装完成 , 跳转回首页
echo "
\n\r<pre>
+-------------+-------------+-------------+
            安装完成。... 30秒后跳转到首页
</pre>
\n\r
 
";
header("Refresh:30;url=../index.php");


/* 执行mysql数据文件.  参数: 数据文件 , 数据库账号信息 */
function run_sql_file( $sql_file , $dbconfig ) {
	$host = $dbconfig['host'] ;
	$dbname = $dbconfig['dbname'] ;
	$user = $dbconfig['user'] ;
	$pwd = $dbconfig['pwd'] ;

	// 连接mysql数据库
	$conn = mysql_connect($host,$user,$pwd) or die( '连接mysql错误：'.mysql_error() );

	// 删除旧的数据库 
	mysql_query( "DROP database IF EXISTS {$dbname} ;" ) or die ( "重新建立新的数据库 操作失败，无法删除【旧】数据库, 请检查mysql操作权限。错误信息: \n".mysql_error() ); 

	// 重新建立新数据库
	mysql_query( "CREATE DATABASE {$dbname} CHARACTER SET ".DB_CHARSET." ;" ) or die ( "无法创建数据库, 请检查mysql操作权限。错误信息: \n".mysql_error() ); 

	// 选择数据库
	mysql_select_db($dbname,$conn) or die( "连接数据库名 {$dbname} 错误：\n".mysql_error() );


	/* ############ 数据文件分段执行 ######### */
	$sql_str = file_get_contents( $sql_file );
	$piece = array(  ); // 数据段
	preg_match_all( "@([\s\S]+?;)\h*[\n\r]@" , $sql_str , $piece ); // 数据以分号;\n\r换行  为分段标记
	!empty( $piece[1] ) && $piece = $piece[1];
	$count = count($piece);
	if ( $count <= 0 ) {
		exit( 'mysql数据文件: '. $sql_file .' , 不是正确的数据文件. 请检查安装包.' );
	}

	$tb_list = array(  ); // 表名列表
	preg_match_all( '@CREATE\h+TABLE\h+[`]?([^`]+)[`]?@' , $sql_str , $tb_list );
	!empty( $tb_list[1] ) && $tb_list = $tb_list[1];
	$tb_count = count( $tb_list );

	// 开始循环执行
	for($i=0;$i<$count ;$i++){

		$sql = $piece[$i] ;
		mysql_query("SET character_set_connection='".DB_CHARSET."', character_set_results='".DB_CHARSET."', character_set_client='binary'");
		$result = mysql_query($sql);
		
		// 建表数量
		if ( $i < $tb_count ) {
			echo "<span style='display: inline-block; width: 200px;'>创建表: ".$tb_list[ $i ]. '</span>';
			if($result){
	
				echo " <font color='green'>成功安装</font> ......";
				
			}
			else {
				echo " <font color='red'>失败</font> , 原因:".mysql_error();
			}
			echo "<br />\n";
			
		}
		// 执行其它语句
		else {
			if(!$result){
				echo "\n<br /> sql语句执行<font color='red'>失败</font> , 原因:".mysql_error();
			}
		}
	}
        
        //更改数据库配置文件
    
        
        $template_o = file_get_contents('Sample_db_conn.php');
        $templateUrl = '../Include/db_conn.php';
        $output = str_replace('<{dataurl>}',$host, $template_o);
        $output = str_replace('<{datauser}>', $user, $output);
        $output = str_replace('<{datapassword>}',$pwd, $output);
        $output = str_replace('<{dataname>}', $dbname, $output);
        file_put_contents($templateUrl, $output) or die ( "无法修改数据库配置文件，请手动修改。错误信息: \n".mysql_error() ); 
        //更改后台路径
            //随机生成后台路径
        $ht_filename="";
        for ($i = 1; $i <= 4; $i++) {
                 $ht_filename.= chr(rand(97, 122));
                ;}
        
        rename('../Admin', '../'.$ht_filename.'_Admin' ) or die ( "无法修改后台路径,请查看文件夹Admin权限,或手动更改Admin名称。错误信息: \n".mysql_error() );
	
        echo"<br><br><font color='red'>网站后台地址为：你的域名+".$ht_filename."_Admin/</font><br><font color='red'>请牢记,后台默认帐户：Admin 密码：1</font><br><br>";
}



    
  // 删除安装文件

function delDirAndFile($dirName)

{

if ( $handle = opendir("$dirName" ) ) {

while ( false !== ( $item = readdir( $handle ) ) ) {

if ( $item != "." && $item != ".." ) {

if ( is_dir("$dirName/$item") ) {

delDirAndFile("$dirName/$item");

} else {

if( unlink("$dirName/$item") )echo "成功删除文件： $dirName/$item<br />\n";

}

}

}

closedir( $handle );

if( rmdir( $dirName ) ) echo "成功删除目录： $dirName<br />\n";

}

}