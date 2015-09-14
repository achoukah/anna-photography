<?php 
	
/* ------------------------------------------------------------------------- *
 *  Theme Options 
/* ------------------------------------------------------------------------- */	

function fb_theme_customizer( $wp_customize ) {
	
	
	
	
	
	/* Grid
	--------------------------------------------------------------------------- */
	
	
    $wp_customize->add_section( 'fb_grid_section' , array(
		'title' => __( 'Grid', 'gridby' ),
		'priority' => 25,
		'description' => __( 'Set up the text before the grid.', 'gridby' ),
	) );
	
		
	/* Title */
	
	$wp_customize->add_setting( 'fb_grid_title', array(
		'default'	=> '',
	) );
	
	$wp_customize->add_control( 'fb_grid_title', array(
		'label'	=> __( 'Title', 'gridby' ),
		'section'	=> 'fb_grid_section',
		'settings'	=> 'fb_grid_title',
		'type'	=> 'text',
	
	) );

	/* Text */
		
	$wp_customize->add_setting( 'fb_grid_description', array(
		'default' => '',
	) );
	
	$wp_customize->add_control( new Textarea_Custom_Control( $wp_customize, 'fb_grid_description', array(
		'label' => __( 'Description', 'gridby' ),
		'section' => 'fb_grid_section',
		'settings' => 'fb_grid_description',
		'priority' => 10
	) ) );
	
		
	
}

add_action('customize_register', 'fb_theme_customizer');

/**
 * Customize Class for textarea, extend the WP customizer
 *
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
	return NULL;

class Textarea_Custom_Control extends WP_Customize_Control
{
	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @since   10/16/2012
	 * @return  void
	 */
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
				<?php echo esc_textarea( $this->value() ); ?>
			</textarea>
		</label>
		<?php
	}

}


?>
	