
<div class="col-md-12 no-margin">
	<div class="footer">
		<div class="container">
		
			<div class="row">
				<div class="col-md-6">
					<p>&copy; Copyright <?php echo date("o");?>   <?php bloginfo('name'); ?> - </p><?php /* Footer Menu */
					
					// first let's get our nav menu using the regular wp_nav_menu() function with special parameters
					$cleanmenu = wp_nav_menu( array( 
						'theme_location' => 'footer', // we've registered a theme location in functions.php
					 	'container' => false, // this is usually a div outside the menu ul, we don't need it
						'items_wrap' => '<nav id="%1$s" class="%2$s">%3$s</nav>', // replacing the ul with nav
						'echo' => false, // don't display it just yet
					) );
					
					// now we're ready to display, but when we do we'll replace the li elements with spans
					echo str_replace( 'li', 'span', $cleanmenu ); 

					?>	
				</div>
				<div class="col-md-6">
					<p class="pull-right"><a href="#top"> <?php _e('TOP', 'gridby'); ?> <i class="fa fa-angle-up"></i></a></p>
				</div>
			</div>

		</div>
	</div>
</div>
   
<?php wp_footer();?>
 
</body>
</html>


    	