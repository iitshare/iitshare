<?php get_header(); ?>
	<div id="container" class="article">
	 <?php get_sidebar(); ?>
    	<h1>哎哟～404了～休息一下，玩玩这个游戏！</h1>
	<div style="margin:10px 0 0 10px;font-size:14px">
		<span>游戏玩法</span>
		<span>：将猫困在一个深色原点围成的圈子里面就算成功了。</span>
	</div>
  <embed type="application/x-shockwave-flash" width="600" height="400" src="http://www.coderli.com/images/onecoderzhuamao.swf" wmode="transparent" quality="high" scale="noborder" flashvars="width=600&amp;height=400" allowscriptaccess="sameDomain" align="L"></embed>
<h2><em>404 Error</em>: 抱歉, 您所查找的页面不存在, 可能已被删除或您输错了网址!</h2>
<div style="margin: 5px 0 0 10px">
<span style="font-size: 14px;" >您也可以随便看看</span>
<?php
		if(function_exists('wp23_related_posts')) {//判断插件是否存在,如存在才输出
			echo '<div id="related_posts">';
			wp23_related_posts();
			echo '</div>';
			echo '<div class="fixed"></div>';
		}
	?>
</div>
<?php get_footer(); ?>