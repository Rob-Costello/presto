<?php $total_price = 0; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
<title>Elite Admin - is a responsive admin template</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    <?php require_once( dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/web/secure/assets/css/base.css');?>
    @page {
      size: A4;
      margin: 0;
    }
    @media print {
      html, body {
        width: 210mm;
        height: 297mm;
        background-color: #fff;
      }
      /* ... the rest of the rules ... */
    }
    html, body {
      width: 210mm;
      height: 297mm;
      background-color: #fff;
    }
    .featured-plan .pricing-body {
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>
<body class="fix-sidebar">
<div id="wrapper">
      <!-- /.row -->
      <div class="row">
        <div class="col-md-12">
          <div class="white-box">
            <h3><b>Quote</b> <span class="pull-right">#<?php echo $content->id ?></span></h3>
            <hr>
            <div class="row">
              <h3>Your Vehicle Quotation - <?php if($content->personal == 1) echo 'Personal'; else echo 'Business'; ?> Contract Hire</h3>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <address>
                    <img src="<?php echo $this->config->site_url(); ?>/assets/images/car-leasing-online-logo.svg" width="300px;">
                    <div  class="pull-right text-right"><p class="text-muted m-l-5">Tel: 01513 56 56 29<br/>
                    Fax: 0845 652 26 87<br/>
                    Website: www.carleasing-online.co.uk</p>
                  </address></div>
              </div>
          <div class="row">
            <div class="col-md-12 m-t-40">
                  <address>
                  <p">
                    <b>Customer Name :</b> <?php echo $content->first_name . ' ' . $content->last_name; ?><br />
                    <?php if( isset($content->staff_first_name) ){ ?>
                      <b>Quote Provided By :</b> <?php echo $content->staff_first_name . ' ' . $content->staff_last_name . ' (Email: ' . $content->staff_email . ')'; ?><br />
                    <?php } ?>
                    <b>Invoice Date :</b> <i class="fa fa-calendar"></i> <?php echo date_format(date_create($content->datetime), 'jS F Y'); ?>
                  </p>
                  </address>
                </div>
              </div>
          <div class="col-md-12">
            <h4>Vehicle Details</h4>
            <div class="table-responsive m-t-40">
              <table class="table table-hover">
                <tbody>
                <tr>
                  <?php if(isset($content->derivative)) { ?>
                    <td colspan="2"><?php echo $content->manufacturer . ' ' . $content->model . ' ' . $content->derivative; ?></td>
                  <?php } else { ?>
                    <td colspan="2"><?php echo $content->manufacturer . ' ' . $content->model . ' ' . $content->description; ?></td>
                  <?php } ?>
                </tr>
                <tr>
                  <td>Optional Extras</td>
                  <td>
                    <?php if(count($options) == 0 && $content->colour == ''){?>
                      NONE
                    <?php } else {
                      foreach($options as $option){
                        if($content->personal == 1)
                          $option->price = $option->basic_price + $option->vat;
                        else
                          $option->price = $option->basic_price;
                        echo $option->description . ' (&pound;' . $option->price . ')<br/>';
                        $total_price = $total_price + $option->price;
                      }
                      if($content->personal == 1)
                        $price = $content->colour_price + $content->colour_vat;
                      else
                        $price = $content->colour_price;
                      $total_price = $total_price + $price;
                      echo $content->colour . ' (&pound;' . $price . ')<br/>';
                    }?>

                  </td>
                </tr>
                </tbody>
              </table>
              <div class="featured-plan"><p class="pricing-body">Your vehicle is supplied direct through the manufacturer's franchised dealer network. Your new vehicle includes full manufacturer's warranty, road tax and delivery (unless otherwise stated).</p></div>
            </div>
          </div>
            <?php $priceSplit = $total_price / ($content->initial + $content->months); $content->price = number_format($content->price + $priceSplit, 2, '.', ''); ?>
              <div class="col-md-12">
                <h4>Quotation Breakdown</h4>
                <div class="table-responsive m-t-40">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Finance Type</td>
                        <td>Lease</td>
                      </tr>
                      <tr>
                        <td>Term</td>
                        <td><?php echo $content->months + 1; ?></td>
                      </tr>
                      <tr>
                        <td>Payment Profile</td>
                        <td><?php echo $content->initial; ?> x <?php echo $content->months; ?></td>
                      </tr>
                      <tr>
                        <td>Monthly Payment</td>
                        <td>&pound;<?php echo $content->price; ?> <?php if($content->personal == 1) echo 'Incl VAT'; else echo 'Excl Vat'; ?></td>
                      </tr>
                      <tr>
                        <td>Initial Payment</td>
                        <td>&pound;<?php echo $content->price * $content->initial; ?> <?php if($content->personal == 1) echo 'Incl VAT'; else echo 'Excl Vat'; ?></td>
                      </tr>
                      <tr>
                        <td>Mileage (per annum)</td>
                        <td><?php echo $content->miles; ?></td>
                      </tr>
                      <?php if( isset($content->booking_fee) ) { ?>
                      <tr>
                        <td>Booking Fee</td>
                        <td>&pound;<?php echo $content->booking_fee; ?></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="col-md-12">
                <div class="featured-plan">
                  <p class="pricing-body">
                    Please see manufacturer brochure for full vehicle specification and details.
                  </p>
                  <h6 class="pricing-body" style="font-weight: normal">
                  Terms and Conditions apply. All orders are subject to credit approval following a credit search. Stock can only be secured with a confirmed order. This quotation is not a contractual offer and is subject to any changes in vehicle prices, supply terms and availability.

                  For further information on this vehicle or if you would like to proceed please contact us on 01513 565629 or email dale@carleasing-online.co.uk

                  Car Leasing online is a trading style of Mercury Vehicle Solutions Ltd Registered office: B3 Stanlaw Abbey Business Centre, Dover Drive, Cheshire, CH65 9BF.
                  Registered in England No:6876840, Mercury Vehicle Solutions Ltd is a credit broker not a lender and is authorised and regulated by the Financial Conduct Authority (FCA) for credit broking activities. <br /><br />
                    Whilst we endeavour to keep our pricing up to date, many offers can change from time to time (for example on stock) and as such the quote illustrated is only an indicative price.
                  </h6></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- .row -->
    </div>
    <!-- /.container-fluid -->
</div>
</body>
</html>
