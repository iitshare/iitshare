<div class="clear"></div>
<div id="footer">
    <div class="foot">
    	<a id="gotop" href="javascript:void(0);" onclick="MGJS.goTop();return false;"><?php _e('Top', 'xiaohan'); ?></a>
    	<div class="copy">
		<p>
			<?php _e('Copyright &copy; ', 'xiaohan');?> 2012 
			<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?>
			</a>
			<br />
			<?php $options = get_option('xiaohan_options'); if ($options['stat_content']) : ?>  <?php echo($options['stat_content']); ?><?php endif; ?> 京ICP备12024639号-3
		</p>
		</div>
		<?php wp_footer(); ?>
	</div>
</div>
</body>
</html>
