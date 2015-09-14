<?php get_header(); ?>	

<div class="container">	
	
	<div class="col-md-12">	
				
			<?php if ( is_search() ) { ?>
				<h1 class="intro-title"><?php _e('Result for:','gridby')?> <strong><i><?php echo $s ?></i></strong></h1>
			<?php } ?>
			<?php if ( is_category() ) { ?>
				<h1 class="intro-title"><?php echo single_cat_title() ?></h1>
			<?php } else { ?>
			
				<h1 style="display:none" class="intro-title"><?php wp_title(''); ?></h1>
			
			<?php } ?>
			
	</div>
	
	<div class="col-md-9">
		
			<?php if (have_posts()) :?><?php while(have_posts()) : the_post(); ?> 
			
			
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	
					
					<div class="row list-item">
						
						<div class="col-sm-4 col-md-4">
							
							<a href="<?php the_permalink(); ?>" class="link-video">
								<?php the_post_thumbnail('single', array('class' => 'single-cover','alt' => get_the_title())); ?>
							</a>
							
						</div>
						
						<div class="col-sm-8 col-md-8">
							
							<h2 class="list-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p class="meta"> <i class="fa fa-clock-o"></i> <?php the_time('j M , Y') ?> <i class="fa fa-thumb-tack"></i> <?php the_category(','); ?></p>
					
							<p class="content-excerpt">
							<?php echo get_the_excerpt();?>
							</p>
					
							<p>
								<?php $post_tags = wp_get_post_tags($post->ID); if(!empty($post_tags)) {?>
									<span class="tag"> <i class="fa fa-tag"></i> <?php the_tags('', ', ', ''); ?> </span>
								<?php } ?>
							</p>

							
						</div>
				
					</div>
	
				</div>	
			<?php endwhile; ?>
			
				<?php get_template_part('inc/pagination'); ?>
				
	        <?php else : ?>
	
                <h3><?php _e('Sorry, no posts matched your criteria.', 'gridby'); ?></h3> 
                <p><?php _e('Try to make a search...', 'gridby'); ?></p>
			
				<?php get_search_form(); ?>
				
				<div class="spacer"></div>
	
	        <?php endif; ?> 
	</div>
	
	<div class="col-md-3 margin-side">
		<?php get_sidebar(); ?>		    
	</div>
	
</div>
	
<?php get_footer(); ?>
	