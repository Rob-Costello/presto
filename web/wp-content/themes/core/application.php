<?php
/**
 * Template Name: Application Form
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

if(isset($_POST['customer_title'])) {

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
	if( $error == '' ) {
		$insertID = $vehicles->addWebApplication($_POST);
		foreach ($options as $o) {
			$vehicles->addWebApplicationOption($insertID, $o->id, $o->basic_price, $o->vat, $o->description);
		}
	}
}



if(isset($_POST['accommodation_status'])) {
	if( $colour!= '' ) {
		$_POST['colour_id'] = $_POST['colour'][0];
		$_POST['colour'] = $colour->description . ' ' . $colour->short_description;
		$_POST['colour_price'] = $colour->basic_price;
		$_POST['colour_vat'] = $colour->vat;
	}
	$_POST['time_at_address'] = $_POST['time_at_address_years'] . ' years ' . $_POST['time_at_address_months'] . ' months';
	$insertID = $_POST['application_id'];
	unset($_POST['time_at_address_years'], $_POST['time_at_address_months'], $_POST['application_id'], $_POST['address']);

	$vehicles->updateWebApplication( $insertID, $_POST );
}

if(isset($_POST['employment_status']) || isset($_POST['fleet_size'])) {
	unset($_POST['address']);
	if ($colour != '') {
		$_POST['colour_id'] = $_POST['colour'][0];
		$_POST['colour'] = $colour->description . ' ' . $colour->short_description;
		$_POST['colour_price'] = $colour->basic_price;
		$_POST['colour_vat'] = $colour->vat;
	}
	if (isset($_POST['time_with_employer_years'])) {

		$_POST['time_with_employer'] = $_POST['time_with_employer_years'] . ' years ' . $_POST['time_with_employer_months'] . ' months';

		unset($_POST['time_with_employer_years'], $_POST['time_with_employer_months']);
	}

	if (isset($_POST['time_with_employer_years_2'])) {

		$_POST['time_with_employer_2'] = $_POST['time_with_employer_years_2'] . ' years ' . $_POST['time_with_employer_months_2'] . ' months';

		unset($_POST['time_with_employer_years_2'], $_POST['time_with_employer_months_2']);
	}

	if (isset($_POST['time_with_employer_years_3'])) {

		$_POST['time_with_employer_3'] = $_POST['time_with_employer_years_3'] . ' years ' . $_POST['time_with_employer_months_3'] . ' months';

		unset($_POST['time_with_employer_years_3'], $_POST['time_with_employer_months_3']);
	}

	$insertID = $_POST['application_id'];
	unset($_POST['application_id']);
	$vehicles->updateWebApplication( $insertID, $_POST );
}

if(isset($_POST['bank_name'])){
	if( $colour!= '' ) {
		$_POST['colour_id'] = $_POST['colour'][0];
		$_POST['colour'] = $colour->description . ' ' . $colour->short_description;
		$_POST['colour_price'] = $colour->basic_price;
		$_POST['colour_vat'] = $colour->vat;
	}

	if (isset($_POST['time_with_bank_years'])) {

		$_POST['time_with_bank'] = $_POST['time_with_bank_years'] . ' years ' . $_POST['time_with_bank_months'] . ' months';

		unset($_POST['time_with_bank_years'], $_POST['time_with_bank_months']);
	}

	$insertID = $_POST['application_id'];
	unset($_POST['application_id']);
	$vehicles->updateWebApplication( $insertID, $_POST );
	header('Location: /application-success/');
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

	<h1>Application Form</h1>
		</div>

</header>

	<section class="row">
		<div class="small-12 medium-4 columns">
			<div class="form-box order-box">
				<div class="title">Your Order</div>
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
		<?php if(isset($_POST['employment_status']) || isset($_POST['fleet_size'])){ ?>
			<div class="small-12 medium-8 columns">
				<div class="alert progress">
					<div class="progress-meter" style="width: 100%"></div>
				</div>
				<form method="post" id="application-form" action="/application/" data-abide novalidate>
					<div class="form-box">
						<div class="title">Your Details</div>
						<div class="small-12 columns">
							<div class="row">
								<div class="small-12 columns">
									<h4>Bank Details</h4>
								</div>
								<div class="small-12 medium-6 columns">
									<label for="bank_name">Bank Name</label>
									<input type="text" id="bank_name" name="bank_name" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="account_name">Account Name</label>
									<input type="text" id="account_name" name="account_name" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="account_number">Account Number</label>
									<input type="text" id="account_number" name="account_number" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="sort_code">Sort Code</label>
									<input type="text" id="sort_code" name="sort_code" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="time_with_bank_years">Time with Bank</label>
									Years <input type="number" id="time_with_bank_years" class="small-input" name="time_with_bank_years" required>
									Months <input type="number" id="time_with_bank_months" class="small-input" name="time_with_bank_months" required>
									<span class="form-error">This field is required.</span>
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
							<input type="hidden" name="application_id" value="<?php echo $insertID; ?>">
							<button>Submit Order</button>
						</div>
					</div>
				</form>
			</div>
		<?php } elseif (isset($_POST['accommodation_status'])){ ?>
	<div class="small-12 medium-8 columns">
		<div class="alert progress">
			<div class="progress-meter" style="width: 75%"></div>
		</div>
		<form method="post" id="application-form" action="/application/" data-abide novalidate>
			<div class="form-box">
				<div class="title">Your Details</div>
				<div class="small-12 columns">
					<div class="row">
						<?php if( $personal == 1 ){ ?>
						<div class="small-12 columns">
							<h4>Employer Details</h4>
						</div>

						<div class="small-12 medium-6 columns">
							<label for="occupation">Occupation</label>
							<input type="text" name="occupation" id="occupation" required>
							<span class="form-error">This field is required.</span>
						</div>

						<div class="small-12 medium-6 columns">
							<label for="company_name">Company Name</label>
							<input type="text" id="company_name" name="company_name" required>
							<span class="form-error">This field is required.</span>
						</div>

							<div class="small-12 columns address-finder-box">
								<div class="row">
									<div class="small-12 columns">
										<h5>Find Address</h5>
									</div>
									<div class="small-12 medium-6 columns input-group">
										<input type="text" class="input-group-field" id="postcode" name="postcode" placeholder="Enter Postcode" required>
										<span class="form-error">This field is required.</span>
										<div class="input-group-button">
											<input type="submit" class="button findAddress" value="Find Address">
										</div>
									</div>

									<div class="small-12 medium-6 columns">
										<select name="address" id="addresses" onchange="populateAddressEmployment(this)">
										</select>
									</div>
								</div>
							</div>

						<div class="small-12 medium-6 columns">
							<label for="employer_address">Employer Address</label>
							<input type="text" id="employer_address" name="employer_address" required>
							<span class="form-error">This field is required.</span>
						</div>

						<div class="small-12 medium-6 columns">
							<label for="employment_status">Employment Status</label>
							<select name="employment_status">
								<option>Select</option>
								<option value="Employed Full time">Employed Full time</option>
								<option value="Employed Part time">Employed Part time</option>
								<option value="Retired">Retired</option>
								<option value="Self Employed">Self Employed</option>
								<option value="Housewife/husband">Housewife/husband</option>
							</select>
						</div>

						<div class="small-12 medium-6 columns">
							<label for="time_with_employer">Time with Employer</label>
							Years <input type="number" id="time_with_employer_years" class="small-input" name="time_with_employer_years" required>
							Months <input type="number" id="time_with_employer_months" class="small-input" name="time_with_employer_months" required>
							<span class="form-error">This field is required.</span>
						</div>

							<div class="small-12 columns">
								<p>If time at your current employemnt is less than 5 years, please click below to add more to total 5 years history.<br /><a id="previousEmploymentButton" class="button">Add more employment</a></p>
							</div>

							<div id="previousEmployment" class="small-12 columns">
								<div class="row">

									<h4 class="small-12 columns">Employment 2</h4>

									<div class="small-12 medium-6 columns">
									<label for="occupation_2">Occupation</label>
									<input type="text" name="occupation_2" id="occupation_2">
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="company_name_2">Company Name</label>
									<input type="text" id="company_name_2" name="company_name_2">
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="employer_address_2">Employer Address</label>
									<input type="text" id="employer_address_2" name="employer_address_2">
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="employment_status_2">Employment Status</label>
									<select name="employment_status_2">
										<option>Select</option>
										<option value="Employed Full time">Employed Full time</option>
										<option value="Employed Part time">Employed Part time</option>
										<option value="Retired">Retired</option>
										<option value="Self Employed">Self Employed</option>
										<option value="Housewife/husband">Housewife/husband</option>
									</select>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="time_with_employer_2">Time with Employer</label>
									Years <input type="number" id="time_with_employer_years_2" class="small-input" name="time_with_employer_years_2">
									Months <input type="number" id="time_with_employer_months_2" class="small-input" name="time_with_employer_months_2">
									<span class="form-error">This field is required.</span>
								</div>
									<h4 class="small-12 columns">Employment 3</h4>
									<div class="small-12 medium-6 columns">
										<label for="occupation_3">Occupation</label>
										<input type="text" name="occupation_3" id="occupation_3">
										<span class="form-error">This field is required.</span>
									</div>

									<div class="small-12 medium-6 columns">
										<label for="company_name_3">Company Name</label>
										<input type="text" id="company_name_3" name="company_name_3">
										<span class="form-error">This field is required.</span>
									</div>

									<div class="small-12 medium-6 columns">
										<label for="employer_address_3">Employer Address</label>
										<input type="text" id="employer_address_3" name="employer_address_3">
										<span class="form-error">This field is required.</span>
									</div>

									<div class="small-12 medium-6 columns">
										<label for="employment_status_3">Employment Status</label>
										<select name="employment_status_3">
											<option>Select</option>
											<option value="Employed Full time">Employed Full time</option>
											<option value="Employed Part time">Employed Part time</option>
											<option value="Retired">Retired</option>
											<option value="Self Employed">Self Employed</option>
											<option value="Housewife/husband">Housewife/husband</option>
										</select>
									</div>

									<div class="small-12 medium-6 columns">
										<label for="time_with_employer_3">Time with Employer</label>
										Years <input type="number" id="time_with_employer_years_3" class="small-input" name="time_with_employer_years_3">
										Months <input type="number" id="time_with_employer_months_3" class="small-input" name="time_with_employer_months_3">
										<span class="form-error">This field is required.</span>
									</div>
								</div>
							</div>

						<?php } else { ?>
							<div class="small-12 columns">
								<h4>Business Details</h4>
							</div>

							<div class="small-12 medium-6 columns">
								<label for="fleet_size">Fleet Size</label>
								<input type="number" id="fleet_size" name="fleet_size" required>
								<span class="form-error">This field is required.</span>
							</div>

							<div class="small-12 medium-6 columns">
								<label for="cars">Cars</label>
								<input type="number" id="cars" name="cars" required>
								<span class="form-error">This field is required.</span>
							</div>

							<div class="small-12 medium-6 columns">
								<label for="vans">Vans</label>
								<input type="number" id="vans" name="vans" required>
								<span class="form-error">This field is required.</span>
							</div>

						<?php } ?>


					</div>
				</div>

				<div class="small-12 columns">
					<input type="hidden" name="personal" value="<?php echo $_POST['personal']; ?>">
					<input type="hidden" name="offer_id" value="<?php echo $_POST['offer_id']; ?>">
					<input type="hidden" name="initial" value="<?php echo $_POST['initial']; ?>">
					<input type="hidden" name="months" value="<?php echo $_POST['months']; ?>">
					<input type="hidden" name="miles" value="<?php echo $_POST['miles']; ?>">
					<input type="hidden" name="price_id" value="<?php echo $_POST['price_id']; ?>">
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
					<input type="hidden" name="application_id" value="<?php echo $insertID; ?>">
					<button>Next Step</button>
				</div>
			</div>
	</div>
	</form>
	</div>
<?php } elseif(isset($_POST['customer_title']) && $error == ''){ ?>
			<div class="small-12 medium-8 columns">
				<div class="alert progress">
					<div class="progress-meter" style="width: 50%"></div>
				</div>
				<form method="post" id="application-form" action="/application/" data-abide novalidate>
					<div class="form-box">
						<div class="title">Your Details</div>
						<div class="small-12 columns">
							<div class="row">

								<div class="small-12 columns">
									<h4>Personal Details</h4>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="dob">Date of Birth</label>
									<input type="text" id="dob" name="dob" class="datepicker" required>
									<span class="form-error">This field is required.</span>
								</div>
								<div class="small-12 medium-6 columns">
									<label for="home_phone">Home Phone</label required>
									<input type="text" id="home_phone" name="home_phone">
									<span class="form-error">This field is required.</span>
								</div>
								<div class="small-12 columns address-finder-box">
									<div class="row">
										<div class="small-12 columns">
											<h5>Find Address</h5>
										</div>
										<div class="small-12 medium-6 columns input-group">
											<input type="text" class="input-group-field" id="postcode" name="postcode" placeholder="Enter Postcode" required>
											<span class="form-error">This field is required.</span>
											<div class="input-group-button">
												<input type="submit" class="button findAddress" value="Find Address">
											</div>
										</div>

										<div class="small-12 medium-6 columns">
											<select name="address" id="addresses" onchange="populateAddress(this)">
											</select>
										</div>
									</div>
								</div>


								<?php if( $personal != 1 ){ ?>
								<div class="small-12 medium-6 columns">
									<label for="company">Company Name</label>
									<input type="text" id="company" name="company" required>
									<span class="form-error">This field is required.</span>
								</div>
								<?php } ?>

								<div class="small-12 medium-6 columns">
									<label for="address_line_1">Address</label>
									<input type="text" id="address_line_1" name="address_line_1" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="address_line_2">&nbsp;</label>
									<input type="text" id="address_line_2" name="address_line_2">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="address_line_3">&nbsp;</label>
									<input type="text" id="address_line_3" name="address_line_3">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="town">Town/City</label>
									<input type="text" id="town" name="town">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="county">County</label>
									<input type="text" id="county" name="county">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="accommodation_status">Accommodation Status</label>
									<select name="accommodation_status">
										<option>Select</option>
										<option value="Owner - Mortgage">Owner - Mortgage</option>
										<option value="Owner - Outright">Owner - Outright</option>
										<option value="With Parents">With Parents</option>
										<option value="Rented">Rented</option>
									</select>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="marital_status">Marital Status</label>
									<select name="marital_status">
										<option>Select</option>
										<option value="Single">Single</option>
										<option value="Married">Married</option>
										<option value="Separated">Separated</option>
										<option value="Divorced">Divorced</option>
										<option value="Widowed">Widowed</option>
									</select>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="dependants">Dependants</label>
									<input type="text" id="dependants" name="dependants" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="time_at_address_years">Time at Address</label>
									Years <input type="number" id="time_at_address_years" class="small-input" name="time_at_address_years" required>
									Months <input type="number" id="time_at_address_months" class="small-input" name="time_at_address_months" required>
									<span class="form-error">This field is required.</span>
								</div>

								<div class="small-12 columns">
									<p>If time at your current address is less than 5 years, please click below to add addresses to total 5 years history.<br /><a id="previousAddressesButton" class="button">Add more addresses</a></p>
								</div>

								<div id="previousAddresses" class="small-12 columns">
									<div class="row">
										<h4 class="small-12 columns">Address 2</h4>
								<div class="small-12 medium-6 columns">
									<label for="address_line_1_2">Address</label>
									<input type="text" id="address_line_1_2" name="address_line_1_2">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="address_line_2_2">&nbsp;</label>
									<input type="text" id="address_line_2_2" name="address_line_2_2">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="address_line_3_2">&nbsp;</label>
									<input type="text" id="address_line_3_2" name="address_line_3_2">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="town_2">Town/City</label>
									<input type="text" id="town_2" name="town_2">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="county_2">County</label>
									<input type="text" id="county_2" name="county_2">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="accommodation_status_2">Accommodation Status</label>
									<select name="accommodation_status_2">
										<option value="">Select</option>
										<option value="Owner - Mortgage">Owner - Mortgage</option>
										<option value="Owner - Outright">Owner - Outright</option>
										<option value="With Parents">With Parents</option>
										<option value="Rented">Rented</option>
									</select>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="time_at_address_years_2">Time at Address</label>
									Years <input type="number" id="time_at_address_years_2" class="small-input" name="time_at_address_years_2">
									Months <input type="number" id="time_at_address_months_2" class="small-input" name="time_at_address_months_2">
								</div>

										<h4 class="small-12 columns">Address 3</h4>

								<div class="small-12 medium-6 columns">
									<label for="address_line_1_3">Address</label>
									<input type="text" id="address_line_1_3" name="address_line_1_3">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="address_line_2_3">&nbsp;</label>
									<input type="text" id="address_line_2_3" name="address_line_2_3">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="address_line_3_3">&nbsp;</label>
									<input type="text" id="address_line_3_3" name="address_line_3_3">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="town_3">Town/City</label>
									<input type="text" id="town_3" name="town_3">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="county_3">County</label>
									<input type="text" id="county_3" name="county_3">
								</div>

								<div class="small-12 medium-6 columns">
									<label for="accommodation_status_3">Accommodation Status</label>
									<select name="accommodation_status_3">
										<option value="">Select</option>
										<option value="Owner - Mortgage">Owner - Mortgage</option>
										<option value="Owner - Outright">Owner - Outright</option>
										<option value="With Parents">With Parents</option>
										<option value="Rented">Rented</option>
									</select>
								</div>

								<div class="small-12 medium-6 columns">
									<label for="time_at_address_years_3">Time at Address</label>
									Years <input type="number" id="time_at_address_years_3" class="small-input" name="time_at_address_years_3">
									Months <input type="number" id="time_at_address_months_3" class="small-input" name="time_at_address_months_3">
								</div>
									</div>
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
							<input type="hidden" name="application_id" value="<?php echo $insertID ?>">
							<button>Next Step</button>
						</div>
					</div>
			</div>
			</form>
			</div>
		<?php } else{ ?>
			<div class="small-12 medium-8 columns">
				<div class="alert progress">
					<div class="progress-meter" style="width: 25%"></div>
				</div>

				<?php if ($error != ''){ ?>
					<div data-abide-error class="alert callout">
						<p><i class="fi-alert"></i> <?php echo $error; ?></p>
					</div>
				<?php } ?>

				<form method="post" id="application-form" action="/application/" data-abide novalidate>
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
									<label for="email_address">Email</label>
									<input type="email" id="email_address" name="email_address" required pattern="email">
									<span class="form-error">Vaid email is required.</span>
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
							<input type="hidden" name="application" value="1">
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
							<button>Next Step</button>
						</div>
						</div>
					</div>
				</form>
			</div>
		<?php } ?>

	</section>


<?php get_footer(); ?>