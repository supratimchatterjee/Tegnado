<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tegnado
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-spy="scroll">
<div class="search_panel"><!--search_panel-->
	<div class="wrapper">
        <div class="search_box">
       	 	<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                 <input type="text" size="20" name="s" id="s" value="<?php _e('Search') ?>..."  onblur="if(this.value=='') this.value='<?php _e('Search') ?>...';" onfocus="if(this.value=='<?php _e('Search') ?>...') this.value='';"/>
                </form>
        	
            </div>
    </div>
</div><!--search_panel-->

<div class="main_body_content"><!--main_body_content-start-->
<header><!--header-->
	<div class="wrapper">
    	<div class="logo"><a href="<?php bloginfo( 'url' ); ?>"><img src="<?php the_field('logo','option');?>" alt="Tegnado"></a></div>
        <div class="nav">
        	<ul>
            	<li class="tv-menu"><a href="<?php the_field('first_menu_link','option');?>"></a></li>
                <li class="hand-menu"><a href="<?php the_field('second_menu_link','option');?>"></a></li>
                <li class="skall-menu"><a href="<?php the_field('third_menu_link','option');?>"></a></li>
            </ul>
        </div>
        <div class="search_btn"><a class="search-icon" href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/search-icon.png"></a></div>
    </div>
</header><!--header-->