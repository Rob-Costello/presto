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
            <h3><b>Application</b> <span class="pull-right">#<?php echo $content->id ?></span></h3>
            <hr>
            <div class="row">
              <h3><?php if($customer->personal == 1) echo 'Personal'; else echo 'Business'; ?> Credit Application Form</h3>
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
              <div class="col-md-12">
                <h4>Personal Details</h4>
                <div class="table-responsive m-t-40">
                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>Title</td>
                        <td><?php echo $customer->title; ?></td>
                      </tr>
                      <tr>
                        <td>First Name</td>
                        <td><?php echo $customer->first_name ?></td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td><?php echo $customer->last_name ?></td>
                      </tr>
                      <tr>
                        <td>Marital Status</td>
                        <td><?php echo $customer->marital_status; ?></td>
                      </tr>
                      <tr>
                        <td>Nationality</td>
                        <td><?php echo $customer->nationality; ?></td>
                      </tr>
                      <tr>
                        <td>Home Tel No.</td>
                        <td><?php echo $customer->home_phone; ?></td>
                      </tr>
                      <tr>
                        <td>Work Tel No.</td>
                        <td><?php echo $customer->work_phone; ?></td>
                      </tr>
                      <tr>
                        <td>Mobile Tel No.</td>
                        <td><?php echo $customer->mobile_phone; ?></td>
                      </tr>
                      <tr>
                        <td>Date of Birth</td>
                        <td><?php echo $customer->dob; ?></td>
                      </tr>
                      <tr>
                        <td>Number of Dependants</td>
                        <td><?php echo $customer->dependants; ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            <div class="col-md-12">
              <h4>Address Details</h4>
              <div class="table-responsive m-t-40">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <td>Current Address</td>
                    <td><?php echo $customer->address_line_1; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $customer->address_line_2; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $customer->address_line_3 ?></td>
                  </tr>
                  <tr>
                    <td>Town/City</td>
                    <td><?php echo $customer->town; ?></td>
                  </tr>
                  <tr>
                    <td>County</td>
                    <td><?php echo $customer->county; ?></td>
                  </tr>
                  <tr>
                    <td>Postcode</td>
                    <td><?php echo $customer->postcode; ?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td><?php echo $customer->country; ?></td>
                  </tr>
                  <tr>
                    <td>Time at Address</td>
                    <td><?php echo $customer->time_at_address; ?></td>
                  </tr>
                  <tr>
                    <td>Accommodation Status</td>
                    <td><?php echo $customer->accommodation_status; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <?php if($previous_addresses > 0){ ?>
            <div class="col-md-12">
              <h4>Previous Addresses</h4>
              <div class="table-responsive m-t-40">
                <?php foreach( $previous_addresses as $address ){ ?>
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <td>Previous Address</td>
                    <td><?php echo $address->addr_line_1; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $address->addr_line_2; ?></td>
                  </tr>
                  <tr>
                    <td></td>
                    <td><?php echo $address->addr_line_3 ?></td>
                  </tr>
                  <tr>
                    <td>Town/City</td>
                    <td><?php echo $address->town; ?></td>
                  </tr>
                  <tr>
                    <td>County</td>
                    <td><?php echo $address->county; ?></td>
                  </tr>
                  <tr>
                    <td>Postcode</td>
                    <td><?php echo $address->postcode; ?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td><?php echo $address->country; ?></td>
                  </tr>
                  <tr>
                    <td>Time at Address</td>
                    <td><?php echo $address->time_at_address; ?></td>
                  </tr>
                  <tr>
                    <td>Accommodation Status</td>
                    <td><?php echo $address->accommodation_status; ?></td>
                  </tr>
                  </tbody>
                </table>
                <?php } ?>
              </div>
            </div>
            <?php } ?>
            <div class="col-md-12">
              <h4>Monthly Income and Expenditure</h4>
              <div class="table-responsive m-t-40">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <td>Monthly Income</td>
                    <td>&pound;<?php echo $content->monthly_income; ?></td>
                  </tr>
                  <tr>
                    <td>Housing</td>
                    <td>&pound;<?php echo $content->housing; ?></td>
                  </tr>
                  <tr>
                    <td>Credit Cards</td>
                    <td>&pound;<?php echo $content->credit_cards; ?></td>
                  </tr>
                  <tr>
                    <td>Utilities</td>
                    <td>&pound;<?php echo $content->utilities; ?></td>
                  </tr>
                  <tr>
                    <td>Transport/Travel/Fuel</td>
                    <td>&pound;<?php echo $content->transport; ?></td>
                  </tr>
                  <tr>
                    <td>Other Loans</td>
                    <td>&pound;<?php echo $content->other_loans; ?></td>
                  </tr>
                  <tr>
                    <td>Telephone/Television</td>
                    <td>&pound;<?php echo $content->telephone; ?></td>
                  </tr>
                  <tr>
                    <td>Food/Drink/Clothing</td>
                    <td>&pound;<?php echo $content->food; ?></td>
                  </tr>
                  <tr>
                    <td>Car Loan</td>
                    <td>&pound;<?php echo $content->car_loan; ?></td>
                  </tr>
                  <tr>
                    <td>Other Expenditure</td>
                    <td>&pound;<?php echo $content->other_expenditure; ?></td>
                  </tr>
                  <tr>
                    <td>Total Expenditure</td>
                    <td><b>&pound;<?php echo $content->housing + $content->credit_cards + $content->utilities + $content->transport + $content->other_loans + $content->telephone + $content->food + $content->car_loan + $content->other_expenditure; ?></b></td>
                  </tr>
                  <tr>
                    <td>Car Allowance</td>
                    <td>&pound;<?php echo $content->car_allowance; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <h4>Employment Details</h4>
              <div class="table-responsive m-t-40">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <td>Occupation</td>
                    <td><?php echo $customer->occupation; ?></td>
                  </tr>
                  <tr>
                    <td>Employment Status</td>
                    <td><?php echo $customer->employment_status; ?></td>
                  </tr>
                  <tr>
                    <td>Full or Part Time</td>
                    <td><?php echo $customer->full_part_time; ?></td>
                  </tr>
                  <tr>
                    <td>Employers Name</td>
                    <td><?php echo $customer->employer_name; ?></td>
                  </tr>
                  <tr>
                    <td>Employers Address</td>
                    <td><?php echo $customer->employer_address; ?></td>
                  </tr>
                  <tr>
                    <td>Time in Employment</td>
                    <td><?php echo $customer->time_at_employment; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <?php if($previous_employment > 0){ ?>
              <div class="col-md-12">
                <h4>Previous Employment</h4>
                <div class="table-responsive m-t-40">
                  <?php foreach( $previous_employment as $employment ){ ?>
                    <table class="table table-hover">
                      <tbody>
                      <tr>
                        <td>Occupation</td>
                        <td><?php echo $employment->occupation; ?></td>
                      </tr>
                      <tr>
                        <td>Employment Status</td>
                        <td><?php echo $employment->employment_status; ?></td>
                      </tr>
                      <tr>
                        <td>Full or Part Time</td>
                        <td><?php echo $employment->full_part_time; ?></td>
                      </tr>
                      <tr>
                        <td>Employers Name</td>
                        <td><?php echo $employment->employer_name; ?></td>
                      </tr>
                      <tr>
                        <td>Employers Address</td>
                        <td><?php echo $employment->employer_address; ?></td>
                      </tr>
                      <tr>
                        <td>Time in Employment</td>
                        <td><?php echo $employment->time_at_employment; ?></td>
                      </tr>
                      </tbody>
                    </table>
                  <?php } ?>
                </div>
              </div>
            <?php } ?>
            <div class="col-md-12">
              <h4>Bank Details</h4>
              <div class="table-responsive m-t-40">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <td>Account Name</td>
                    <td><?php echo $content->bank_name; ?></td>
                  </tr>
                  <tr>
                    <td>Account Number</td>
                    <td><?php echo $this->encryption->decrypt($content->account_number); ?></td>
                  </tr>
                  <tr>
                    <td>Sort Code</td>
                    <td><?php echo $this->encryption->decrypt($content->sort_code); ?></td>
                  </tr>
                  <tr>
                    <td>Time with Bank</td>
                    <td><?php echo $content->time_with_bank; ?></td>
                  </tr>
                  <tr>
                    <td>Bank Name</td>
                    <td><?php echo $content->bank_name; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <h4>Additional Comments</h4>
              <div class="table-responsive m-t-40">
                <table class="table table-hover">
                  <tbody>
                  <tr>
                    <td colspan="2"><?php echo $content->comments; ?></td>
                  </tr>
                  </tbody>
                </table>
              </div>
            </div>
              <div class="col-md-12">
                <div class="featured-plan">

                  <h6 class="pricing-body" style="font-weight: normal">Car Leasing Online is a trading style of Mercury Vehicle Solutions Ltd, Registered Office: B1 Stanlaw Abbey Business Centre, Dover Drive, Cheshire, CH65 9BF. Registered in England No: 6876840, Mercury Vehicle Solutions Ltd are a credit broker and not a lender, we are authorised and regulated by the Financial Conduct Authority (FCA) for credit broking activities. Our registration number is 654819.
                    Details of this application will be passed to a credit reference agency in order to credit score the application. A record of the search is retained by the credit reference agency.</h6></div>
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
