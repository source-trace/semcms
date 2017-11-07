<?php include_once 'SEMCMS_Top_include.php'; ?>
 
<body>
 <?php
 //询盘信息

    $sql="select * from sc_msg where ID=".$_GET['ID'];
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
    $PID=$row['msg_pid'];
    $email=$row['msg_email'];
    $message=$row['msg_content'];
    $IP=$row['msg_ip'];
    $time=$row['msg_time'];
    $names=$row['msg_name'];
    $tel=$row['msg_tel'];
     }
    
//产品信息
      if ($PID!=0){
     $sql="select * from sc_products where ID=".$PID;
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
    $productsname=$row['products_name'];
     }    
 }else{$productsname="来自联系我们的留言";}
 
?>
<table width="700" cellpadding="0" cellspacing="0" class="table">
    <tr><td colspan="2" align="right" class="tdsbg"><span style=" float:left;"><?php echo $productsname;?></span><a href="javascript:TINY.box.hide()"><img src="SC_Page_Config/Image/icons/hr.gif" border="0" /></a></td></tr>
<tr><td>姓名:</td><td><?php echo $names; ?></td></tr>
<tr><td>电话:</td><td><?php echo $tel; ?></td></tr>
<tr><td>邮箱:</td><td><?php echo $email; ?></td></tr>
<tr><td>留言内容:</td><td><?php echo $message; ?></td></tr>
<tr><td>来路IP:</td><td><?php echo $IP; ?></td></tr>
<tr><td>时间:</td><td><?php echo $time; ?></td></tr>
 
</table>
 
    </body>
</html>
