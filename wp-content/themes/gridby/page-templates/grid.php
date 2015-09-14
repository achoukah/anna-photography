<?php

/*

Template Name: Grid

*/

?>
<?php get_header(); ?>	

<div class="container">
					
	<div class="col-md-12 container-grid">
		
		<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
		
			<div class="row">
				
				<div class="col-md-8 col-md-offset-2 margin-bottom intro-grid">
				
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
						
					<h1><?php the_title(); ?></h1>
					
					
					<a href="<?php the_permalink(); ?>">
					    <?php the_post_thumbnail('single', array('class' => 'list-cover','alt' => get_the_title())); ?>
					</a>
					
					
					<?php the_content();?>	
		
					</div>	
					
				</div>
					
			</div>
				
			
		<?php endwhile;  else : ?>
            
            <p><?php _e('Sorry, no posts matched your criteria.', 'gridby'); ?></p>
            
        <?php endif;  wp_reset_query(); ?> 	
        


        <div style="position: relative; overflow: hidden;" class="mos-container isotope margin-bottom">
        
          	<?php // Loop Works
          	
          	$loop = new WP_Query( array( 
				    	'post_type' => 'fb_contents', 
				    	'posts_per_page' => 100,
				    	'orderby' => 'menu_order',
				    	'order' => 'ASC', 
				    )); 
				    
			$counter = 0; 
	        $counter_print_pair = 0;	    
				    
			?>
		    	 
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
			
			<?php // Size Item Grid
				
			$size_block = '';		
			$counter++; 
					
			/* count 1 block every 2 items */ 
			
		    if ($counter % 2 == 0) {    
			    $counter_print_pair++;
		    }  
		     
		    /* add w2 only even blocks */ 
		    
		    if($counter_print_pair % 2 == 1) {
			    
			    $size_block = 'item-w2 item-sm-w2';
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'horizontal' );

		    } else {
			    
			    $size_block = 'item-w1 item-sm-w2 item-sm-h2';
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'quad' );

		    }
		    
		    /* Video Image */
		    
		    $video = get_post_meta($post->ID, 'fb_video', true );
		    
		    if ( has_post_thumbnail() ) { 
			    
			    $image_url_item = $image_url[0];
			    
			    
		    } elseif ($video != ''){
			    
			     $image_url_item = video_image($video, 'hd');
		    }

			?>


			<div class="mos-item block-<?php echo $post->ID; ?> <?php echo $size_block; ?>">
				

				
				<div class="bg-img animate" style="background-image: url(<?php echo $image_url_item; ?>)"></div>

				<a class="mos-panel animate" href="<?php the_permalink(); ?>">

					<div class="mos-inner">

						<h2 class="mos-title"><?php the_title(); ?></h2>
						
						<div class="sep-line"></div>
						
						<?php echo wpautop(get_post_meta( get_the_ID(), 'meta-textarea-subtit', true ), true);?> 
						
						<?php if ($video != ''){ echo '<i class="fa fa-play-circle"></i>'; }?>
					
					</div>

				</a>

			</div>
			
			<?php endwhile; wp_reset_query(); ?>
		
        </div>
        
	</div>
	
</div>
	
	
<?php get_footer(); ?>
