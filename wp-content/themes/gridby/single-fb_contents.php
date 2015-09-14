<?php get_header(); ?>

<div class="container">

	<div class="col-md-8 col-md-offset-2">
		<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
			<div class="page-content">	
			
				<h1 class="intro-title"><?php the_title(); ?></h1>
				
				<div class="sep-line"></div>
				
				<p class="sub-title"><?php echo get_post_meta( get_the_ID(), 'meta-textarea-subtit', true );?></p>	
			    
			    <?php the_post_thumbnail('single', array('class' => 'single-cover','alt' => get_the_title())); ?>
			    
				<?php the_content('Leggi...');?>
				

			</div>
		<?php endwhile; ?>
	    <?php else : ?>
	        
	        <p><?php _e('Sorry, no posts matched your criteria.', 'gridby'); ?></p>
	
	    <?php endif; ?>
	</div>
	
</div>
	
	

<?php get_footer(); ?>
