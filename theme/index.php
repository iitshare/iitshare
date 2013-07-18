<?php
get_header(); ?>
	<div id="container">
    	<div class="content">
			<?php $options = get_option('xiaohan_options'); if ($options['notice'] && $options['notice_content']) : ?>
			<div class="notice">
				<p><span>公告：</span><?php echo($options['notice_content']); ?></p>
			</div>
			<?php endif; ?>
        	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<?php if(is_sticky()) : ?>
            <div class="sticky" id="post-<?php the_ID(); ?>">
            	<h2>[置顶] <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
            </div>
            <?php else : ?>
            <div class="post" id="post-<?php the_ID(); ?>">
            	<div class="date"><span><?php the_time(__('Y')) ?></span><span class="f"><?php the_time(__('n')) ?>月<?php the_time(__('j')) ?></span></div>
            	<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="info">
                    <span>分类：<?php the_category(','); ?> | </span>
                    <span>标签：<?php the_tags('', ', ', ''); ?>  </span>
					<!-- 开启此代码，需要安装wp-postviews插件 -->
					<span> | 浏览：<?php the_views(); ?>					
					<?php if ($options['author']) : ?><span class="author"><?php the_author_posts_link(); ?></span><?php endif; ?>
                    <?php edit_post_link(编辑, '','&raquo;'); ?>
                    <span class="comments"><?php comments_popup_link('<em>0</em> Comments', '<em>1</em> Comment', '<em>%</em> Comments', 'Comments off'); ?></span>
					<div class="clear"></div>
				</div>
				<div class="intro">
				<!--原先的内容输出the_excerpt();-->
					<?php if(is_category() || is_archive() || is_home() ) {
						the_content(__('Read more...', 'didiaoandhuali'));
						} else {
							the_content('Read the rest of this entry &raquo;'); 
					} 
					?>
				</div>
            </div>
<?php endif; ?>
            <?php endwhile;else : ?>
            <div class="errorbox">
            	<?php _e('Sorry, no posts matched your criteria.', 'xiaohan'); ?>
			</div>
            <?php endif; ?>
            <?php xiaohan_pagination($query_string); ?>
			<div class="clear"></div>
		</div><!-- #content -->
        <?php get_sidebar(); ?>
	</div><!-- #container -->
<?php get_footer(); ?>
