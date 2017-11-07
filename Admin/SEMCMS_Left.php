<?php include_once 'SEMCMS_Top_include.php'; ?>
 
<script src="SC_Page_Config/Js/jquery-1.1.3.1.pack.js"></script>
<script>
	$(document).ready(function(){
		$("dd:not(:first)").hide();
		$("dt a").click(function(){
			$("dd:visible").slideUp("slow");
			$(this).parent().next().slideDown("slow");
			return false;
		});
	});
	</script>
<body bgcolor="#404040">
<div class="back_left">
  <div class="back_left_c" id="lefts">
 <?php echo onefenlei($_COOKIE["scuserqx"]); ?>
          <dl>
        <dt class="back_left_top"><img src="SC_Page_Config/Image/left.jpg" align="absmiddle" /><a href='SEMCMS_language.php' target="mainFrame">语种管理</a></dt>
        <dd><ul> <?php echo languagefenlei($_COOKIE["scuserqx"]); ?>
             
            </ul></dd>
 
    </dl>
      <dl>
    <dt class="back_left_top"><img src="SC_Page_Config/Image/left.jpg" align="absmiddle" /><a href='SEMCMS_Cj.php' target="mainFrame">插件与模版</a></dt>   
    <dd><ul><li><img src="SC_Page_Config/Image/left2.jpg"> <a href='SEMCMS_Cj.php' target="mainFrame">插件与模版</a></li></ul></dd>
      </dl>
  </div>
  <div class="cb"></div>
</div>
</body>
</html>