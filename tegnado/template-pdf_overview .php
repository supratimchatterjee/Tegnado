<?php
/**
 Template Name: Pdf Overview
 */

get_header(); ?>
<div class="wrapper"><!--wrapper-->
	<div id="single-popup"></div>
	<div class="left_content">
    	
		<?php
        $page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
        if(!$page) $page = 1; /*this is only for pagination if required*/
        $args = array(
			'post_type'         =>  'post',
			'posts_per_page'    =>  10,
			'paged'    =>  $page,
			'tax_query' => array( 
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array('post-format-aside')
			   ) 
		   )
        
        );
        
        $query = new WP_Query($args);
        if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
        $id    =    $query->post->ID;
		$preview_image = get_field('preview_image');
		$preview_image = wp_get_attchment_image_src($preview_image, 'overview_image'); 
		$preview_image = $preview_image[0];
        ?>
        
        	<div class="overview_module">
           	 <div class="overlay_wrap">
                <h4><?php the_title(); ?></h4>
                <?php if($preview_image):?>
                    <img src="<?php echo $preview_image; ?>">
                <?php else:?>
                   <img src="<?php echo get_template_directory_uri(); ?>/images/pdf_thumb.jpg">
            	<?php endif;?>
                <a class="post-link" href="<?php the_permalink();?> #ajax-container"></a>
                </div>
                
                <?php the_tags( '#', ' #', ' ' ); ?>
            </div>
        
        <?php endwhile; ?>
        <?php wp_pagenavi( array( 'query' => $query ) ); ?>
        <?php endif; wp_reset_query(); ?>
        
    
    	
        
       
    </div>
     <?php get_sidebar(); ?>
</div>

<?php
get_footer();
