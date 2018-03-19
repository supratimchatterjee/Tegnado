<?php
/**
	Template Name: Home
 */

get_header(); ?>

<?php if ( have_posts() ) :?>
<?php while ( have_posts() ) : the_post();?>
    
  <div class="home_wrap"><!--home_wrap-->
  	
 <?php
$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
 if(!$page) $page = 1; /*this is only for pagination if required*/
$args = array(
 'post_type'         =>  'post',
 'posts_per_page'    =>  3,
 'paged'    =>  $page
 
);

$query = new WP_Query($args);
if ($query->have_posts()) :
 while ($query->have_posts()) : $query->the_post();
 $id    =    $query->post->ID; 
?>
	<?php $full_preview = get_field('image'); ?>
	<?php $full_preview = wp_get_attachment_image_src($full_preview, 'full'); ?>
    <?php $full_preview = $full_preview[0]; ?>
    <article class="section_post">
        <a href="<?php the_permalink(); ?>"><h2><?php the_title();?></h2></a>
        <?php if( get_post_format() == 'video' ) : ?>
        <?php the_field('video');?>
        <?php elseif( get_post_format() == 'image' ) : ?>
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
        	 <?php
                    $trimcontent = apply_filters('the_content', get_post_field('post_content', $choose_pet));
                    $shortcontent = wp_trim_words( $trimcontent, $num_words = 40, $more = '' );
                    echo '<p>' . $shortcontent . '</p>';
                  ?>
        <div class="post_icon"><a href="<?php the_permalink(); ?>"><img src="<?php the_field('icon');?>"></a></					      	div>
    </article>     
<?php endwhile; ?>
<?php wp_pagenavi( array( 'query' => $query ) ); ?>
<?php endif; wp_reset_query(); ?>
</div>

<?php endwhile;?>
<?php endif;?>

<?php
get_footer();
