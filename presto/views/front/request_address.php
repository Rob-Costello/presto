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
			
			<p>Please provide your address details so that we can arrange collection of the item:</p>
      <div class="columns small-12">
			   <input type="text" name="addr_line_1" placeholder="Address Line 1" required>
         <span class="form-error">This field is required.</span>
      </div>
      <div class="columns small-12">
        <input type="text" name="addr_line_2" placeholder="Address Line 2">
      </div>
      <div class="columns small-12">
        <input type="text" name="city" placeholder="City" required>
        <span class="form-error">This field is required.</span>
      </div>
      <div class="columns small-12">
        <input type="text" name="postcode" placeholder="Postcode" required>
      </div>
      <input type="hidden" name="action" value="finder address">
      <input type="hidden" name="tag" value="<?php echo $tag; ?>">
      <input type="hidden" name="finderID" value="<?php echo $finderID; ?>">
      <input type="hidden" name="proceed_option" value="<?php echo $proceed_option; ?>">
			<button type="Submit" class="button" class="first">Submit</a>

		</form>
		</div>
	</section>
	<script src="/wp-content/themes/core/js/app.js"></script>
</body>
</html>