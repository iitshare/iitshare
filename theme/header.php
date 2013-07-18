<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php 
	global $page, $paged;
	wp_title( '|', true, 'right' );
	bloginfo( 'name' );
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyten' ), max( $paged, $page ) );
?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php $options = get_option('xiaohan_options'); if ($options['feed_url']) {echo($options['feed_url']);} else  bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/images/base.js"></script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
	<div id="header">
    	<div id="blog_title">
        	<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
        	<p><?php bloginfo('description'); ?></p>
            <div class="banner">
				
            </div>
                </div>
        <div id="nav">
        	<?php wp_nav_menu('container=\'\'&menu_id=menu&title_li=&link_before=<span>&link_after=</span>'); ?>

			        </div>
    </div>
