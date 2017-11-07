<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$Class=@htmlspecialchars($_GET["Class"]);				
if (!isset($Class)){$Class = "$Class";}else{$Class=="";}

$CF=@htmlspecialchars($_GET["CF"]);				
if (!isset($CF)){$CF = "$CF";}else{$CF=="";}


if ($CF=="category"){  //商品分类----------------------------------


        if($Class=="add"){//增加分类

           //判读是否有空字符传送

          $category_name=test_input($_POST["category_name"]);
          $category_key=test_input($_POST["category_key"]);
          $category_des=test_input($_POST["category_des"]);
          $category_img=test_input($_POST["category_img"]);
          $category_url=Streplace($_POST["category_url"]);
          $category_paixu=test_input($_POST["category_paixu"]);
          $contents=test_input($_POST["contents"]);
          $langugageID=test_input($_POST["langugageID"]);
          $PID=test_input($_POST["PID"]);
          $types=$_POST["types"];
 

           if (empty($category_name)){
              if ($types=="p"){
                 header("Location: SEMCMS_Categories.php?lgid=".$langugageID."&pid=1&err=002");   
              }else{
                  header("Location: SEMCMS_Infocategories.php?lgid=".$langugageID."&pid=2&err=002"); 
              }
            }else{
            
             if (checkstr("sc_categories","category_name",$category_name)==false){ //检测分类名称
             //记录写入数据库
             mysql_query("INSERT INTO sc_categories(category_name,category_key,category_des,category_img,category_url,category_paixu,category_dest,languageID,category_pid)"
         . "VALUES ('$category_name','$category_key','$category_des','$category_img','$category_url','$category_paixu','$contents','$langugageID','$PID')");
             
            $flj=checkinfo("sc_categories","ID",$PID,"f","category_path"); //查找分类主节点
            $flj2=checkinfo("sc_categories","category_name",$category_name,"l","ID");  //查找ID
            $zlj=$flj.$flj2.","; //组合成节点
             mysql_query("UPDATE sc_categories SET category_path='$zlj' where ID=$flj2"); //更新节点
             if ($types=="p"){
             header("Location: SEMCMS_Categories.php?lgid=".$langugageID."&pid=1&err=001");  
             }else{ header("Location: SEMCMS_Infocategories.php?lgid=".$langugageID."&pid=2&err=001");  }
             }else{
                  if ($types=="p"){
                 header("Location: SEMCMS_Categories.php?lgid=".$langugageID."&pid=1&err=002");
                  }else{
                   header("Location: SEMCMS_Infocategories.php?lgid=".$langugageID."&pid=2&err=002");    
                      
                  }
                 }
       

        }


        }elseif($Class=="edit"){//更新数据

          $category_name=test_input($_POST["category_name"]);
          $category_key=test_input($_POST["category_key"]);
          $category_des=test_input($_POST["category_des"]);
          $category_img=test_input($_POST["category_img"]);
          $category_url=Streplace($_POST["category_url"]);
          $category_paixu=test_input($_POST["category_paixu"]);
          $contents=test_input($_POST["contents"]);
          $langugageID=test_input($_POST["langugageID"]);
          $PID=test_input($_POST["PID"]);
           $types=$_POST["types"];

          mysql_query("UPDATE sc_categories SET category_name='$category_name',category_key='$category_key',category_des='$category_des',category_img='$category_img',category_url='$category_url',category_paixu='$category_paixu',category_dest='$contents' where ID='$PID'");
               if ($types=="p"){
          header("Location: SEMCMS_Categories.php?lgid=".$langugageID."&pid=1&err=001");  
               }else{header("Location: SEMCMS_Infocategories.php?lgid=".$langugageID."&pid=2&err=001");  }

        }elseif($Class=="delete"){

           $PID=$_GET["pid"];
           $langugageID=$_GET["lgid"];
           $types=$_GET["types"];
           mysql_query("DELETE FROM sc_categories where LOCATE('$PID',category_path)>0"); //删除相关的
           //mysql_query("DELETE FROM sc_categories where ID=$PID"); 
           if ($types=="p"){
           header("Location: SEMCMS_Categories.php?lgid=".$langugageID."&pid=1&err=001");   
           }else{header("Location: SEMCMS_Infocategories.php?lgid=".$langugageID."&pid=2&err=001");   }
          
        }elseif($Class=="open"){

          $PID=$_GET["pid"];
          $flag=$_GET["flag"];
          $langugageID=$_GET["lgid"];
           $types=$_GET["types"];
          mysql_query("UPDATE sc_categories SET category_open='$flag' where ID=$PID");
           if ($types=="p"){
           header("Location: SEMCMS_Categories.php?lgid=".$langugageID."&pid=1&err=001");   
           }else{ header("Location: SEMCMS_Infocategories.php?lgid=".$langugageID."&pid=2&err=001");  }

        }

}elseif ($CF=="products"){    //产品管理--------------------------
    
    
     if($Class=="add"){ //增加产品
          $products_category=array(); 
          $products_category=$_POST["products_category"];
          $products_category =",".implode(",",$products_category).","; //接收到数据用,链接
          $products_name=test_input($_POST["products_name"]);
          $products_model=test_input($_POST["products_model"]);
          $products_key=test_input($_POST["products_key"]);
          $products_des=test_input($_POST["products_des"]);
          $products_Images=array(); 
          $products_Images=$_POST["products_Images"];
          $products_url=Streplace(trim($_POST["products_url"]));
          $products_aurl=trim($_POST["products_aurl"]);
          $products_paixu=test_input($_POST["products_paixu"]);
          $products_xiangguan=test_input($_POST["products_xiangguan"]);
          $contents=test_input($_POST["contents"]);
          $languageID=test_input($_POST["languageID"]);

            if(empty($products_category) || empty($products_name) || empty($contents)  ){  //判断空字段 

               header("Location:SEMCMS_Products.php?type=add&lgid=".$languageID."&pid=1&err=003"); 

            }else{  //写入数据库
              
              // 判断图片  [图片处理程序 ]     
                if ($products_Images!==""){
                   foreach ($products_Images as $k=>$Img){ //循环更替             
                   //缩略图路径 
                   if ($Img!==""){
                    $ImgUrl=$ImgUrl.$Img.",";//入库图片路径
                    $smallimg=str_replace("prdoucts/","prdoucts/small/",$Img);
                    $resizeimage = new resizeimage("$Img", "200", "200", "0","$smallimg");
                    //写入图片库
                    mysql_query("INSERT INTO sc_images(images_url,images_name,images_category) values('$Img','$products_name','$products_category')");
                       }
                       } 
                   }
            //记录写入数据库
            mysql_query("INSERT INTO sc_products(products_category,products_name,products_model,products_key,products_des,products_Images,products_url,products_paixu,products_xiangguan,products_content,products_aurl,languageID)"
         . "VALUES ('$products_category','$products_name','$products_model','$products_key','$products_des','$ImgUrl','$products_url','$products_paixu','$products_xiangguan','$contents','$products_aurl','$languageID')");
      
            header("Location: SEMCMS_Products.php?lgid=".$languageID."&err=001");  

            }
  
          
      }elseif($Class=="edit"){  //产品更新
          
          
          $products_category=array(); 
          $products_category=$_POST["products_category"];
          $products_category = ",".implode(",",$products_category).","; //接收到数据用,链接         
          $products_name=test_input($_POST["products_name"]);
          $products_model=test_input($_POST["products_model"]);
          $products_key=test_input($_POST["products_key"]);
          $products_des=test_input($_POST["products_des"]);
          $products_Images=array(); 
          $products_Images=$_POST["products_Images"];
          $products_url=Streplace(trim($_POST["products_url"]));
          $products_aurl=trim($_POST["products_aurl"]);
          $products_paixu=test_input($_POST["products_paixu"]);
          $products_xiangguan=test_input($_POST["products_xiangguan"]);
          $contents=test_input($_POST["contents"]);
          $languageID=test_input($_POST["languageID"]);
          $ID=$_POST["ID"];
          $gxtime=date("Y-m-d h:i:s",time()+8*60*60);
          $products_ls=$_POST['products_ls'];

            if(empty($products_category) || empty($products_name) || empty($contents)  ){  //判断空字段 

               header("Location:SEMCMS_Products.php?type=edit&lgid=".$languageID."&ID=$ID&page=".$_GET['page']."&err=003"); 

            }else{  //写入数据库
              
              // 判断图片  [图片处理程序 ]     
                if ($products_Images!==""){
                   foreach ($products_Images as $k=>$Img){ //循环更替             
                   //缩略图路径 
                   if ($Img!==""){
                    $ImgUrl=$ImgUrl.$Img.",";//入库图片路径
                    $smallimg=str_replace("prdoucts/","prdoucts/small/",$Img);
                    $resizeimage = new resizeimage("$Img", "200", "200", "0","$smallimg");
                    //写入图片库
                    mysql_query("INSERT INTO sc_images(images_url,images_name,images_category) values('$Img','$products_name','$products_category')");
                       }
                } 
                   }
            //更新记录
 
 
           mysql_query("UPDATE sc_products SET  products_category='$products_category',products_name='$products_name',"
                   . "products_model='$products_model',products_key='$products_key',products_des='$products_des',"
                   . "products_Images=concat(products_Images,'$ImgUrl'),products_url='$products_url',"
                   . "products_paixu='$products_paixu',products_xiangguan='$products_xiangguan',"
                   . "products_content='$contents',products_time='$gxtime',products_aurl='$products_aurl' where ID='$ID'");       
            header("Location: SEMCMS_Products.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");  
            
            
             
            }
               

      }elseif($Class=="Imagedelete"){//图片删除
          $ID=$_GET['ID'];
          $dimgurl=$_GET['imgurl'].",";
          $languageID=$_GET['lgid'];
         mysql_query("UPDATE sc_products SET products_Images= replace (products_Images,'$dimgurl','')  where ID=$ID"); 
         header("Location:SEMCMS_Products.php?type=edit&lgid=".$languageID."&page=".$_GET['page']."&ID=$ID&err=001"); 
          
      }elseif($Class=="indextj"){//首页推荐  
          
          $ID=$_GET['ID'];
          $languageID=$_GET['lgid'];
          $indext=$_GET['tj'];
         mysql_query("UPDATE sc_products SET products_index='$indext' where ID=$ID"); 
         header("Location:SEMCMS_Products.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
          
          
          
      }elseif($Class=="shangjia"){// 上架下架
          
          $ID=$_GET['ID'];
          $languageID=$_GET['lgid'];
          $indext=$_GET['tj'];
         mysql_query("UPDATE sc_products SET products_zt='$indext' where ID=$ID"); 
         header("Location:SEMCMS_Products.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
          
          
          
      }elseif($Class=="Deleted"){ // 删除商品
    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        $languageID=$_POST['languageID'];
        if ($area_arr==""){
           header("Location:SEMCMS_Products.php?lgid=".$languageID."&err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_products  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Products.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
             }
      }elseif($Class=="Addls"){ //添加类似产品
            $ID=$_GET['ID'];
            $languageID=$_GET['lgid'];
            mysql_query("INSERT INTO sc_products(products_category,products_name,products_model,products_key,products_des,products_Images,products_url,products_paixu,products_xiangguan,products_content,languageID) SELECT products_category,products_name,products_model,products_key,products_des,products_Images,products_url,products_paixu,products_xiangguan,products_content,languageID FROM sc_products where ID='$ID'");
            header("Location: SEMCMS_Products.php?lgid=".$languageID."&page=1&err=001");      
          
      }
    
    
}elseif ($CF=="info"){ //信息管理--------------------------
    
     if($Class=="add"){ //信息添加
         
         $info_title=test_input($_POST['info_title']);
         $info_keywords=test_input($_POST['info_keywords']);
         $info_des=test_input($_POST['info_des']);
         $info_url=Streplace(trim($_POST['info_url']));
         $info_content=test_input($_POST['contents']);
         $info_lanmu=test_input($_POST['info_lanmu']);
         $info_image=test_input($_POST['info_image']);
         $languageID=$_POST['languageID'];
 
         
            if(empty($info_title) || empty($info_content) || empty($info_lanmu)  ){  //判断空字段 

               header("Location:SEMCMS_Info.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("INSERT INTO sc_info(info_title,info_keywords,info_des,info_url,info_content,info_lanmu,info_image,languageID)"
         . "VALUES ('$info_title','$info_keywords','$info_des','$info_url','$info_content','$info_lanmu','$info_image','$languageID')");
          header("Location: SEMCMS_Info.php?lgid=".$languageID."&err=001");     
                
            }
         
         
     }elseif($Class=="edit"){  //信息更新
         
         $info_title=test_input($_POST['info_title']);
         $info_keywords=test_input($_POST['info_keywords']);
         $info_des=test_input($_POST['info_des']);
         $info_url=Streplace(trim($_POST['info_url']));
         $info_content=test_input($_POST['contents']);
         $info_lanmu=test_input($_POST['info_lanmu']);
         $info_image=test_input($_POST['info_image']);
         $languageID=$_POST['languageID'];
         $ID=$_POST['ID'];
         $gxtime=date("Y-m-d h:i:s",time()+8*60*60);
 
         
            if(empty($info_title) || empty($info_content) || empty($info_lanmu)  ){  //判断空字段 

               header("Location:SEMCMS_Info.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("UPDATE sc_info SET info_title='$info_title',info_keywords='$info_keywords',info_des='$info_des',"
                 . "info_url='$info_url',info_content='$info_content', info_lanmu='$info_lanmu',info_time='$gxtime',info_image='$info_image' where ID=$ID"); 
        header("Location: SEMCMS_Info.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
         
     }
 
}elseif($Class=="Deleted"){//删除信息    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        $languageID=$_POST['languageID'];
        if ($area_arr==""){
           header("Location:SEMCMS_Info.php?lgid=".$languageID."&err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_info  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Info.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
             }
    
}
}elseif ($CF=="banner"){ //Banner管理--------------------------
    
     if($Class=="add"){ //Banner添加
         
         $banner_image=test_input($_POST['banner_image']);
         $banner_url=test_input($_POST['banner_url']);
         $banner_fenlei=test_input($_POST['banner_fenlei']);
         $banner_paixu=test_input($_POST['banner_paixu']);
         $languageID=$_POST['languageID'];
 
         
            if(empty($banner_image) || empty($banner_url) || empty($banner_fenlei)  ){  //判断空字段 

               header("Location:SEMCMS_Banner.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("INSERT INTO sc_banner(banner_image,banner_url,banner_fenlei,languageID,banner_paixu)"
         . "VALUES ('$banner_image','$banner_url','$banner_fenlei','$languageID','$banner_paixu')");
          header("Location: SEMCMS_Banner.php?lgid=".$languageID."&err=001");     
                
            }
         
         
     }elseif($Class=="edit"){  //Banner更新
         
         $banner_image=test_input($_POST['banner_image']);
         $banner_url=test_input($_POST['banner_url']);
         $banner_fenlei=test_input($_POST['banner_fenlei']);
         $banner_paixu=test_input($_POST['banner_paixu']);
         $languageID=$_POST['languageID'];
         $ID=$_POST['ID'];
         $gxtime=date("Y-m-d h:i:s",time()+8*60*60);
 
         
            if(empty($banner_image) || empty($banner_url) || empty($banner_fenlei)  ){  //判断空字段 

               header("Location:SEMCMS_Banner.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("UPDATE sc_banner SET banner_image='$banner_image',banner_url='$banner_url',banner_fenlei='$banner_fenlei',"
                 . "banner_paixu='$banner_paixu',banner_time='$gxtime' where ID=$ID"); 
        header("Location: SEMCMS_Banner.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
         
     }
 
}elseif($Class=="Deleted"){//删除信息    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        $languageID=$_POST['languageID'];
        if ($area_arr==""){
           header("Location:SEMCMS_Banner.php?lgid=".$languageID."&err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_banner  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Banner.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
             }
    
}
}elseif ($CF=="link"){ //友情链接管理--------------------------
    
     if($Class=="add"){ //友情链接添加
         
         $link_name=test_input($_POST['link_name']);
         $link_url=test_input($_POST['link_url']);
         $link_paixu=test_input($_POST['link_paixu']);
         $languageID=$_POST['languageID'];
 
         
            if(empty($link_name) || empty($link_url) || empty($link_paixu)  ){  //判断空字段 

               header("Location:SEMCMS_Link.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("INSERT INTO sc_link(link_name,link_url,link_paixu,languageID)"
         . "VALUES ('$link_name','$link_url','$link_paixu','$languageID')");
          header("Location: SEMCMS_Link.php?lgid=".$languageID."&err=001");     
                
            }
         
         
     }elseif($Class=="edit"){  //友情链接更新
         
         $link_name=test_input($_POST['link_name']);
         $link_url=test_input($_POST['link_url']);
         $link_paixu=test_input($_POST['link_paixu']);
         $languageID=$_POST['languageID'];
         $ID=$_POST['ID'];
         $gxtime=date("Y-m-d h:i:s",time()+8*60*60);
 
         
            if(empty($link_name) || empty($link_url) || empty($link_paixu)  ){  //判断空字段 

               header("Location:SEMCMS_Link.php?type=edit&ID=".$ID."&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("UPDATE sc_link SET link_name='$link_name',link_url='$link_url',link_paixu='$link_paixu',"
                 . "link_time='$gxtime' where ID=$ID"); 
        header("Location: SEMCMS_Link.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
         
     }
 
}elseif($Class=="Deleted"){//删除信息    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        $languageID=$_POST['languageID'];
        if ($area_arr==""){
           header("Location:SEMCMS_Link.php?lgid=".$languageID."&err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_link  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Link.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
             }
    
}
}elseif ($CF=="download"){ //文件下载管理--------------------------
    
     if($Class=="add"){ //文件下载管理添加
         
         $link_name=test_input($_POST['down_name']);
         $link_url=test_input($_POST['down_file']);
         $link_paixu=test_input($_POST['down_paixu']);
         $languageID=$_POST['languageID'];
 
         
            if(empty($link_name) || empty($link_url) || empty($link_paixu)  ){  //判断空字段 

               header("Location:SEMCMS_Link.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("INSERT INTO sc_download(down_name,down_file,down_paixu,languageID)"
         . "VALUES ('$link_name','$link_url','$link_paixu','$languageID')");
          header("Location: SEMCMS_Download.php?lgid=".$languageID."&err=001");     
                
            }
         
         
     }elseif($Class=="edit"){  //文件下载管理更新
         
         $link_name=test_input($_POST['down_name']);
         $link_url=test_input($_POST['down_file']);
         $link_paixu=test_input($_POST['down_paixu']);
         $languageID=$_POST['languageID'];
         $ID=$_POST['ID'];
         $gxtime=date("Y-m-d h:i:s",time()+8*60*60);
 
         
            if(empty($link_name) || empty($link_url) || empty($link_paixu)  ){  //判断空字段 

               header("Location:SEMCMS_Download.php?type=edit&ID=".$ID."&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("UPDATE sc_download SET down_name='$link_name',down_file='$link_url',down_paixu='$link_paixu',"
                 . "down_time='$gxtime' where ID=$ID"); 
        header("Location: SEMCMS_Download.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
         
     }
 
}elseif($Class=="Deleted"){//删除信息    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        $languageID=$_POST['languageID'];
        if ($area_arr==""){
           header("Location:SEMCMS_Download.php?lgid=".$languageID."&err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_download  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Download.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
             }
    
}
}elseif ($CF=="zcansu"){ //综合信息管理--------------------------
    
    
    if($Class=="edit"){
        
        
        $web_name=test_input($_POST['web_name']);
        $web_url=test_input($_POST['web_url']);
        $web_logo=test_input($_POST['web_logo']);
        $web_ico=test_input($_POST['web_ico']);
        $web_copy=test_input($_POST['web_copy']);
        $web_email=test_input($_POST['web_email']);
        $web_skype=test_input($_POST['web_skype']);
        $web_wathsapp=test_input($_POST['web_wathsapp']);
        $web_plist=test_input($_POST['web_plist']);
        $web_nlist=test_input($_POST['web_nlist']);
        $web_iflist=test_input($_POST['web_iflist']);
        $web_inlist=test_input($_POST['web_inlist']);
        $web_meate=trim($_POST['web_meate']);
        $web_tel=test_input($_POST['web_tel']);
        $web_google=test_input($_POST['web_google']);
        $web_share=$_POST['web_share'];
        $web_umail=$_POST['web_umail'];
        $web_pmail=$_POST['web_pmail'];
        $web_dmail=$_POST['web_dmail'];
        $web_smail=$_POST['web_smail'];
        $web_tmail=$_POST['web_tmail'];
        $web_jmail=$_POST['web_jmail'];
        $web_mailopen=$_POST['web_mailopen'];
        if ($web_mailopen=='yes'){
            $web_mailopen=1;
        }else{
            $web_mailopen=0;
        }
        $web_time=date("Y-m-d h:i:s",time()+8*60*60);
             mysql_query("UPDATE sc_config SET web_name='$web_name',web_url='$web_url',web_logo='$web_logo',"
                 . "web_ico='$web_ico',web_copy='$web_copy',web_email='$web_email',web_skype='$web_skype',web_wathsapp='$web_wathsapp',"
                 . "web_plist='$web_plist',web_nlist='$web_nlist',web_inlist='$web_inlist',web_iflist='$web_iflist',web_meate='$web_meate',web_google='$web_google',web_share='$web_share',"
                 . "web_umail='$web_umail',web_pmail='$web_pmail',web_dmail='$web_dmail',web_smail='$web_smail',web_tmail='$web_tmail',"
                 . "web_time='$web_time',web_jmail='$web_jmail',web_tel='$web_tel',web_mailopen='$web_mailopen' where ID=1"); 
               header("Location:SEMCMS_Config.php?err=001"); 
    }
    
    
    
}elseif ($CF=="SeoAndTag"){ //SEO与文字管标签理--------------------------
    
    
    if($Class=="edit"){
        
        $tag_indexkey=test_input($_POST['tag_indexkey']);
        $tag_indexdes=test_input($_POST['tag_indexdes']);
        $tag_prokey=test_input($_POST['tag_prokey']);
        $tag_prodes=test_input($_POST['tag_prodes']);
        $tag_newkey=test_input($_POST['tag_newkey']);
        $tag_newdes=test_input($_POST['tag_newdes']);
        $tag_homeabout=test_input($_POST['tag_homeabout']);
        $tag_contacts=test_input($_POST['tag_contacts']);
        $tag_home=test_input($_POST['tag_home']);
        $tag_about=test_input($_POST['tag_about']);
        $tag_product=test_input($_POST['tag_product']);
        $tag_productcategory=test_input($_POST['tag_productcategory']);
        $tag_news=test_input($_POST['tag_news']);
        $tag_contact=test_input($_POST['tag_contact']);
        $tag_tel=test_input($_POST['tag_tel']);
        $tag_email=test_input($_POST['tag_email']);
        $tag_download=test_input($_POST['tag_download']);
        $tag_message=test_input($_POST['tag_message']);
        $tag_hot=test_input($_POST['tag_hot']);
        $tag_tuijian=test_input($_POST['tag_tuijian']);
        $tag_search=test_input($_POST['tag_search']);
        $tag_title=test_input($_POST['tag_title']);
        $tag_content=test_input($_POST['tag_content']);
        $tag_proxxms=test_input($_POST['tag_proxxms']);
        $tag_proxgcp=test_input($_POST['tag_proxgcp']);
        $tag_newsxg=test_input($_POST['tag_newsxg']);
        $tag_searchms=test_input($_POST['tag_searchms']);
        $tag_messgetj=test_input($_POST['tag_messgetj']);
        $tag_messgets=test_input($_POST['tag_messgets']);
        $tag_more=test_input($_POST['tag_more']);
        $tag_code=test_input($_POST['tag_code']);
        $tag_searchtit=test_input($_POST['tag_searchtit']);
        $tag_inquiry=test_input($_POST['tag_inquiry']);
        $tag_Item=test_input($_POST['tag_Item']);
        $tag_follow=test_input($_POST['tag_follow']);
        $languageID=test_input($_POST['languageID']);
        $tag_time=date("Y-m-d h:i:s",time()+8*60*60);
      
        if (checkstr("sc_tagandseo","languageID",$languageID)==false){ //判断记录是否存在        
        // 添加
        
         mysql_query("INSERT INTO sc_tagandseo(tag_indexkey,tag_indexdes,tag_prokey,tag_prodes,tag_newkey,tag_newdes,"
                 . "tag_home,tag_about,tag_product,tag_productcategory,tag_news,tag_contact,tag_tel,tag_email,tag_download,tag_message,"
                 . "tag_hot,tag_tuijian,tag_search,tag_title,tag_content,tag_proxxms,tag_proxgcp,tag_newsxg,tag_searchms,tag_messgetj,"
                 . "tag_messgets,tag_more,tag_code,tag_searchtit,tag_inquiry,tag_Item,tag_follow,tag_homeabout,tag_contacts,languageID)"
         . "VALUES ('$tag_indexkey','$tag_indexdes','$tag_prokey','$tag_prodes','$tag_newkey','$tag_newdes','$tag_home','$tag_about'"
                 . ",'$tag_product','$tag_productcategory','$tag_news'"
                 . ",'$tag_contact','$tag_tel','$tag_email','$tag_download','$tag_message','$tag_hot'"
                 . ",'$tag_tuijian','$tag_search','$tag_title','$tag_content','$tag_proxxms','$tag_proxgcp','$tag_newsxg','$tag_searchms'"
                 . ",'$tag_messgetj','$tag_messgets','$tag_more','$tag_code','$tag_searchtit','$tag_inquiry','$tag_Item','$tag_follow','$tag_homeabout','$tag_contacts','$languageID')");
        }else{
       
        // 更新     
        mysql_query("UPDATE sc_tagandseo SET tag_indexkey='$tag_indexkey',tag_indexdes='$tag_indexdes',tag_prokey='$tag_prokey',"
                 . "tag_prodes='$tag_prodes',tag_newkey='$tag_newkey',tag_newdes='$tag_newdes',tag_home='$tag_home',tag_about='$tag_about',"
                 . "tag_product='$tag_product',tag_productcategory='$tag_productcategory',tag_news='$tag_news',tag_contact='$tag_contact',tag_tel='$tag_tel',"
                 . "tag_email='$tag_email',tag_download='$tag_download',tag_message='$tag_message',tag_hot='$tag_hot',tag_tuijian='$tag_tuijian',"
                 . "tag_search='$tag_search',tag_title='$tag_title',tag_content='$tag_content',tag_proxxms='$tag_proxxms',tag_proxgcp='$tag_proxgcp',"
                 . "tag_newsxg='$tag_newsxg',tag_searchms='$tag_searchms',tag_messgetj='$tag_messgetj',tag_messgets='$tag_messgets',"
                 . "tag_more='$tag_more',tag_code='$tag_code',tag_searchtit='$tag_searchtit',tag_inquiry='$tag_inquiry',tag_Item='$tag_Item',tag_time='$tag_time',tag_follow='$tag_follow',tag_homeabout='$tag_homeabout',tag_contacts='$tag_contacts' where languageID=$languageID"); 
              
             
        
        }   
             header("Location:SEMCMS_SeoAndTag.php?lgid=".$languageID."&err=001"); 
               
    }
    
    
    
}elseif ($CF=="menu"){ //导航管理--------------------------
    
     if($Class=="add"){ //导航添加
         
         $menu_name=test_input($_POST['menu_name']);
         $menu_link=test_input($_POST['menu_link']);
         $menu_paixu=test_input($_POST['menu_paixu']);
         $menu_xiala=test_input($_POST['menu_xiala']);
         $languageID=$_POST['languageID'];
 
         
            if(empty($menu_name) || empty($menu_link) || empty($menu_paixu)  ){  //判断空字段 

               header("Location:SEMCMS_Menu.php?type=add&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("INSERT INTO sc_menu(menu_name,menu_link,menu_paixu,languageID,menu_xiala)"
         . "VALUES ('$menu_name','$menu_link','$menu_paixu','$languageID','$menu_xiala')");
          header("Location: SEMCMS_Menu.php?lgid=".$languageID."&err=001");     
                
            }
         
         
     }elseif($Class=="edit"){  //导航更新
         
         $menu_name=test_input($_POST['menu_name']);
         $menu_link=test_input($_POST['menu_link']);
         $menu_paixu=test_input($_POST['menu_paixu']);
         $menu_xiala=test_input($_POST['menu_xiala']);
         $languageID=$_POST['languageID'];
         $ID=$_POST['ID'];
         $menu_time=date("Y-m-d h:i:s",time()+8*60*60);
 
         
            if(empty($menu_name) || empty($menu_link) || empty($menu_paixu)  ){  //判断空字段 

               header("Location:SEMCMS_Menu.php?type=edit&ID=".$ID."&lgid=".$languageID."&err=003"); 

            }else{  //写入数据库
                
         mysql_query("UPDATE sc_menu SET menu_name='$menu_name',menu_link='$menu_link',menu_paixu='$menu_paixu',"
                 . "menu_time='$menu_time',menu_xiala='$menu_xiala' where ID=$ID"); 
        header("Location: SEMCMS_Menu.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
         
     }
 
}elseif($Class=="Deleted"){//删除信息    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        $languageID=$_POST['languageID'];
        if ($area_arr==""){
           header("Location:SEMCMS_Menu.php?lgid=".$languageID."&err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_menu  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Menu.php?lgid=".$languageID."&page=".$_GET['page']."&err=001");    
             }
    
}
}elseif ($CF=="user"){ //用户理--------------------------
    
     if($Class=="add"){ //用户添加
         
         $user_name=test_input($_POST['user_name']);
         $user_admin=test_input($_POST['user_admin']);
         $user_ps=  md5(test_input($_POST['user_ps']));
         $user_tel=test_input($_POST['user_tel']);
         $user_email=test_input($_POST['user_email']);

            if(empty($user_name) || empty($user_admin) || empty($user_ps) || empty($user_email)  ){  //判断空字段 

               header("Location:SEMCMS_User.php?type=add&err=003"); 

            }else{  //写入数据库
                
         mysql_query("INSERT INTO sc_user(user_name,user_admin,user_ps,user_tel,user_email)"
         . "VALUES ('$user_name','$user_admin','$user_ps','$user_tel','$user_email')");
          header("Location: SEMCMS_User.php?lgid=".$languageID."&err=001");     
                
            }
         
         
     }elseif($Class=="edit"){  //用户更新
         
         $user_name=test_input($_POST['user_name']);
         $user_admin=test_input($_POST['user_admin']);
         $user_ps=md5(test_input($_POST['user_ps']));
         $user_tel=test_input($_POST['user_tel']);
         $user_email=test_input($_POST['user_email']);
         $ID=$_POST['ID'];
         $user_time=date("Y-m-d h:i:s",time()+8*60*60);
 
         
          if(empty($user_name) || empty($user_admin) || empty($user_email)    ){  //判断空字段 

               header("Location:SEMCMS_User.php?type=edit&ID=".$ID."&err=003"); 

            }else{  //写入数据库
                
        if ($_POST['user_ps']==""){   //  密码为空不修改   
         mysql_query("UPDATE sc_user SET user_name='$user_name',user_admin='$user_admin',"
        . "user_email='$user_email',user_time='$user_time' where ID=$ID"); 
         
        }else{
            
         mysql_query("UPDATE sc_user SET user_name='$user_name',user_admin='$user_admin',user_ps='$user_ps',"
        . "user_email='$user_email',user_time='$user_time' where ID=$ID");   
        }
         
        header("Location: SEMCMS_User.php?page=".$_GET['page']."&err=001");    
         
     }
 
}elseif($Class=="Deleted"){//删除信息    
        $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
 ;
        if ($area_arr==""){
           header("Location:SEMCMS_User.php?err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_user  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_User.php?page=".$_GET['page']."&err=001");    
             }
    
}
}elseif ($CF=="fenpei"){ //权限分配
    
        $area_arr = array(); 
        $area_arr = $_POST["ID"]; 
        $uid=$_POST['uid'];
        if ($area_arr==""){
           header("Location:SEMCMS_User.php?err=005");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("UPDATE sc_user SET user_qx='$area_arr' WHERE ID=$uid");
                header("Location:SEMCMS_User.php?&err=001");    
             }
      
    
}elseif ($CF=="users"){  //用户登陆
 
   if($Class=="login"){//登陆   
       
       $US=test_input($_POST['UserName']);
       $PS=test_input($_POST['UserPass']);
     
        if(empty($US) || empty($PS) ){ 
           echo "<script language='javascript'>alert('账号或密码不能为空!');top.location.href='index.html';</script>";   
        }else{
             $PS=md5($PS);
            $sql="select * from sc_user where user_admin='$US' and user_ps='$PS'"; 
            $result=mysql_query($sql); 
            $row = mysql_fetch_array($result,MYSQL_ASSOC); 

            if (!mysql_num_rows($result)) 
                { 

          echo "<script language='javascript'>alert('账号或密码错误!');top.location.href='index.html';</script>";

                } 
            else 
                {   
              
                  setcookie("scusername", $row['user_name'],time()+3600*24,"/");
                  setcookie("scuser", $row['user_ps'],time()+3600*24,"/");//设定时间为2个小时
                  setcookie("scuserqx", $row['user_qx'],time()+3600*24,"/");//设定时间为2个小时
                  header("Location:SEMCMS_Main.php");  
          
                 
                }      

        
        }   
       
   }elseif($Class=="loginout"){//退出
       setcookie("scusername", "",time()-3600*24,"/");
       setcookie("scuser", "", time()-3600*24,"/");
       setcookie("scuserqx", "",time()-3600*24,"/");
       header("Location:index.html");  
       
   }
    
    
}elseif ($CF=="template"){ //模版应用
    
   // checkqx("../../semcms");权限检测
    
    // 更新模版标记
    
     mysql_query("UPDATE sc_config SET web_Template ='".$_GET['mb']."' where ID=1");   
     
     //开始应用模版
        
        $template="about.php,index.php,news.php,info.php,product.php,view.php,search.php,contact.php,.htaccess,sitemap.xml,download.php";
        $template_mb=explode(",",$template);
        for($i=0;$i<count($template_mb);$i++) {
 
        $template_o = file_get_contents('../Templete/'.$_GET['mb'].'/Include/'.$template_mb[$i]);
        $templateUrl = '../'.$template_mb[$i];
        $LanguageID=1;
        $dirpaths="./";
        if ($template_mb[$i]=="sitemap.xml"){
         $output = str_replace('<{xml}>', xmltogoogle($LanguageID,$web_url), $template_o);   
        }else{
        $output = str_replace('<{Language}>', $LanguageID, $template_o);
        $output = str_replace('<{Template}>', $_GET['mb'], $output);
        $output = str_replace('<{dirpaths}>', $dirpaths, $output);
        }  
        
        file_put_contents($templateUrl, $output);
 
        }
    // header("Location:SEMCMS_Template.php?&err=001");  
    
}elseif ($CF=="Inquriy"){//询盘管理
    
   if ($Class=="Deleted"){
       $area_arr = array(); 
        $area_arr = $_POST["AID"]; 
        if ($area_arr==""){
           header("Location:SEMCMS_Inquiry.php?err=004");  
           }else{
               $area_arr = implode(",",$area_arr); //接收到数据用,链接
                mysql_query("delete from sc_msg  WHERE ID in ($area_arr)");
                header("Location:SEMCMS_Inquiry.php?page=".$_GET['page']."&err=001");    
             } 
       
   } 
    
}
 
 


