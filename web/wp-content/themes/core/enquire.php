<?php
/**
 * Template Name: Enquire Form
 */

require($_SERVER['DOCUMENT_ROOT'] . '/../vendor/google/recaptcha/src/autoload.php');
$recaptcha = new \ReCaptcha\ReCaptcha('6LeC4REUAAAAAORTmZfqSLimPTmZ1HHEXBv2mYM8');

include( 'models/vehicles.php');
$vehicles = new vehiclesModel();
$options = array();
if(isset($_POST['options'])) {
	foreach ($_POST['options'] as $k => $v) {
		$options[] = $vehicles->getOption($v);
	}
}

$error = '';
$colour = '';
if(isset($_POST['colour'])) {
	$colour = $vehicles->getColour($_POST['colour'][0]);
}

if(isset($_POST['comments'])){
	$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
	if (!$resp->isSuccess()) {
		$error = 'Please confirm you are not a robot';
	}

	unset($_POST['g-recaptcha-response']);
	if( $colour!= '' ) {
		$_POST['colour_id'] = $_POST['colour'][0];
		$_POST['colour'] = $colour->description . ' ' . $colour->short_description;
		$_POST['colour_price'] = $colour->basic_price;
		$_POST['colour_vat'] = $colour->vat;
	}

	if(!$error) {
		$insertID = $vehicles->addWebApplication($_POST);
		foreach ($options as $o) {
			$vehicles->addWebApplicationOption($insertID, $o->id, $o->basic_price, $o->vat, $o->description);
		}
		header('Location: /enquiry-success/');
	}
}

$personal = $_POST['personal'];
$offer = $vehicles->getVehicle($_POST['offer_id']);
$price = $vehicles->getVehiclePrice($_POST['price_id']);

$quote = $vehicles->calculateQuote($price, $personal, $options, $colour);
get_header(); ?>

<header class="row">
	<div class="small-12 columns">
	<?php if ( function_exists('yoast_breadcrumb') ) {
  		yoast_breadcrumb('<p id="breadcrumbs">','</p>');
	} ?>

	<h1>Enquiry Form</h1>
		</div>

</header>

	<section class="row">
		<div class="small-12 medium-4 columns">
			<div class="form-box order-box">
				<div class="title">Vehicle Details</div>
				<div class="row">
					<div class="small-12 columns">

						<div class="small-12 columns order-details">
							<h4><?php echo $offer->manufacturer; ?> <?php echo $offer->model; ?></h4>
							<h5><?php echo $offer->description; ?></h5>
							<?php if($offer->image_filename == 'awaitingimage.jpg'){ ?>
								<img class="thumbnail" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/more-cars.png">
							<?php } else{ ?>
								<img class="thumbnail" src="/vehicle-images/<?php echo $offer->image_filename; ?>">
							<?php } ?>

							<h4>Quote Details</h4>
							<p>
								Initial rental fee <i class="has-tip info" data-tooltip aria-haspopup="true" title="General description about this point!"></i> <strong id="quote-deposit">&pound;<?php echo number_format((float)($quote['deposit']), 2, '.', ','); ?></strong>
								<?php if($personal){ ?>(inc VAT)<?php } else { ?>(plus VAT)<?php } ?><br />
								<span id="quote-months"><?php echo $price->months; ?></span> monthly rentals at <i class="has-tip info" data-tooltip aria-haspopup="true" title="General description about this point!"></i> <strong id="quote-price">&pound;<?php echo number_format((float)$quote['price'], 2, '.', ','); ?> per month</strong> <?php if($personal){ ?>(inc VAT)<?php } else { ?>(plus VAT)<?php } ?><br />
								<strong id="quote-miles"><?php echo number_format((float)$price->miles, 0, '.', ','); ?> miles</strong> per annum<br />
								Order Booking Fee <i class="has-tip info" data-tooltip aria-haspopup="true" title="General description about this point!"></i> <?php if($personal){ ?><strong>&pound;300.00</strong> (inc VAT)<?php } else { ?><strong>&pound;250.00</strong> (ex VAT)<?php } ?>
							</p>

							<h4>Options</h4>
							<p>
								<?php foreach($options as $o){ ?>
									<?php echo $o->description; ?> &pound<?php if($personal == 1) echo number_format(($o->basic_price + $o->vat), 2, '.', ''); else echo number_format($o->basic_price, 2, '.', ''); ?><br />
								<?php } ?>
								<?php if($colour != '' ){ ?>
								<?php echo $colour->description . ' ' . $colour->short_description; ?> &pound<?php if($personal == 1) echo number_format(($colour->basic_price + $colour->vat), 2, '.', ''); else echo number_format($colour->basic_price, 2, '.', ''); ?></p>
						<?php } ?>
							</p>

						</div>

					</div>

				</div>
			</div>
		</div>

			<div class="small-12 medium-8 columns">
				<?php if ($error != ''){ ?>
					<div data-abide-error class="alert callout">
						<p><i class="fi-alert"></i> <?php echo $error; ?></p>
					</div>
				<?php } ?>
				<form method="post" id="application-form" action="/enquire/" data-abide novalidate>
					<div class="form-box">
						<div class="title">Your Details</div>
							<div class="small-12 columns">
								<div class="row">

								<div class="small-12 columns">
									<h4>Personal Details</h4>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="title">Title</label>
									<select name="customer_title">
										<option value="Mr">Mr</option>
										<option value="Mrs">Mrs</option>
										<option value="Miss">Miss</option>
										<option value="Ms">Ms</option>
										<option value="Dr">Dr</option>
									</select>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="first_name">First Name</label>
									<input type="text" id="first_name" name="first_name" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="last_name">Last Name</label>
									<input type="text" id="last_name" name="last_name" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="dob">Email Address</label>
									<input type="text" id="email_address" name="email_address" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="home_phone">Phone Contact Number</label>
									<input type="text" id="home_phone" name="home_phone" required>
									<span class="form-error">This field is required.</span>
								</div>

									<div class="small-12 medium-6 columns">
										<label for="preferred_contact">Preferred Contact Method</label>
										<select name="preferred_contact">
											<option value="Phone">Phone</option>
											<option value="Email">Email</option>
										</select>
									</div>

									<div class="small-12 medium-6 columns">
										<label for="preferred_contact_time">Preferred Contact Time</label>
										<input type="text" name="preferred_contact_time">
									</div>

									<div class="small-12 medium-6 columns">
										<label for="reason">Reason for Enquiry</label>
										<select name="reason">
											<option value="General enquiry">General enquiry</option>
											<option value="Quote on different mileage needed">Quote on different mileage needed</option>
											<option value="Quote on different term/deposit needed">Quote on different term/deposit needed</option>
											<option value="Availability of vehicle">Availability of vehicle</option>
											<option value="Lead time of vehicle">Lead time of vehicle</option>
											<option value="I want to proceed with an order">I want to proceed with an order</option>
											<option value="I have some questions on this deal">I have some questions on this deal</option>
											<option value="I have some questions regarding the specification of the car">I have some questions regarding the specification of the car</option>
										</select>
									</div>

									<div class="small-12 medium-6 columns">
										<label for="comments">Additional Comments / Request</label>
										<textarea id="comments" name="comments"></textarea>
									</div>
							</div>
								</div>

						<div class="small-12 columns">
							<input type="hidden" name="personal" value="<?php echo $_POST['personal']; ?>">
							<input type="hidden" name="offer_id" value="<?php echo $_POST['offer_id']; ?>">
							<input type="hidden" name="initial" value="<?php echo $_POST['initial']; ?>">
							<input type="hidden" name="months" value="<?php echo $_POST['months']; ?>">
							<input type="hidden" name="miles" value="<?php echo $_POST['miles']; ?>">
							<input type="hidden" name="price_id" value="<?php echo $_POST['price_id']; ?>">
							<input type="hidden" name="enquire" value="1">
							<?php
							if(isset($_POST['options'])) {
								foreach ($_POST['options'] as $k => $v) { ?>
									<input type="hidden" name="options[<?php echo $k; ?>]" value="<?php echo $v; ?>">
								<?php }
							}
							if(isset($_POST['colour'])) {
								foreach ($_POST['colour'] as $k => $v) { ?>
									<input type="hidden" name="colour[<?php echo $k; ?>]" value="<?php echo $v; ?>">
								<?php }
							}
							?>
							<div class="g-recaptcha" data-sitekey="6LeC4REUAAAAAMfZrazp59wBeTfW7G5mmpwKOYNu"></div>
							<button>Submit</button>
						</div>
						</div>
					</div>
				</form>
			</div>

	</section>


<?php get_footer(); ?>
