<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 // 防sql入注

if (isset($_GET)){$GetArray=$_GET;}else{$GetArray='';} //get
if (isset($_COOKIE)){$CookArray=$_COOKIE;}else{$CookArray='';} //cookie
 
foreach ($GetArray as $value){//get
    
    verify_id($value);
   // echo $value."<br>";
  
}

foreach ($CookArray as $value){ //cookie
    
    verify_id($value);
     //echo $value;
  
}

function inject_check($sql_str) { 
    
     return preg_match('/select|insert|=|<|and|or|\%|like|\(|\)|between|update|\+|mid|master|chr|char|drop|\'|\/\*|\*|union|into|load_file|outfile|dump/i',$sql_str);
    
} 

function verify_id($str) { 
 
   if(inject_check($str)) {
       
        exit('Sorry,You do this is wrong! (.-.)');
        
    } 
 
    return $str; 
} 
