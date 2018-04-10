<?php
/**
 * Template Name: Contact Page
 */

get_header(); ?>

<header class="row">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

	<h1><?php echo $post->post_title; ?></h1>

</header>
<section id="contact-form">
	<div class="row">
		<div class="columns small-12 large-6">
			<?php gravity_form(1, false); ?>
		</div>
		<div class="columns small-12 large-6">
			<h2>Contact Details</h2>

			<p>Reward Tagz<br />
			Address Line 1<br />
			Address Line 2<br />
			Town<br />
			County<br />
			Postcode</p>

			<p>Email: hello@rewardtagz.com<br/>
			Telephone: 0845 123 456</p>
		</div>
	</div>
</section>
<div id="map" style="height: 400px;"></div>
<script>
	function initMap() {
		var uluru = {lat: 53.2661851, lng: -2.8904029};
		var map = new google.maps.Map(document.getElementById('map'), {
			zoom: 16,
			center: uluru
		});
		var marker = new google.maps.Marker({
			position: uluru,
			map: map
		});
	}
</script>
<script async defer
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCInzTdqovEIJNrcGq-lGfVyDM7RRUeOgE&callback=initMap">
</script>

<?php get_footer(); ?>
