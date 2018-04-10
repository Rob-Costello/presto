<?php
/**
 * Template Name: Car Results
 */
$urlSplit = explode('/', $_SERVER['REQUEST_URI']);

$alternativeLink = null;
$alternativeText = null;

if (stripos(get_permalink(), "personal") !== false) {
	$alternativeLink = str_replace('personal', 'business', get_permalink());
	$alternativeText = 'View Business Offers';
} elseif (stripos(get_permalink(), "business") !== false) {
	$alternativeLink = str_replace('business', 'personal', get_permalink());
	$alternativeText = 'View Personal Offers';
}

if($urlSplit[1] == 'personal-car-leasing'){
	$personal = 1;
} else {
	$personal = 0;
}

if($urlSplit[1] == 'van-leasing'){
	$commercial = 1;
} else {
	$commercial = 0;
}

include( 'models/vehicles.php');
$vehicles = new vehiclesModel();


include( 'models/search.php');
$search = new searchModel();
$search->setPersonal($personal);
$search->setCommercial($commercial);
$search->setBaseUrl(get_permalink());

if( get_query_var('search_page_number') != '' ) {
	$search->setCurrentPage(get_query_var('search_page_number'));
}

if( $urlSplit[2] == 'under-150' ) {
	$search->setPriceTo(150);
} elseif( $urlSplit[2] == '150-to-250' ){
	$search->setPriceFrom(150);
	$search->setPriceTo(250);
	$search->setOrder('price_low DESC');
} elseif( $urlSplit[2] == '250-to-350' ){
	$search->setPriceFrom(250);
	$search->setPriceTo(350);
	$search->setOrder('price_low DESC');
} elseif( $urlSplit[2] == '350-to-450' ){
	$search->setPriceFrom(350);
	$search->setPriceTo(450);
	$search->setOrder('price_low DESC');
} elseif( $urlSplit[2] == '450-to-550' ){
	$search->setPriceFrom(450);
	$search->setPriceTo(550);
	$search->setOrder('price_low DESC');
} elseif( $urlSplit[2] == 'above-550' ){
	$search->setPriceFrom(550);
	$search->setOrder('price_low DESC');
} else if( $urlSplit[2] == 'small' ){
	$search->setCategory(array());
	$search->setCategoryModels( array( 'a1', 'c-zero', 'c1', 'sandero', '500', 'punto', 'ka', 'fiesta', 'i10', 'ix20', 'rio', 'soul', 'picanto', 'venga', '2', 'one', 'mirage', 'micra',
		'note', 'leaf', 'juke', '108', 'clio', 'ibiza', 'fabia', 'forfour', 'celerio', 'swift', 'aygo', 'Yaris', 'viva', 'corsa', 'up', 'polo'));
} else if( $urlSplit[2] == 'medium' ){
	$search->setCategory('Hatchback');
} else if( $urlSplit[2] == 'large' ){
	$search->setCategory( array('Limousine', 'Saloon') );
} else if( $urlSplit[2] == 'estate' ){
	$search->setCategory('Estate');
} else if( $urlSplit[2] == '4x4' ){
	$search->setCategory( array('Station Wagon', 'Mpv', 'Pick-Up', 'Mini Mpv') );
} else if( $urlSplit[2] == 'prestige' ){
	$search->setCategory('');
} else if( $urlSplit[2] == 'sports' ){
	$search->setCategory( array('Soft-Top', 'Hardtop', 'Roadster', 'Hardtop Convertible/Cabriolet', 'Soft-Top Convertible/Cabriolet', 'Coupe/Targa') );
}

if( isset($_GET['sort']) ){
	$search->setOrder($_GET['sort']);
}

$search->process();

get_header(); ?>

<header class="row">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

	<div class="columns small-12 medium-10"> <h1><span><?php echo $post->post_title;?></h1> </div>
	<div class="columns smasll-12 medium-2">
	<?php if( $alternativeLink ){ ?>
		<a class="button alternative-link" href="<?php echo $alternativeLink ?>"><?php echo $alternativeText ?></a>
	<?php } ?>
		<form method="get">
			<select name="sort" onchange="this.form.submit();">
				<option value="price_low asc" <?php if($search->order == 'price_low asc') echo 'selected'; ?>>Price Low to High</option>
				<option value="price_low desc" <?php if($search->order == 'price_low desc') echo 'selected'; ?>>Price High to Low</option>
			</select>
		</form>
	</div>
</header>

<div class="row">
	<?php foreach($search->getResult() as $vehicle){ ?>


			<article class="small-12 medium-3 large-4 columns car-box" data-equalizer-watch>
				<?php if($personal){ ?>
					<div class="lease personal"></div>
				<?php } elseif( $commercial ) { ?>
					<div class="lease van"></div>
				<?php } else { ?>
					<div class="lease business"></div>
				<?php } ?>
				<a href="<?php echo $vehicles->offerFullUrl($vehicle->id, $vehicle->description, $urlSplit[1], $vehicle->manufacturer, $vehicle->model); ?>">
						<?php if($vehicle->image_filename == 'awaitingimage.jpg' || !file_exists(ABSPATH.'../web/vehicle-images/'.$vehicle->image_filename)){ ?>
							<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/more-cars.png">
						<?php } else{ ?>
							<img src="/vehicle-images/<?php echo $vehicle->image_filename; ?>">
						<?php } ?>
					<h1><?php echo $vehicle->manufacturer . ' ' . $vehicle->model; ?></h1>
					<h2>From:<br /><span class="price">&pound;<?php echo $vehicle->price_low; ?></span></h2>
					<div class="details"><?php if($personal){ ?>Incl Vat<?php } else {?>Plus Vat<?php } ?></div>
					<div class="button">View Deal</div>
				</a>
			</article>


	<?php } ?>
</div>

<div class="row">
	<div class="columns small-12 medium-6">
		<?php echo $search->displayedResults(); ?>
	</div>

	<div class="columns small-12 medium-6 align-right">
		<?php echo $search->paginationLinks(); ?>
	</div>
</div>

<?php get_footer(); ?>
