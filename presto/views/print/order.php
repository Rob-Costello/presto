<?php $total_price = 0; ?>
<!DOCTYPE html>
<head>

  <style type="text/css">
    body {
      margin:     0;
      padding:    0;
      width:      21cm;
      height:     29.7cm;
    }

    /* Printable area */
    #print-area {
      position:   relative;
      top:        1cm;
      left:       1cm;
      width:      19cm;
      height:     27.6cm;

      font-size:      10px;
      font-family:    Arial;
    }

    #header {
      height:     3cm;

      background: #ccc;
    }
    #footer {
      position:   absolute;
      bottom:     0;
      width:      100%;
      height:     3cm;

      background: #ccc;
    }
  </style>
</head>
<body>

<div id="print-area">
  <div id="header">
    This is an example headernbmv.
  </div>
  <div id="content">
    <h1>Demo</h1>
    <p>This is example content</p>
  </div>
  <div id="footer">
    This is an example footer.
  </div>
</div>

</body>
<!--<body class="fix-sidebar">-->
<!--<div id="wrapper">-->
<!--      <!-- /.row -->-->
<!--      <div class="row">-->
<!--        <div class="col-md-12">-->
<!--          <div class="white-box">-->
<!--            <h3><b>Order</b> <span class="pull-right">#--><?php //echo $content->id ?><!--</span></h3>-->
<!--            <hr>-->
<!--            <div class="row">-->
<!--              <h3>Vehicle Purchase Order / Proposed Credit Agreement Details</h3>-->
<!--            </div>-->
<!--            <div class="row">-->
<!--              <div class="col-md-12">-->
<!--                  <address>-->
<!--                    <img src="--><?php //echo $this->config->item('site_url'); ?><!--assets/images/car-leasing-online-logo.svg" width="300px;">-->
<!--                    <div  class="pull-right text-right"><p class="text-muted m-l-5">Tel: 01513 56 56 29<br/>-->
<!--                    Fax: 0845 652 26 87<br/>-->
<!--                    Website: www.carleasing-online.co.uk</p>-->
<!--                  </address></div>-->
<!--              </div>-->
<!--          <div class="row">-->
<!--            <div class="col-md-12 m-t-40">-->
<!--              <address>-->
<!--                <p>-->
<!--                <b>Date of issue :<b> <i class="fa fa-calendar"></i> --><?php //echo date_format(date_create($content->datetime), 'jS F Y'); ?><!--</b><br />-->
<!--                  Name :<b> --><?php //echo $content->first_name . ' ' . $content->last_name; ?><!--</b><br />-->
<!--                  Address:<b> --><?php //echo $content->address_line_1 . ' ' . $content->address_line_2 . ' ' . $content->address_line_3 . ' ' . $content->town . ' ' . $content->county . ' ' . $content->postcode; ?>
<!--                </p>-->
<!--              </address>-->
<!--            </div>-->
<!--          </div>-->
<!--          <div class="row">-->
<!--              <div class="col-md-12">-->
<!--                <h4>Vehicle Details</h4>-->
<!--                <div class="table-responsive m-t-40">-->
<!--                  <table class="table table-hover">-->
<!--                    <tbody>-->
<!--                      <tr>-->
<!--                        <td>Make, Model &amp; Engine Size</td>-->
<!--                        <td>--><?php //echo $content->manufacturer . ' ' . $content->model . ' ' . $content->description; ?><!--</td>-->
<!--                      </tr>-->
<!--                      <tr>-->
<!--                        <td>Colour Choice</td>-->
<!--                        <td>--><?php //echo $content->colour; ?><!--</td>-->
<!--                        --><?php //if($content->personal == 1)
//                          $price = $content->colour_price + $content->colour_vat;
//                        else
//                          $price = $content->colour_price;
//                        $total_price = $total_price + $price; echo $price; ?>
<!--                      </tr>-->
<!--                      <tr>-->
<!--                        <td>Trim</td>-->
<!--                        <td>--><?php //echo $content->trim; ?><!--</td>-->
<!--                      </tr>-->
<!--                      <tr>-->
<!--                        <td>Options</td>-->
<!--                        <td>--><?php //if(count($options) > 0){ foreach($options as $o){ echo $o->description . ', '; } if($content->personal == 1)
//                            $o->price = $o->basic_price + $o->vat;
//                          else
//                            $o->price = $o->basic_price;
//                            $total_price = $total_price + $o->price;} else { echo 'n/a'; }?><!--</td>-->
<!--                      </tr>-->
<!--                    </tbody>-->
<!--                  </table>-->
<!--                </div>-->
<!--              </div>-->
<!--            --><?php //$priceSplit = $total_price / ($content->initial + $content->months); $content->price = number_format($content->price + $priceSplit, 2, '.', ''); ?>
<!--            <div class="col-md-12">-->
<!--              <h4>Proposed Credit and Maintenance Agreement Details</h4>-->
<!--              <div class="table-responsive m-t-40">-->
<!--                <table class="table table-hover">-->
<!--                  <tbody>-->
<!--                  <tr>-->
<!--                    <td>Annual Milage</td>-->
<!--                    <td colspan="2">--><?php //echo $content->miles; ?><!--</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Maintenance Cover Required</td>-->
<!--                    <td colspan="2">n/a</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Period of Agreement</td>-->
<!--                    <td colspan="2">--><?php //echo $content->months + 1 ?><!-- months - --><?php //echo $content->initial ?><!--+--><?php //echo $content->months ?><!-- --><?php //if($content->personal == 1) echo 'Personal'; else echo 'Business'; ?><!-- Contract Hire</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td></td>-->
<!--                    <td></td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td><b>Cedit Agreement Details:</b></td>-->
<!--                    <td colspan="2">All payments --><?php //if($content->personal == 1) echo 'Including'; else echo 'Excluding'; ?><!-- VAT</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Order booking fee</td>-->
<!--                    <td colspan="2">&pound;--><?php //echo $content->booking_fee; ?><!--</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Initial Payment</td>-->
<!--                    <td>&pound;--><?php //echo $content->price * $content->initial; ?><!--</td>-->
<!--                    <td>to be paid with vehicle order</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Monthly Lease Payment</td>-->
<!--                    <td>&pound;--><?php //echo $content->price; ?><!--</td>-->
<!--                    <td>Starts one month after delivery</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Monthly Maintenance Payment</td>-->
<!--                    <td colspan="2">n/a</td>-->
<!--                  </tr>-->
<!--                  <tr>-->
<!--                    <td>Total Monthly Payment</td>-->
<!--                    <td colspan="2">&pound;--><?php //echo $content->price; ?><!--</td>-->
<!--                  </tr>-->
<!--                  </tbody>-->
<!--                </table>-->
<!--              </div>-->
<!--            </div>-->
<!--            </div>-->
<!--              <div class="col-md-12">-->
<!--                <div class="featured-plan">-->
<!---->
<!--                  <h6 class="pricing-body" style="font-weight: normal">Prices subject to vehicle availability and any manufacturer’s price changes.<br />-->
<!--                    The payment terms are 6 payments in advance followed by 23 monthly payments commencing in month 2 payable by variable direct debit.<br />-->
<!--                    The order form contains the full vehicle specification including make, model, colour choices and optional extras.  Please ensure that you check the details as it is the customer’s responsibility to ensure the details on the order form are correct and correspond exactly with the vehicle requested.  Carleasing-online accepts no responsibility for order forms being incorrect and subsequently accepts no responsibility for incorrect vehicle orders as a result of an incorrect order form. Upon signing the order form you confirm that we are to supply you the vehicle as described above. When you place an order you will be advised of an approximate delivery date.  This should be taken as an indication only and not an exact date.  Delivery of the vehicle is outside the control of Carleasing-online and therefore we accept no responsibility for delivery dates being changed by the dealer or manufacturer.<br />-->
<!--                    Carleasing-online will not be held liable for any losses or damages arising from any delay in delivery.<br />-->
<!--                    Should you decide to cancel the order before delivery then you will be liable for a cancellation charge of £500 including vat.-->
<!--                  </h6></div>-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--      <!-- .row -->-->
<!--    </div>-->
<!--    <!-- /.container-fluid -->-->
<!--</div>-->
<!--</body>-->
</html>
