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
		<form method="post" action="/rt/">
			
			<h3>This item has an offer of:</h3>
      <h2>&pound;<?php echo $reward * ((100-10) / 100); ?></h2>
      <h3>Now how d'ya feel?</h3>
			<input type="hidden" name="tag" value="<?php echo $tag; ?>">
      <div class="columns small-12">
			 <button type="Submit" class="button first" name="action" value="good karma">the good karma is enough</button>
      </div>
      <div class="columns small-12">
        <a class="button second" id="showCharities">donate to charity</a>
        
        <div id="charityOptions">
          <button type="Submit" class="button second" name="action" value="charity McMillan" style="background-image: url('/images/mcmillianlogo.jpg'); width: 116px; height: 53px;"></button>
          <button type="Submit" class="button second" name="action" value="charity RSPCA" style="background-image: url('/images/rspcalogo.jpg'); width: 116px; height: 53px;"></button>
          <button type="Submit" class="button second" name="action" value="charity NSPCC" style="background-image: url('/images/nspcclogo.jpg'); width: 116px; height: 53px;"></button>
            <input type="text" name="other_charity" placeholder="or enter a charity of your choice">
            <button type="Submit" class="button second" name="action" value="charity Other">Submit</button>
        </div>

      </div>
      <div class="columns small-12">
        <button type="Submit" class="button third" name="action" value="get money">I&#39;d like to claim the reward</button>
      </div>
		</form>
		</div>
	</section>
	<script src="/wp-content/themes/core/js/app.js"></script>
</body>
</html>