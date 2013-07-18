<?php
/*Template Name: page-allpost*/
?> 




<?php get_header(); ?>
	<div id="container" class="article">
    	<div class="content">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post single" id="post-<?php the_ID(); ?>">
				<h2><a class="title" href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                <div class="con" id="a<?php the_ID(); ?>">
                	<?php the_content(); ?>

<div id="page-allpost">
     <table>
<?php $count_posts = wp_count_posts(); $published_posts = $count_posts->publish;
     query_posts( 'posts_per_page=-1' );        

     while ( have_posts() ) : the_post();

         echo '<tr>';
         echo '<td>'.$published_posts.'</td>';


         echo '<td width="120">';
     
         the_time(get_option( 'date_format' ));
         echo '</td><td><a href="';
         the_permalink();
         echo '" title="'.esc_attr( get_the_title() ).'">';
         the_title();
         echo '</a></td></tr>';
         $published_posts--;
     endwhile;
     wp_reset_query(); ?>
     </table>
 </div> 


                    <div class="clear"></div>
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
