	<div class="sidebar">
		<?php if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>


<div class="block search_form">
        	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
        </div>
		<div class="block rad">
        	<?php $options = get_option('xiaohan_options'); if ($options['showcase_title']) : ?>
			<h3><?php echo($options['showcase_title']); ?></h3>
			<?php endif; ?>
        	<?php $options = get_option('xiaohan_options'); if ($options['showcase_content']) : ?>
			<div class="rad_c"><?php echo($options['showcase_content']); ?></div>
			<?php endif; ?>
		</div>
        <div class="block feed_form">

 
        	<h3>RSS <?php _e('Feed', 'xiaohan'); ?></h3>
            <ul>
                <li><a rel="external nofollow" title="<?php _e('Subscribe with ', 'xiaohan'); _e('Zhua Xia', 'xiaohan'); ?>" href="<?php $options = get_option('xiaohan_options'); if ($options['feed_url_email']) {echo($options['feed_url_email']);} else  bloginfo('rss2_url'); ?>" target="_blank"><img src="http://www.taobaoting.net/wp-content/uploads/2011/10/RSS.gif" alt="<?php _e('Subscribe with ', 'xiaohan'); _e('Zhua Xia', 'xiaohan'); ?>" /></a></li>
            </ul>
        </div>
        
        <div class="block">
        	<h3>
			<?php
			if (is_single()) {
			echo _e('最新文章', 'xiaohan');
			} else {
			echo _e('随机文章', 'xiaohan');
			}
			?>
    		</h3>
        	<ul>
            	<?php
				if (is_single()) {
					$posts = get_posts('numberposts=10&orderby=post_date');
				} else {
					$posts = get_posts('numberposts=10&orderby=rand');
				}
				foreach($posts as $post) {
					setup_postdata($post);
					echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
				}
				$post = $posts[0];
				?>
            </ul>
        </div>
        <div class="block"><h3><?php _e('最受欢迎文章', 'xiaohan'); ?></h3>
        	<ul>
            	<?php $result = $wpdb->get_results("SELECT comment_count,ID,post_title,post_date FROM $wpdb->posts where post_type <> 'page' ORDER BY comment_count DESC LIMIT 0 , 10"); 
				foreach ($result as $topten) { 
				$postid = $topten->ID; 
				$title = $topten->post_title;
				$post_date = $topten->post_date;
				$commentcount = $topten->comment_count; 
				if ($commentcount != 0) { ?> 
                <li><span><?php echo $post_date; ?></span><a href="<?php echo get_permalink($postid); ?>" title="<?php echo $title ?>"><?php echo $title ?></a></li> 
				<?php } } ?>
            </ul>
        </div>
        <div class="block comment"><h3><?php _e('最新评论' ,'xiaohan'); ?></h3>
        	<ul>
            	<?php
                global $wpdb;
				$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,comment_post_ID, comment_author, comment_date_gmt, comment_approved, comment_type,comment_author_url, SUBSTRING(comment_content,1,25) AS com_excerpt FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' ORDER BY comment_date_gmt DESC LIMIT 10";
				$comments = $wpdb->get_results($sql);
				$output = $pre_HTML;
				foreach ($comments as $comment) {
					$output .= "\n<li class=\"new\">" . $comment->comment_author . "  评论道：<br /> <a href=\"" . get_permalink($comment->ID) . "#comment-" . $comment->comment_ID . "\" title=\"". $comment->comment_author. ":" . $comment->post_title . "\">" . strip_tags($comment->com_excerpt) ."</a></li>";
					}
					$output .= $post_HTML;
					echo $output;
				?>

                
            </ul>
        </div>

        <!-- tag cloud -->
        <?php if (!is_single()) : ?>
		<div class="block" id="tag_cloud"><h3><?php _e('Tag Cloud' ,'xiaohan'); ?></h3>
            <p><?php wp_tag_cloud('smallest=8&largest=16'); ?></p>
        </div>
		<?php endif; ?>
        <?php  if ( is_home() || is_page() ) { ?>
        <div class="block links"><h3><?php _e('Blogroll', 'xiaohan'); ?></h3>
        	<ul>
            	<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
            </ul>
        </div>
		<?php } ?>
        <?php endif; ?>
        
         <?php
	// A second sidebar for widgets, just because.
	if ( is_active_sidebar( 'secondary-widget-area' ) ) : ?>

		<?php dynamic_sidebar( 'secondary-widget-area' ); ?>
		<!-- #secondary .widget-area -->

<?php endif; ?>
	
	<div class="block">
		<h3>站点统计</h3>
		<li>文章数：<?php $count_posts = wp_count_posts(); echo $published_posts = $count_posts->publish; ?></li>
		<li>评论数：<?php $total_comments = get_comment_count(); echo $total_comments['approved'];?> </li>
		<!-- 开启此代码，需要安装post-views插件 
		<li>访问量：<?php #get_totalviews(true, true, true); ?> </li>
		-->
	</div>
	
</div>  
	
	