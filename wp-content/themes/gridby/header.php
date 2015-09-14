<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
   		
	<!-- Meta for IE support -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 	
	
	<?php wp_head(); ?> 
	
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
	
</head>
<body <?php body_class(); ?>>
    <div class="navbar navbar-inverse navbar-fixed-top">
    	<div class="container container-header">
			
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainmenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>	
       
				<a class="navbar-brand" href="<?php echo home_url(); ?>"><i class="fa fa-qrcode"></i> <?php bloginfo('title'); ?></a>

			</div>
			
			<div id="mainmenu" class="collapse navbar-collapse">
			 	
			 	<?php /* Main Navigation */
					wp_nav_menu( array(
					  'theme_location' => 'main',
					  'depth' => 2,
					  'container' => false,
					  'menu_class' => 'nav navbar-nav navbar-right',
					  'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					  //Process nav menu using our custom nav walker
					  'walker' => new wp_bootstrap_navwalker())
					);
				?>	
				
			</div><!--/.nav-collapse -->

    	</div>
    </div>
    
    <?php if (!is_front_page() || is_home()) { ?>
    
    <div class="spacer"> </div>
    
    <?php } ?>
	
	<!-- Prompt IE 6 and 7 users to install Chrome Frame: chromium.org/developers/how-tos/chrome-frame-getting-started -->
	<!--[if lt IE 9]>
		<?php if (is_front_page()) { ?>
		<div class="spacer"> </div>
		<?php } ?>
		<p style="margin:0px;padding: 8px 35px 8px 14px;color: #b94a61;background-color: #f2dede;border: 1px solid #eed3d7;z-index: 10000;">Your browser is <em>ancient!</em> <strong> <a style="color: #b94a61;" href="http://browsehappy.com/" target="_blank">Upgrade to a different browser</a></strong> or <strong><a style="color: #b94a61;" href="http://www.google.com/chromeframe/?redirect=true" target="_blank">install Google Chrome Frame</a></strong> to experience this site.</p>
		
	<![endif]--> 

