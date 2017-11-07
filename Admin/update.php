<?php include_once 'SEMCMS_Top_include.php'; ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $dh=",";
    $sql="select * from sc_products";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){
       $fls=$row['products_category'];
       mysql_query("UPDATE sc_products SET  products_category='$dh$fls$dh' "); 
       $fls="";
     }  
