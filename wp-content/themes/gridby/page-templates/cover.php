<?php

/*

Template Name: Cover

*/

?>
<?php get_header(); ?>	
					
	<!-- seo title home -->
	<h1 class="home-title"><?php bloginfo('name'); ?> -  <?php bloginfo('description'); ?></h1>
	
	
	<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
	
		<div class="cover">
			
			
			<?php 
							
			/* Image */
			
			$image_url =  wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'big' );

			?>

			<div class="fill" style="background-image: url(<?php echo $image_url[0]; ?>); background-position: center center; -webkit-background-size: cover; -moz-background-size: cover; background-size: cover; -o-background-size: cover;"></div> 
			<div class="fill-color"></div>

			<div class="container-caption">
				<div class="cover-caption">
					<?php the_content(); ?>
				</div>
			</div>   
			
			
			
		</div>
			
		
							
	<?php endwhile; ?>
    <?php else : ?>

            <p><?php _e('Sorry, no posts matched your criteria.', 'gridby'); ?></p>
     
    <?php endif; ?>        

	
	
	
<?php get_footer(); ?>
