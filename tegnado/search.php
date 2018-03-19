<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package tegnado
 */

get_header(); ?>


<div class="wrapper"><!--wrapper-->
	<div id="single-popup"></div>
	<div class="left_content">
    	<?php if ( have_posts() ) : ?>
        <div class="archive_info">
        	<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'tegnado' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
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
                 <img src="<?php echo get_template_directory_uri(); ?>/images/pdf_thumb.jpg">
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
