<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" id="main-stylesheet-css" href="/wp-content/themes/core/style.css" type="text/css" media="all">
</head>
<body id="rt">

<div style="-webkit-box-shadow: 0px 18px 13px 0px rgba(212,212,212,0.73);
-moz-box-shadow: 0px 18px 13px 0px rgba(212,212,212,0.73);
box-shadow: 0px 18px 13px 0px rgba(212,212,212,0.73); margin-bottom: 50px;">
<section id="main-header" class="row">
    <div class="small-12 medium-6 columns">
        <a href="/"><img id="logo" src="/wp-content/themes/core/images/reward-tagz-logo.svg"></a>
    </div>
    <div class="small-12 medium-6 columns contact">
        <div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="none">
            Menu <button class="menu-icon" type="button" data-toggle></button>
        </div>
        <?php wp_nav_menu( array( 'menu' => 'Main Menu', 'theme_location' => 'header-menu', 'menu_id' => 'main-menu', 'container' => 'nav', 'container_class' => '', 'sort_column' => 'menu_order' ) ); ?>
    </div>
</section>
</div>

	

	<section class="row">

		<div class="small-12">
		   	<?php if( $messages != '' ) { ?>
            	<div class="success callout" data-closable>
                	<?php echo $messages; ?>
                	<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    					<span aria-hidden="true">&times;</span>
  					</button>
                </div>
            <?php } ?>

            <?php if( $errors != '' ) { ?>
            	<div class="alert callout" data-closable>
                	<button class="close-button" aria-label="Dismiss alert" type="button" data-close>
   						     <span aria-hidden="true">&times;</span>
  					       </button>
                   	<?php echo $errors; ?>
                </div>
             <?php } ?>
        </div>

	<div class="small-12 medium-6 medium-offset-3 columns">
		<form method="post" action="/rt/" data-abide novalidate>
			
			<p>This tag number <strong><?php echo $tag; ?></strong> has not been activated by the owner:</p>
			<input type="hidden" name="tag" value="<?php echo $tag; ?>">
			<div class="columns small-12">
        <button type="Submit" name="action" value="activate" class="button first">Activate Tag</button>
      </div>
      <div class="columns small-12">
        <button type="Submit" name="action" value="report" class="button second">Report Found</button>
      </div>

		</form>
		</div>
	</section>
	<script src="/wp-content/themes/core/js/app.js"></script>
</body>
</html>