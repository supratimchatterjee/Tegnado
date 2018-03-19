<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package tegnado
 */

get_header(); ?>


<div class="wrapper"><!--wrapper-->
	<div id="single-popup"></div>
	<div class="left_content">
    	<?php if ( have_posts() ) : ?>
    	<div class="archive_info">
        	<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
			?>
        </div>
        <?php while ( have_posts() ) : the_post(); ?>
            <?php $archive_thumb = get_field('image'); ?>
            <?php $archive_thumb = wp_get_attachment_image_src($archive_thumb, 'overview_image'); ?>
            <?php $archive_thumb = $archive_thumb[0]; ?>
            <div class="overview_module">
            	<div class="overlay_wrap">
                <h4><?php the_title(); ?></h4>
                <?php if( get_post_format() == 'video' ) : ?>
					<?php the_field('video');?>
                <?php elseif( get_post_format() == 'image' ) : ?>
                  <img src="<?php echo $archive_thumb;?>">
                <?php elseif( get_post_format() == 'aside' ) : ?>
					<?php $preview_image = get_field('preview_image');
                        $preview_image = wp_get_attchment_image_src($preview_image, 'overview_image'); 
                        $preview_image = $preview_image[0];
                    ?>
                 <div class="image">
					 <?php if($preview_image):?>
                        <img src="<?php echo $preview_image; ?>">
                    <?php else:?>
                       <img src="<?php echo get_template_directory_uri(); ?>/images/pdf_thumb.jpg">
                    <?php endif;?>
                 </div>
                <?php endif;?>
                <a class="post-link" href="<?php the_permalink();?> #ajax-container"></a>
                </div>
                <?php the_tags( '#', ' #', ' ' ); ?>
            </div>
        
       	<?php endwhile; ?>
       		<?php wp_pagenavi(); ?>
       	<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
    	<?php endif; ?>
    </div>
    
   
   <?php get_sidebar(); ?>

</div><!--wrapper-->

<?php
get_footer();
