<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php if (is_home () ) { bloginfo('name'); } elseif (is_category() || is_tag()) { single_cat_title(); echo ' &bull; ' ; bloginfo('name'); } elseif (is_single() || is_page()) { single_post_title(); } else { wp_title('',true); } ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="http://www.linux-group-policy.com/wp-content/uploads/2012/02/lgpico.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="site">
<div id="wrap">
<div id="toplist">
    <div class="feed"><a href="<?php bloginfo('rss2_url'); ?>" title="RSS">RSS</a></div>
</div>
<div id="header" style="display:table-cell; vertical-align:middle">
	<h1><img src='http://www.linux-group-policy.com/wp-content/uploads/2012/02/lgp11.png' align="middle" /> &nbsp; <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>" name="top"><?php bloginfo('name'); ?></a> <span><?php bloginfo('description'); ?></span></h1>
</div>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Submenu') ) : ?><?php endif; ?>
<div id="blog">