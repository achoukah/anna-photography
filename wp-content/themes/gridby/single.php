<?php get_header(); ?>

<div class="container">

	<div class="col-md-9">
		<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?>
			<div class="post">	
			
				<h1 class="single-title"><?php the_title(); ?></h1>
	
				<p class="meta"> 
					<i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> 
					<i class="fa fa-thumb-tack"></i> <?php the_category(','); ?> 
			    </p>
			    
			    <?php the_post_thumbnail('single', array('class' => 'single-cover','alt' => get_the_title())); ?>
			    
				<?php the_content('Leggi...');?>
				<?php wp_link_pages('pagelink=Page %'); ?>

				<p class="cont-tag">
					<?php $post_tags = wp_get_post_tags($post->ID); if(!empty($post_tags)) {?>
						<span class="tag"> <i class="fa fa-tag"></i> <?php the_tags('', ', ', ''); ?> </span>
					<?php } ?>
				</p>            

				<hr />

				<div id="comments">
					<?php comments_template(); ?>
				</div>
	
			</div>
		<?php endwhile; ?>
	    <?php else : ?>
	        
	        <p><?php _e('Sorry, no posts matched your criteria.', 'gridby'); ?></p>
	
	    <?php endif; ?>
	</div>
	
	<div class="col-md-3 margin-side">
		<?php get_sidebar(); ?>
	</div>
	
</div>

<?php get_footer(); ?>
