<?php get_header(); ?>
	<div id="container">
    	<div class="content">
        	<div class="box"><?php printf( __('Keyword: &#8216;%1$s&#8217;', 'xiaohan'), wp_specialchars($s, 1) ); ?> <?php _e('Search Results', 'xiaohan'); ?></div>
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="post" id="post-<?php the_ID(); ?>">
            	<div class="date"><span><?php the_time(__('Y')) ?></span><span class="f"><?php the_time(__('F')) ?><?php the_time(__('j')) ?></span></div>
            	<h2><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<div class="info">
                    <span>分类：<?php the_category(','); ?> | </span>
                    <span>标签：<?php the_tags('', ', ', ''); ?> | </span>
					<span>浏览：<?php the_views(); ?> 
					<?php if ($options['author']) : ?><span class="author"><?php the_author_posts_link(); ?></span><?php endif; ?>
                    <?php edit_post_link(__('Edit', 'xiaohan'), '','&raquo;'); ?>
                    <span class="comments"><?php comments_popup_link('<em>0</em> Comments', '<em>1</em> Comment', '<em>%</em> Comments', 'Comments off'); ?></span>
					<div class="clear"></div>
				</div>
				<div class="intro">
					<?php if(is_category() || is_archive() || is_home() || is_search() ) {
						the_excerpt();
						} else {
							the_content('Read the rest of this entry &raquo;'); 
					} 
					?>
				</div>
            </div>
            <?php endwhile;else : ?>
            <div class="errorbox">
            	<p><?php _e('Sorry, no posts matched your criteria.', 'xiaohan'); ?></p>
                <?php get_search_form(); ?>
			</div>
            <?php endif; ?>
            <?php xiaohan_pagination($query_string); ?>
		</div><!-- #content -->
        <?php get_sidebar(); ?>
	</div><!-- #container -->
    
<?php get_footer(); ?>
