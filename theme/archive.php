<?php get_header(); ?>
	<div id="container">
    	<div class="content">
        	<?php if (is_search()) : ?>
			<div class="box"><?php printf( __('Keyword: &#8216;%1$s&#8217;', 'xiaohan'), wp_specialchars($s, 1) ); ?> <?php _e('Search Results', 'xiaohan'); ?></div>
            <?php else : ?>
            <div class="box">
            	<?php
				// If this is a category archive
				if (is_category()) {
					printf( __('Archive for the &#8216;%1$s&#8217; Category', 'xiaohan'), single_cat_title('', false) );
				// If this is a tag archive
				} elseif (is_tag()) {
					printf( __('Posts Tagged &#8216;%1$s&#8217;', 'xiaohan'), single_tag_title('', false) );
				// If this is a daily archive
				} elseif (is_day()) {
					printf( __('Archive for %1$s', 'xiaohan'), get_the_time(__('F jS, Y', 'xiaohan')) );
				// If this is a monthly archive
				} elseif (is_month()) {
					printf( __('Archive for %1$s', 'xiaohan'), get_the_time(__('F, Y', 'xiaohan')) );
				// If this is a yearly archive
				} elseif (is_year()) {
					printf( __('Archive for %1$s', 'xiaohan'), get_the_time(__('Y', 'xiaohan')) );
				// If this is an author archive
				} elseif (is_author()) {
					_e('Author Archive', 'xiaohan');
				// If this is a paged archive
				} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
					_e('Blog Archives', 'xiaohan');
				}
				?>
			</div>
			<?php endif; ?>
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
					<?php if(is_category() || is_archive() || is_home() ) {
						the_excerpt();
						} else {
							the_content('Read the rest of this entry &raquo;'); 
					} 
					?>
				</div>
            </div>
            <?php endwhile;else : ?>
            <div class="errorbox">
            	<?php _e('Sorry, no posts matched your criteria.', 'xiaohan'); ?>
			</div>
            <?php endif; ?>
            <?php xiaohan_pagination($query_string); ?>
        </div>
        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>