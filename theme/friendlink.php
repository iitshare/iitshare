<?php
/*
Template Name: 友情链接 - 模板
*/
?>
<?php get_header(); ?>
<div id="container" class="article">
    	<div class="content">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post single" id="post-<?php the_ID(); ?>">
				<h2><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <div class="con" id="a<?php the_ID(); ?>">
                	<?php the_content(); ?>
                    <div class="clear"></div>
				</div>
                <div class="page_links">
                    <h3><?php the_title(); ?></h3>
                    <ul class="flink">
                        	<?php wp_list_bookmarks('orderby=id&title_li=&title_before=&title_after=&categorize=0'); ?> 
                    </ul>
                </div>
            </div>
            <?php endwhile;else : ?>
            <div class="errorbox">
            	<?php _e('Sorry, no posts matched your criteria.', 'xiaohan'); ?>
			</div>
            <?php endif; ?>
            <div class="comment_box">
            	<?php
	if (function_exists('wp_list_comments')) {
		comments_template('', true);
	} else {
		comments_template();
	}
?>
            </div>

        </div>

        <?php get_sidebar(); ?>

    </div>
<?php get_footer(); ?>