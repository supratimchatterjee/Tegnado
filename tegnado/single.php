<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package tegnado
 */

get_header(); ?>
<div class="wrapper">
<?php if ( have_posts() ) :?>
	<?php while ( have_posts() ) : the_post();?>
    <div class="home_wrap">
    	<article id="ajax-container" class="section_post">
		<h2><?php the_title();?></h2>
         <?php if( get_post_format() == 'video' ) : ?>
        <?php the_field('video');?>
        <?php elseif( get_post_format() == 'image' ) : ?>
        	
			<?php $full_preview = get_field('image'); ?>
            <?php $full_preview = wp_get_attachment_image_src($full_preview, 'full'); ?>
            <?php $full_preview = $full_preview[0]; ?>
            <img src="<?php echo $full_preview; ?>">
            
            
        <?php elseif( get_post_format() == 'aside' ) : ?>
        <?php
			$large_image = get_field('preview_image');
			$large_image = wp_get_attchment_image_src($large_image, 'large_image'); 
			$large_image = $large_image[0];
		?>
         <a href="<?php the_field('pdf');?>">
         	<?php if($large_image):?>
            	<img src="<?php echo $large_image; ?>">
            <?php else:?>
         	   <img src="<?php echo get_template_directory_uri(); ?>/images/pdfIcon1.jpg">
            <?php endif;?>
         </a>
        <?php endif;?>
        <span class="post_meta"><?php the_tags( '#', ' #', ' ' ); ?> </span>
        <?php the_content();?>
        </article>
    </div>
	<?php endwhile;?>
<?php endif;?>

<div>
	
<?php
get_footer();
