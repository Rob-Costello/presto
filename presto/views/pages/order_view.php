<?php $this->load->view('includes/header.php'); ?>
    <div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Order</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="/presto/dashboard/">Dashboard</a></li>
                <li class="active">Order</li>
            </ol>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if( $messages != '' ) { ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $messages; ?>
                </div>
            <?php } ?>

            <?php if( $errors != '' ) { ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $errors; ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <!--.row-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <section>
                    <div class="sttabs tabs-style-bar">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="#section-bar-1" class="sticon icon-user"><span>Order Details</span></a></li>
                                <li><a href="#section-bar-2" class="sticon icon-note"><span>Extra Details</span></a></li>
                                <li><a href="#section-bar-3" class="sticon icon-calculator"><span>History</span></a></li>
                                <li><a href="#section-bar-4" class="sticon icon-docs"><span>Notes</span></a></li>

                            </ul>
                        </nav>
                        <div class="panel-wrapper collapse in" aria-expanded="true">
                            <div class="panel-body">
                                <div class="content-wrap">
                                    <section id="section-bar-1" class="content-current"><form method="POST" class="form-horizontal">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Order Number</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="last_name" class="form-control" value="0000001" placeholder="Doe" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Order Date</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="home_phone" class="form-control" value="04/04/2018" placeholder="0123 456789" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Description</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="work_phone" class="form-control" value="Website Order" placeholder="0123 456789" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Created By</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="mobile_phone" class="form-control" value="Website" placeholder="0123 456789" autocomplete="off" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Client's Reference</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="work_phone" class="form-control" value="" placeholder="0123 456789" autocomplete="off" data-com.agilebits.onepassword.user-edited="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Our Reference</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="mobile_phone" class="form-control" value="" placeholder="0123 456789" autocomplete="off" data-com.agilebits.onepassword.user-edited="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Invoice to</label>
                                                            <div class="col-md-9">
                                                                    <textarea name="notes" class="form-control" style="
    height: 140px;
">david wright (The AIRworjs)
2 huntly
bishopsteignton
tq149sl
United Kingdom</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Deliver to</label>
                                                            <div class="col-md-9">
                                                                    <textarea name="notes" class="form-control" style="
    height: 140px;
">david wright (The AIRworjs)
2 huntly
bishopsteignton
tq149sl
United Kingdom</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Order Status</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control"><option>Processing Order</option></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Telephone No</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="mobile_phone" class="form-control" value="" placeholder="0123 456789" autocomplete="off" data-com.agilebits.onepassword.user-edited="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Cost Centre</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control"><option></option></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Mobile No</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="mobile_phone" class="form-control" value="" placeholder="0123 456789" autocomplete="off" data-com.agilebits.onepassword.user-edited="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Payment Due</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="mobile_phone" class="form-control" value="" placeholder="0123 456789" autocomplete="off" data-com.agilebits.onepassword.user-edited="yes">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input hidden="hidden" name="form" value="customer">
                                                                <button type="submit" class="btn btn-success">Save</button>
                                                                <button type="button" onclick="location.href='/secure/customers/';" class="btn btn-default">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> </div>
                                                </div>
                                            </div>
                                        </form></section>
                                    <section id="section-bar-2">

                                        <form method="POST" class="form-horizontal" id="notesForm">
                                            <div class="form-body">
                                                <h3 class="box-title">Note Info</h3>
                                                <hr class="m-t-0 m-b-40">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Status</label>
                                                            <div class="col-md-9">
                                                                <select name="notes_status_id" class="form-control note-statuses">
                                                                    <option>Select</option>
                                                                    <option value="1" data-group-assign="3">New Lead</option>
                                                                    <optgroup label="Sales">
                                                                        <option value="2" data-group-assign="3">Called/emailed once - no contact</option>
                                                                        <option value="3" data-group-assign="3">Called/emailed twice - no contact</option>
                                                                        <option value="4" data-group-assign="3">Called/emailed thrice - no contact, lost</option>
                                                                        <option value="5" data-group-assign="3">Contacted - not yet quoted (waiting on dealer)</option>
                                                                        <option value="6" data-group-assign="3">Contacted - not yet quoted (to run)</option>
                                                                        <option value="7" data-group-assign="3">Quote</option>
                                                                        <option value="8" data-group-assign="3">Quoted - further info needed</option>
                                                                        <option value="9" data-group-assign="3">Finance submitted</option>
                                                                        <option value="10" data-group-assign="3">Order Out</option>
                                                                        <option value="11" data-group-assign="6">Order placed with dealer</option>
                                                                        <option value="12">Lost - price</option>
                                                                        <option value="13">Lost - availability</option>
                                                                        <option value="14">Lost - unknown/other</option>
                                                                        <option value="15">Lost - declined</option>
                                                                    </optgroup>
                                                                    <optgroup label="Invoicing">
                                                                        <option value="27" data-group-assign="5">Invoice required</option>
                                                                        <option value="16" data-group-assign="5">Invoice generated</option>
                                                                    </optgroup>
                                                                    <optgroup label="Delivery">
                                                                        <option value="17" data-group-assign="5">Fee invoice sent</option>
                                                                        <option value="18" data-group-assign="3">Fee paid, pending docs</option>
                                                                        <option value="19" data-group-assign="5">Docs sent to customer</option>
                                                                        <option value="20" data-group-assign="5">Docs received - pending delivery</option>
                                                                        <option value="21" data-group-assign="6">Car delivered - sent to invoice</option>
                                                                        <option value="22" data-group-assign="5">Car delivered - waiting invoice pack</option>
                                                                        <option value="23">Lost - did not proceed</option>
                                                                    </optgroup>
                                                                    <optgroup label="Invoicing">
                                                                        <option value="24" data-group-assign="6">Car Invoiced</option>
                                                                        <option value="25" data-group-assign="6">Invoice error</option>
                                                                        <option value="26" data-group-assign="6">Paid</option>
                                                                    </optgroup></select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Follow Up</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="follow_up_datetime" class="form-control datetimepicker" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Note</label>
                                                            <div class="col-md-9">
                                                                <textarea class="form-control" rows="5" name="note"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input type="hidden" name="form" value="note">
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> </div>
                                                </div>
                                            </div>
                                        </form>

                                        <h3 class="box-title m-b-0 m-t-40">Note History </h3>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Date</th>
                                                    <th>Outcome</th>
                                                    <th>Note</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr><td colspan="4" align="center">No note history</td></tr>
                                                </tbody>
                                            </table>
                                        </div></section>
                                    <section id="section-bar-3">
                                        <form method="POST" class="form-horizontal" id="quote_form">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-lg-2 col-md-offset-5">
                                                        <button class="btn btn-block btn-default quoteListToggle">View Quotes</button>
                                                    </div>
                                                </div>
                                                <div class="row" id="quotes-list" style="display: none;">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Details</th>
                                                            <th>Created</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td align="center">1</td>
                                                            <td>AUDI Q5 Q5 SUV 2.0 TDI 190ps QTRO SE S trc      </td>
                                                            <td><i class="fa fa-clock-o"></i> Mar 20, 2018</td>
                                                            <td><a target="_blank" href="/qph/customers/viewQuote/71/" class="fcbtn btn btn-success btn-outline btn-1f">View Quote</a> <a href="/qph/customers/view/59/create/application/71/" class="fcbtn btn btn-success btn-outline btn-1f">Create Application</a> <a href="/qph/customers/view/59/email/quote/71/" class="fcbtn btn btn-success btn-outline btn-1f">Email Quote</a></td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h3 class="box-title">Quote Info</h3>
                                                <hr class="m-t-0 m-b-40">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Manufacturer</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="manufacturer" id="mark">
                                                                    <option>Select</option>
                                                                    <option value=""></option>
                                                                    <option value="ABARTH">ABARTH</option>
                                                                    <option value="ALFA ROMEO">ALFA ROMEO</option>
                                                                    <option value="AUDI">AUDI</option>
                                                                    <option value="Audi">Audi</option>
                                                                    <option value="BMW">BMW</option>
                                                                    <option value="CITROEN">CITROEN</option>
                                                                    <option value="DACIA">DACIA</option>
                                                                    <option value="DS">DS</option>
                                                                    <option value="FIAT">FIAT</option>
                                                                    <option value="FORD">FORD</option>
                                                                    <option value="Ford">Ford</option>
                                                                    <option value="HONDA">HONDA</option>
                                                                    <option value="Hyundai">Hyundai</option>
                                                                    <option value="INFINITI">INFINITI</option>
                                                                    <option value="JAGUAR">JAGUAR</option>
                                                                    <option value="JEEP">JEEP</option>
                                                                    <option value="Kia">Kia</option>
                                                                    <option value="KIA">KIA</option>
                                                                    <option value="LAND ROVER">LAND ROVER</option>
                                                                    <option value="Lexus">Lexus</option>
                                                                    <option value="LEXUS">LEXUS</option>
                                                                    <option value="MASERATI">MASERATI</option>
                                                                    <option value="Mazda">Mazda</option>
                                                                    <option value="Mercedes">Mercedes</option>
                                                                    <option value="MERCEDES">MERCEDES</option>
                                                                    <option value="MERCEDES-BENZ">MERCEDES-BENZ</option>
                                                                    <option value="MG">MG</option>
                                                                    <option value="MINI">MINI</option>
                                                                    <option value="MITSUBISHI">MITSUBISHI</option>
                                                                    <option value="Nissan">Nissan</option>
                                                                    <option value="NISSAN">NISSAN</option>
                                                                    <option value="PEUGEOT">PEUGEOT</option>
                                                                    <option value="PORSCHE">PORSCHE</option>
                                                                    <option value="RENAULT">RENAULT</option>
                                                                    <option value="SEAT">SEAT</option>
                                                                    <option value="Select">Select</option>
                                                                    <option value="SKODA">SKODA</option>
                                                                    <option value="SMART">SMART</option>
                                                                    <option value="Smart">Smart</option>
                                                                    <option value="SUBARU">SUBARU</option>
                                                                    <option value="TOYOTA">TOYOTA</option>
                                                                    <option value="VAUXHALL">VAUXHALL</option>
                                                                    <option value="VOLKSWAGEN">VOLKSWAGEN</option>
                                                                    <option value="VOLVO">VOLVO</option>
                                                                    <option value="Volvo">Volvo</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Model</label>
                                                            <div class="col-md-9">
                                                                <select name="model" class="form-control" id="series" onchange="populateDerivaties()">
                                                                    <option value="" class=""></option>
                                                                    <option value="Select" class="Select">Select</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Derivatives</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="derivative" id="derivatives">
                                                                    <option>Select</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Trim</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="trim" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                                    <div class="row">-->
                                                <!--                                                        <div class="col-sm-6">-->
                                                <!--                                                            <div class="form-group">-->
                                                <!--                                                                <label class="control-label col-md-3">Colour</label>-->
                                                <!--                                                                <div class="col-md-9">-->
                                                <!--                                                                    <select class="form-control" name="colour" id="colour">-->
                                                <!--                                                                        <option>Select</option>-->
                                                <!--                                                                    </select>-->
                                                <!--                                                                </div>-->
                                                <!--                                                            </div>-->
                                                <!--                                                        </div>-->
                                                <!--                                                    </div>-->
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Excess Mileage</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="excess_mileage" value="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Booking Fee</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="booking_fee" value="250">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Anticipated Delivery Date</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="anticipated_delivery_date" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h3>Offer Prices</h3>
                                                        <hr class="m-t-0 m-b-40">
                                                        <div class="form-group">
                                                            <div class="col-md-12" id="prices">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3>Custom Price</h3>
                                                        <hr class="m-t-0 m-b-40">
                                                        <div class="form-group">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <th class="col-md-3">Inital</th>
                                                                        <th class="col-md-3">Period</th>
                                                                        <th class="col-md-3">Miles</th>
                                                                        <th class="col-md-3">Price</th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <!--<label class="control-label col-md-2">Add Comment</label>-->
                                                            <div class="col-md-3">
                                                                <select name="initial" id="initial" class="form-control" onchange="updateQuoteTotal()">
                                                                    <option value="3">3</option>
                                                                    <option value="6">6</option>
                                                                    <option value="9">9</option>
                                                                </select>
                                                            </div>
                                                            <!--<div class="col-md-1">
                                                                <input name="deposit" class="form-control">
                                                            </div>-->
                                                            <div class="col-md-3">
                                                                <select name="months" id="months" class="form-control" onchange="updateQuoteTotal()">
                                                                    <option value="23">23</option>
                                                                    <option value="35">35</option>
                                                                    <option value="47">47</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <select name="miles" id="miles" class="form-control" onchange="updateQuoteTotal()">
                                                                    <option value="6000">6k</option>
                                                                    <option value="8000">8k</option>
                                                                    <option value="10000">10k</option>
                                                                    <option value="12000">12k</option>
                                                                    <option value="15000">15k</option>
                                                                    <option value="20000">20k</option>
                                                                    <option value="25000">25k</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text" name="price" id="price" class="form-control" onchange="updateQuoteTotal()">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h3>Vehicle Options</h3>
                                                        <hr class="m-t-0 m-b-40">
                                                        <div class="form-group">
                                                            <div class="col-md-12" id="options">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-offset-9 col-md-4 col-lg-3 col-sm-6 col-xs-12">
                                                        <div class="white-box bg-purple m-b-15">
                                                            <h3 class="text-white box-title">TOTAL</h3>
                                                            <div class="row">
                                                                <div class="col-md-6 col-sm-6 col-xs-6  m-t-30">
                                                                    <h1 class="text-white">£<span id="total">0</span></h1>
                                                                    <p id="total_details" class="light_op_text"></p>
                                                                    <b class="text-white">excl VAT</b>
                                                                </div>
                                                                <div class="col-md-6 col-xs-6 col-lg-6 col-sm-6 text-right">
                                                                    <b class="text-white">Deposit £<span id="total_deposit">0</span></b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input type="hidden" name="form" value="quote">
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <script>
                                            var phpVars = {
                                                personal: 0,
                                                activeTab: "",
                                            };
                                        </script>
                                    </section>
                                    <section id="section-bar-4">
                                        <form method="POST" class="form-horizontal" id="application_form">
                                            <div class="form-body">

                                                <div class="row">
                                                    <div class="col-lg-2 col-md-offset-5">
                                                        <button class="btn btn-block btn-default applicationListToggle">View Applications</button>
                                                    </div>
                                                </div>
                                                <div class="row" id="applications-list" style="display: none;">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Details</th>
                                                            <th>Created</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td align="center">1</td>
                                                            <td>AUDI Q5 Q5 SUV 2.0 TDI 190ps QTRO SE S trc      </td>
                                                            <td><i class="fa fa-clock-o"></i> Mar 20, 2018</td>
                                                            <td><a target="_blank" href="/qph/customers/viewApplication/19/" class="fcbtn btn btn-success btn-outline btn-1f">View Application</a> <a href="/qph/customers/view/59/create/order/71/" class="fcbtn btn btn-success btn-outline btn-1f">Create Order</a>
                                                                <div class="fcbtn btn btn-info btn-outline btn-1f">Contact  </div>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <h3 class="box-title">Personal Details</h3>
                                                <hr class="m-t-0 m-b-40">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Mr</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">First Name</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">Business</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <!--/row-->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Last Name</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">business</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Martial Status</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="marital_status">
                                                                    <option>Select</option>
                                                                    <option value="single">single</option>
                                                                    <option value="married">married</option>
                                                                    <option value="separated">separated</option>
                                                                    <option value="divorced">divorced</option>
                                                                    <option value="widowed">widowed</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Nationality</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="nationality" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Home Phone</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">01514567894</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Work Phone</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Mobile Phone</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static"></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Date of Birth</label>
                                                            <div class="col-md-9">
                                                                <p class="form-control-static">01/01/1970</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Number of Dependants</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="number" name="dependants" value="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h3>Current Address</h3>
                                                        <hr class="m-t-0 m-b-40">
                                                        <div class="form-group">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Address Line 1</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" name="address_line_1" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Address Line 2</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" name="address_line_2" value="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Address Line 3</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="address_line_3" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Town/City</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="town" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">County</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="county" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Postcode</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="postcode" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Country</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="country">
                                                                        <option>Select</option>
                                                                        <option value="Afghanistan">Afghanistan</option>
                                                                        <option value="Albania">Albania</option>
                                                                        <option value="Algeria">Algeria</option>
                                                                        <option value="American Samoa">American Samoa</option>
                                                                        <option value="Andorra">Andorra</option>
                                                                        <option value="Angola">Angola</option>
                                                                        <option value="Anguilla">Anguilla</option>
                                                                        <option value="Antarctica">Antarctica</option>
                                                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                        <option value="Argentina">Argentina</option>
                                                                        <option value="Armenia">Armenia</option>
                                                                        <option value="Aruba">Aruba</option>
                                                                        <option value="Australia">Australia</option>
                                                                        <option value="Austria">Austria</option>
                                                                        <option value="Azerbaijan">Azerbaijan</option>
                                                                        <option value="Bahamas">Bahamas</option>
                                                                        <option value="Bahrain">Bahrain</option>
                                                                        <option value="Bangladesh">Bangladesh</option>
                                                                        <option value="Barbados">Barbados</option>
                                                                        <option value="Belarus">Belarus</option>
                                                                        <option value="Belgium">Belgium</option>
                                                                        <option value="Belize">Belize</option>
                                                                        <option value="Benin">Benin</option>
                                                                        <option value="Bermuda">Bermuda</option>
                                                                        <option value="Bhutan">Bhutan</option>
                                                                        <option value="Bolivia">Bolivia</option>
                                                                        <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                                        <option value="Botswana">Botswana</option>
                                                                        <option value="Bouvet Island">Bouvet Island</option>
                                                                        <option value="Brazil">Brazil</option>
                                                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                        <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                        <option value="Bulgaria">Bulgaria</option>
                                                                        <option value="Burkina Faso">Burkina Faso</option>
                                                                        <option value="Burundi">Burundi</option>
                                                                        <option value="Cambodia">Cambodia</option>
                                                                        <option value="Cameroon">Cameroon</option>
                                                                        <option value="Canada">Canada</option>
                                                                        <option value="Cape Verde">Cape Verde</option>
                                                                        <option value="Cayman Islands">Cayman Islands</option>
                                                                        <option value="Central African Republic">Central African Republic</option>
                                                                        <option value="Chad">Chad</option>
                                                                        <option value="Chile">Chile</option>
                                                                        <option value="China">China</option>
                                                                        <option value="Christmas Island">Christmas Island</option>
                                                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                        <option value="Colombia">Colombia</option>
                                                                        <option value="Comoros">Comoros</option>
                                                                        <option value="Congo">Congo</option>
                                                                        <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                                        <option value="Cook Islands">Cook Islands</option>
                                                                        <option value="Costa Rica">Costa Rica</option>
                                                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                                                        <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                                        <option value="Cuba">Cuba</option>
                                                                        <option value="Cyprus">Cyprus</option>
                                                                        <option value="Czech Republic">Czech Republic</option>
                                                                        <option value="Denmark">Denmark</option>
                                                                        <option value="Djibouti">Djibouti</option>
                                                                        <option value="Dominica">Dominica</option>
                                                                        <option value="Dominican Republic">Dominican Republic</option>
                                                                        <option value="East Timor">East Timor</option>
                                                                        <option value="Ecuador">Ecuador</option>
                                                                        <option value="Egypt">Egypt</option>
                                                                        <option value="El Salvador">El Salvador</option>
                                                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                        <option value="Eritrea">Eritrea</option>
                                                                        <option value="Estonia">Estonia</option>
                                                                        <option value="Ethiopia">Ethiopia</option>
                                                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                        <option value="Faroe Islands">Faroe Islands</option>
                                                                        <option value="Fiji">Fiji</option>
                                                                        <option value="Finland">Finland</option>
                                                                        <option value="France">France</option>
                                                                        <option value="France Metropolitan">France Metropolitan</option>
                                                                        <option value="French Guiana">French Guiana</option>
                                                                        <option value="French Polynesia">French Polynesia</option>
                                                                        <option value="French Southern Territories">French Southern Territories</option>
                                                                        <option value="Gabon">Gabon</option>
                                                                        <option value="Gambia">Gambia</option>
                                                                        <option value="Georgia">Georgia</option>
                                                                        <option value="Germany">Germany</option>
                                                                        <option value="Ghana">Ghana</option>
                                                                        <option value="Gibraltar">Gibraltar</option>
                                                                        <option value="Greece">Greece</option>
                                                                        <option value="Greenland">Greenland</option>
                                                                        <option value="Grenada">Grenada</option>
                                                                        <option value="Guadeloupe">Guadeloupe</option>
                                                                        <option value="Guam">Guam</option>
                                                                        <option value="Guatemala">Guatemala</option>
                                                                        <option value="Guinea">Guinea</option>
                                                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                        <option value="Guyana">Guyana</option>
                                                                        <option value="Haiti">Haiti</option>
                                                                        <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                        <option value="Honduras">Honduras</option>
                                                                        <option value="Hong Kong">Hong Kong</option>
                                                                        <option value="Hungary">Hungary</option>
                                                                        <option value="Iceland">Iceland</option>
                                                                        <option value="India">India</option>
                                                                        <option value="Indonesia">Indonesia</option>
                                                                        <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                                        <option value="Iraq">Iraq</option>
                                                                        <option value="Ireland">Ireland</option>
                                                                        <option value="Israel">Israel</option>
                                                                        <option value="Italy">Italy</option>
                                                                        <option value="Jamaica">Jamaica</option>
                                                                        <option value="Japan">Japan</option>
                                                                        <option value="Jordan">Jordan</option>
                                                                        <option value="Kazakhstan">Kazakhstan</option>
                                                                        <option value="Kenya">Kenya</option>
                                                                        <option value="Kiribati">Kiribati</option>
                                                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                        <option value="Korea, Republic of">Korea, Republic of</option>
                                                                        <option value="Kuwait">Kuwait</option>
                                                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                        <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                                                                        <option value="Latvia">Latvia</option>
                                                                        <option value="Lebanon">Lebanon</option>
                                                                        <option value="Lesotho">Lesotho</option>
                                                                        <option value="Liberia">Liberia</option>
                                                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                        <option value="Liechtenstein">Liechtenstein</option>
                                                                        <option value="Lithuania">Lithuania</option>
                                                                        <option value="Luxembourg">Luxembourg</option>
                                                                        <option value="Macau">Macau</option>
                                                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                        <option value="Madagascar">Madagascar</option>
                                                                        <option value="Malawi">Malawi</option>
                                                                        <option value="Malaysia">Malaysia</option>
                                                                        <option value="Maldives">Maldives</option>
                                                                        <option value="Mali">Mali</option>
                                                                        <option value="Malta">Malta</option>
                                                                        <option value="Marshall Islands">Marshall Islands</option>
                                                                        <option value="Martinique">Martinique</option>
                                                                        <option value="Mauritania">Mauritania</option>
                                                                        <option value="Mauritius">Mauritius</option>
                                                                        <option value="Mayotte">Mayotte</option>
                                                                        <option value="Mexico">Mexico</option>
                                                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                        <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                        <option value="Monaco">Monaco</option>
                                                                        <option value="Mongolia">Mongolia</option>
                                                                        <option value="Montserrat">Montserrat</option>
                                                                        <option value="Morocco">Morocco</option>
                                                                        <option value="Mozambique">Mozambique</option>
                                                                        <option value="Myanmar">Myanmar</option>
                                                                        <option value="Namibia">Namibia</option>
                                                                        <option value="Nauru">Nauru</option>
                                                                        <option value="Nepal">Nepal</option>
                                                                        <option value="Netherlands">Netherlands</option>
                                                                        <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                        <option value="New Caledonia">New Caledonia</option>
                                                                        <option value="New Zealand">New Zealand</option>
                                                                        <option value="Nicaragua">Nicaragua</option>
                                                                        <option value="Niger">Niger</option>
                                                                        <option value="Nigeria">Nigeria</option>
                                                                        <option value="Niue">Niue</option>
                                                                        <option value="Norfolk Island">Norfolk Island</option>
                                                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                        <option value="Norway">Norway</option>
                                                                        <option value="Oman">Oman</option>
                                                                        <option value="Pakistan">Pakistan</option>
                                                                        <option value="Palau">Palau</option>
                                                                        <option value="Panama">Panama</option>
                                                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                                                        <option value="Paraguay">Paraguay</option>
                                                                        <option value="Peru">Peru</option>
                                                                        <option value="Philippines">Philippines</option>
                                                                        <option value="Pitcairn">Pitcairn</option>
                                                                        <option value="Poland">Poland</option>
                                                                        <option value="Portugal">Portugal</option>
                                                                        <option value="Puerto Rico">Puerto Rico</option>
                                                                        <option value="Qatar">Qatar</option>
                                                                        <option value="Reunion">Reunion</option>
                                                                        <option value="Romania">Romania</option>
                                                                        <option value="Russian Federation">Russian Federation</option>
                                                                        <option value="Rwanda">Rwanda</option>
                                                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                        <option value="Saint Lucia">Saint Lucia</option>
                                                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                        <option value="Samoa">Samoa</option>
                                                                        <option value="San Marino">San Marino</option>
                                                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                                                        <option value="Senegal">Senegal</option>
                                                                        <option value="Seychelles">Seychelles</option>
                                                                        <option value="Sierra Leone">Sierra Leone</option>
                                                                        <option value="Singapore">Singapore</option>
                                                                        <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                                                        <option value="Slovenia">Slovenia</option>
                                                                        <option value="Solomon Islands">Solomon Islands</option>
                                                                        <option value="Somalia">Somalia</option>
                                                                        <option value="South Africa">South Africa</option>
                                                                        <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                                        <option value="Spain">Spain</option>
                                                                        <option value="Sri Lanka">Sri Lanka</option>
                                                                        <option value="St. Helena">St. Helena</option>
                                                                        <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                                        <option value="Sudan">Sudan</option>
                                                                        <option value="Suriname">Suriname</option>
                                                                        <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                                        <option value="Swaziland">Swaziland</option>
                                                                        <option value="Sweden">Sweden</option>
                                                                        <option value="Switzerland">Switzerland</option>
                                                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                        <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                        <option value="Tajikistan">Tajikistan</option>
                                                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                        <option value="Thailand">Thailand</option>
                                                                        <option value="Togo">Togo</option>
                                                                        <option value="Tokelau">Tokelau</option>
                                                                        <option value="Tonga">Tonga</option>
                                                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                        <option value="Tunisia">Tunisia</option>
                                                                        <option value="Turkey">Turkey</option>
                                                                        <option value="Turkmenistan">Turkmenistan</option>
                                                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                        <option value="Tuvalu">Tuvalu</option>
                                                                        <option value="Uganda">Uganda</option>
                                                                        <option value="Ukraine">Ukraine</option>
                                                                        <option value="United Arab Emirates">United Arab Emirates</option>
                                                                        <option value="United Kingdom">United Kingdom</option>
                                                                        <option value="United States">United States</option>
                                                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                        <option value="Uruguay">Uruguay</option>
                                                                        <option value="Uzbekistan">Uzbekistan</option>
                                                                        <option value="Vanuatu">Vanuatu</option>
                                                                        <option value="Venezuela">Venezuela</option>
                                                                        <option value="Vietnam">Vietnam</option>
                                                                        <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                                        <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                                        <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                                        <option value="Western Sahara">Western Sahara</option>
                                                                        <option value="Yemen">Yemen</option>
                                                                        <option value="Yugoslavia">Yugoslavia</option>
                                                                        <option value="Zambia">Zambia</option>
                                                                        <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Time at address</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="time_at_address" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Accommodation Status</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="accommodation_status">
                                                                    <option>Select</option>
                                                                    <option value="Owner - Mortgage">Owner - Mortgage</option>
                                                                    <option value="Owner - Outright">Owner - Outright</option>
                                                                    <option value="With Parents">With Parents</option>
                                                                    <option value="Rented">Rented</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row repeater">
                                                    <div class="col-sm-12">
                                                        <h3></h3>
                                                        <hr class="m-t-0 m-b-40">
                                                        <div class="row" data-repeater-list="addresses">
                                                            <div class="col-md-12" data-repeater-item="">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <h3>Previous Address</h3>
                                                                        <hr class="m-t-0 m-b-40">
                                                                        <div class="form-group">
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Address Line 1</label>
                                                                                    <div class="col-md-9">
                                                                                        <input class="form-control" type="text" name="addresses[0][addr_line_1]">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <div class="form-group">
                                                                                    <label class="control-label col-md-3">Address Line 2</label>
                                                                                    <div class="col-md-9">
                                                                                        <input class="form-control" type="text" name="addresses[0][addr_line_2]">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Address Line 3</label>
                                                                                <div class="col-md-9">
                                                                                    <input class="form-control" type="text" name="addresses[0][addr_line_3]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Town/City</label>
                                                                                <div class="col-md-9">
                                                                                    <input class="form-control" type="text" name="addresses[0][town]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">County</label>
                                                                                <div class="col-md-9">
                                                                                    <input class="form-control" type="text" name="addresses[0][county]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Postcode</label>
                                                                                <div class="col-md-9">
                                                                                    <input class="form-control" type="text" name="addresses[0][postcode]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Country</label>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control" name="addresses[0][country]">
                                                                                    <option>Select</option>
                                                                                    <option value="Afghanistan">Afghanistan</option>
                                                                                    <option value="Albania">Albania</option>
                                                                                    <option value="Algeria">Algeria</option>
                                                                                    <option value="American Samoa">American Samoa</option>
                                                                                    <option value="Andorra">Andorra</option>
                                                                                    <option value="Angola">Angola</option>
                                                                                    <option value="Anguilla">Anguilla</option>
                                                                                    <option value="Antarctica">Antarctica</option>
                                                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                                                    <option value="Argentina">Argentina</option>
                                                                                    <option value="Armenia">Armenia</option>
                                                                                    <option value="Aruba">Aruba</option>
                                                                                    <option value="Australia">Australia</option>
                                                                                    <option value="Austria">Austria</option>
                                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                                    <option value="Bahamas">Bahamas</option>
                                                                                    <option value="Bahrain">Bahrain</option>
                                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                                    <option value="Barbados">Barbados</option>
                                                                                    <option value="Belarus">Belarus</option>
                                                                                    <option value="Belgium">Belgium</option>
                                                                                    <option value="Belize">Belize</option>
                                                                                    <option value="Benin">Benin</option>
                                                                                    <option value="Bermuda">Bermuda</option>
                                                                                    <option value="Bhutan">Bhutan</option>
                                                                                    <option value="Bolivia">Bolivia</option>
                                                                                    <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                                                                                    <option value="Botswana">Botswana</option>
                                                                                    <option value="Bouvet Island">Bouvet Island</option>
                                                                                    <option value="Brazil">Brazil</option>
                                                                                    <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                                                                                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                                                    <option value="Burundi">Burundi</option>
                                                                                    <option value="Cambodia">Cambodia</option>
                                                                                    <option value="Cameroon">Cameroon</option>
                                                                                    <option value="Canada">Canada</option>
                                                                                    <option value="Cape Verde">Cape Verde</option>
                                                                                    <option value="Cayman Islands">Cayman Islands</option>
                                                                                    <option value="Central African Republic">Central African Republic</option>
                                                                                    <option value="Chad">Chad</option>
                                                                                    <option value="Chile">Chile</option>
                                                                                    <option value="China">China</option>
                                                                                    <option value="Christmas Island">Christmas Island</option>
                                                                                    <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                                                                                    <option value="Colombia">Colombia</option>
                                                                                    <option value="Comoros">Comoros</option>
                                                                                    <option value="Congo">Congo</option>
                                                                                    <option value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
                                                                                    <option value="Cook Islands">Cook Islands</option>
                                                                                    <option value="Costa Rica">Costa Rica</option>
                                                                                    <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                                                                    <option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option>
                                                                                    <option value="Cuba">Cuba</option>
                                                                                    <option value="Cyprus">Cyprus</option>
                                                                                    <option value="Czech Republic">Czech Republic</option>
                                                                                    <option value="Denmark">Denmark</option>
                                                                                    <option value="Djibouti">Djibouti</option>
                                                                                    <option value="Dominica">Dominica</option>
                                                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                                                    <option value="East Timor">East Timor</option>
                                                                                    <option value="Ecuador">Ecuador</option>
                                                                                    <option value="Egypt">Egypt</option>
                                                                                    <option value="El Salvador">El Salvador</option>
                                                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                                                    <option value="Eritrea">Eritrea</option>
                                                                                    <option value="Estonia">Estonia</option>
                                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                                    <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                                                                                    <option value="Faroe Islands">Faroe Islands</option>
                                                                                    <option value="Fiji">Fiji</option>
                                                                                    <option value="Finland">Finland</option>
                                                                                    <option value="France">France</option>
                                                                                    <option value="France Metropolitan">France Metropolitan</option>
                                                                                    <option value="French Guiana">French Guiana</option>
                                                                                    <option value="French Polynesia">French Polynesia</option>
                                                                                    <option value="French Southern Territories">French Southern Territories</option>
                                                                                    <option value="Gabon">Gabon</option>
                                                                                    <option value="Gambia">Gambia</option>
                                                                                    <option value="Georgia">Georgia</option>
                                                                                    <option value="Germany">Germany</option>
                                                                                    <option value="Ghana">Ghana</option>
                                                                                    <option value="Gibraltar">Gibraltar</option>
                                                                                    <option value="Greece">Greece</option>
                                                                                    <option value="Greenland">Greenland</option>
                                                                                    <option value="Grenada">Grenada</option>
                                                                                    <option value="Guadeloupe">Guadeloupe</option>
                                                                                    <option value="Guam">Guam</option>
                                                                                    <option value="Guatemala">Guatemala</option>
                                                                                    <option value="Guinea">Guinea</option>
                                                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                                    <option value="Guyana">Guyana</option>
                                                                                    <option value="Haiti">Haiti</option>
                                                                                    <option value="Heard and Mc Donald Islands">Heard and Mc Donald Islands</option>
                                                                                    <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                                                                                    <option value="Honduras">Honduras</option>
                                                                                    <option value="Hong Kong">Hong Kong</option>
                                                                                    <option value="Hungary">Hungary</option>
                                                                                    <option value="Iceland">Iceland</option>
                                                                                    <option value="India">India</option>
                                                                                    <option value="Indonesia">Indonesia</option>
                                                                                    <option value="Iran (Islamic Republic of)">Iran (Islamic Republic of)</option>
                                                                                    <option value="Iraq">Iraq</option>
                                                                                    <option value="Ireland">Ireland</option>
                                                                                    <option value="Israel">Israel</option>
                                                                                    <option value="Italy">Italy</option>
                                                                                    <option value="Jamaica">Jamaica</option>
                                                                                    <option value="Japan">Japan</option>
                                                                                    <option value="Jordan">Jordan</option>
                                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                                    <option value="Kenya">Kenya</option>
                                                                                    <option value="Kiribati">Kiribati</option>
                                                                                    <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                                                                                    <option value="Korea, Republic of">Korea, Republic of</option>
                                                                                    <option value="Kuwait">Kuwait</option>
                                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                                    <option value="Lao, People's Democratic Republic">Lao, People's Democratic Republic</option>
                                                                                    <option value="Latvia">Latvia</option>
                                                                                    <option value="Lebanon">Lebanon</option>
                                                                                    <option value="Lesotho">Lesotho</option>
                                                                                    <option value="Liberia">Liberia</option>
                                                                                    <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                                    <option value="Lithuania">Lithuania</option>
                                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                                    <option value="Macau">Macau</option>
                                                                                    <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                                                                                    <option value="Madagascar">Madagascar</option>
                                                                                    <option value="Malawi">Malawi</option>
                                                                                    <option value="Malaysia">Malaysia</option>
                                                                                    <option value="Maldives">Maldives</option>
                                                                                    <option value="Mali">Mali</option>
                                                                                    <option value="Malta">Malta</option>
                                                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                                                    <option value="Martinique">Martinique</option>
                                                                                    <option value="Mauritania">Mauritania</option>
                                                                                    <option value="Mauritius">Mauritius</option>
                                                                                    <option value="Mayotte">Mayotte</option>
                                                                                    <option value="Mexico">Mexico</option>
                                                                                    <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                                                                                    <option value="Moldova, Republic of">Moldova, Republic of</option>
                                                                                    <option value="Monaco">Monaco</option>
                                                                                    <option value="Mongolia">Mongolia</option>
                                                                                    <option value="Montserrat">Montserrat</option>
                                                                                    <option value="Morocco">Morocco</option>
                                                                                    <option value="Mozambique">Mozambique</option>
                                                                                    <option value="Myanmar">Myanmar</option>
                                                                                    <option value="Namibia">Namibia</option>
                                                                                    <option value="Nauru">Nauru</option>
                                                                                    <option value="Nepal">Nepal</option>
                                                                                    <option value="Netherlands">Netherlands</option>
                                                                                    <option value="Netherlands Antilles">Netherlands Antilles</option>
                                                                                    <option value="New Caledonia">New Caledonia</option>
                                                                                    <option value="New Zealand">New Zealand</option>
                                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                                    <option value="Niger">Niger</option>
                                                                                    <option value="Nigeria">Nigeria</option>
                                                                                    <option value="Niue">Niue</option>
                                                                                    <option value="Norfolk Island">Norfolk Island</option>
                                                                                    <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                                                                                    <option value="Norway">Norway</option>
                                                                                    <option value="Oman">Oman</option>
                                                                                    <option value="Pakistan">Pakistan</option>
                                                                                    <option value="Palau">Palau</option>
                                                                                    <option value="Panama">Panama</option>
                                                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                                                    <option value="Paraguay">Paraguay</option>
                                                                                    <option value="Peru">Peru</option>
                                                                                    <option value="Philippines">Philippines</option>
                                                                                    <option value="Pitcairn">Pitcairn</option>
                                                                                    <option value="Poland">Poland</option>
                                                                                    <option value="Portugal">Portugal</option>
                                                                                    <option value="Puerto Rico">Puerto Rico</option>
                                                                                    <option value="Qatar">Qatar</option>
                                                                                    <option value="Reunion">Reunion</option>
                                                                                    <option value="Romania">Romania</option>
                                                                                    <option value="Russian Federation">Russian Federation</option>
                                                                                    <option value="Rwanda">Rwanda</option>
                                                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                                                                    <option value="Samoa">Samoa</option>
                                                                                    <option value="San Marino">San Marino</option>
                                                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                                                    <option value="Senegal">Senegal</option>
                                                                                    <option value="Seychelles">Seychelles</option>
                                                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                                                    <option value="Singapore">Singapore</option>
                                                                                    <option value="Slovakia (Slovak Republic)">Slovakia (Slovak Republic)</option>
                                                                                    <option value="Slovenia">Slovenia</option>
                                                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                                                    <option value="Somalia">Somalia</option>
                                                                                    <option value="South Africa">South Africa</option>
                                                                                    <option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                                                                                    <option value="Spain">Spain</option>
                                                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                                                    <option value="St. Helena">St. Helena</option>
                                                                                    <option value="St. Pierre and Miquelon">St. Pierre and Miquelon</option>
                                                                                    <option value="Sudan">Sudan</option>
                                                                                    <option value="Suriname">Suriname</option>
                                                                                    <option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option>
                                                                                    <option value="Swaziland">Swaziland</option>
                                                                                    <option value="Sweden">Sweden</option>
                                                                                    <option value="Switzerland">Switzerland</option>
                                                                                    <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                                                                                    <option value="Taiwan, Province of China">Taiwan, Province of China</option>
                                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                                    <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                                                                                    <option value="Thailand">Thailand</option>
                                                                                    <option value="Togo">Togo</option>
                                                                                    <option value="Tokelau">Tokelau</option>
                                                                                    <option value="Tonga">Tonga</option>
                                                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                                                    <option value="Tunisia">Tunisia</option>
                                                                                    <option value="Turkey">Turkey</option>
                                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                                    <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                                                                                    <option value="Tuvalu">Tuvalu</option>
                                                                                    <option value="Uganda">Uganda</option>
                                                                                    <option value="Ukraine">Ukraine</option>
                                                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                                                    <option value="United Kingdom" selected="">United Kingdom</option>
                                                                                    <option value="United States">United States</option>
                                                                                    <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                                                                                    <option value="Uruguay">Uruguay</option>
                                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                                    <option value="Venezuela">Venezuela</option>
                                                                                    <option value="Vietnam">Vietnam</option>
                                                                                    <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                                                                                    <option value="Virgin Islands (U.S.)">Virgin Islands (U.S.)</option>
                                                                                    <option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option>
                                                                                    <option value="Western Sahara">Western Sahara</option>
                                                                                    <option value="Yemen">Yemen</option>
                                                                                    <option value="Yugoslavia">Yugoslavia</option>
                                                                                    <option value="Zambia">Zambia</option>
                                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Time at address</label>
                                                                            <div class="col-md-9">
                                                                                <input class="form-control" type="text" name="addresses[0][time_at_address]">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Accommodation Status</label>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control" name="addresses[0][accommodation_status]">
                                                                                    <option>Select</option>
                                                                                    <option value="Owner - Mortgage">Owner - Mortgage</option>
                                                                                    <option value="Owner - Outright">Owner - Outright</option>
                                                                                    <option value="With Parents">With Parents</option>
                                                                                    <option value="Rented">Rented</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                <input type="button" data-repeater-create="" class="btn btn-block btn-primary" value="add">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <h3 class="m-t-40">Monthly Income and Expenditure</h3>
                                                        <hr class="m-t-0 m-b-40">
                                                        <div class="form-group">
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Monthly income after Tax and Deductions</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" name="monthly_income" onchange="updateIncomeTotal()">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-3">Housing (Mortgage/Rent etc)</label>
                                                                    <div class="col-md-9">
                                                                        <input class="form-control" type="text" name="housing" onchange="updateIncomeTotal()">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Credit Cards</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="credit_cards" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Utilities</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="utilities" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Transport/Travel/Fuel</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="transport" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Other Loans</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="other_loans" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Telephone/Television</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="telephone" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Food/Drink/Clothing</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="food" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Car Loan</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="car_loan" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Other Expenditure</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="other_expenditure" onchange="updateIncomeTotal()">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Total Current Monthly Expenditure</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="monthly_total" disabled="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Do you receive a car allowance from your employer?  If yes, gross annual amount?</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="car_allowance">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3>Current Employment</h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Occupation</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="occupation" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Employment Status</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="employment_status">
                                                                        <option>Select</option>
                                                                        <option value="Employed">Employed</option>
                                                                        <option value="Self Employed">Self Employed</option>
                                                                        <option value="Unemployed">Unemployed</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Part time/ Full Time</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="full_part_time">
                                                                    <option>Select</option>
                                                                    <option value="Full Time">Full Time</option>
                                                                    <option value="Part Time">Part Time</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Employers Name</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="employer_name" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Employers Addresss</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="employer_address" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Time in Employment</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="time_at_employment" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row repeaterEmployment">
                                                <div class="col-sm-12">
                                                    <h3></h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="row" data-repeater-list="employment">
                                                        <div class="col-md-12" data-repeater-item="">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <h3>Previous Employment</h3>
                                                                    <hr class="m-t-0 m-b-40">
                                                                    <div class="form-group">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Occupation</label>
                                                                                <div class="col-md-9">
                                                                                    <input class="form-control" type="text" name="employment[0][occupation]">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label class="control-label col-md-3">Employment Status</label>
                                                                                <div class="col-md-9">
                                                                                    <select class="form-control" name="employment[0][employment_status]">
                                                                                        <option>Select</option>
                                                                                        <option value="Employed">Employed</option>
                                                                                        <option value="Self Employed">Self Employed</option>
                                                                                        <option value="Unemployed">Unemployed</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Part time/ Full Time</label>
                                                                            <div class="col-md-9">
                                                                                <select class="form-control" name="employment[0][full_part_time]">
                                                                                    <option>Select</option>
                                                                                    <option value="Full Time">Full Time</option>
                                                                                    <option value="Part Time">Part Time</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Employers Name</label>
                                                                            <div class="col-md-9">
                                                                                <input class="form-control" type="text" name="employment[0][employer_name]">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Employers Addresss</label>
                                                                            <div class="col-md-9">
                                                                                <input class="form-control" type="text" name="employment[0][employer_address]">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label class="control-label col-md-3">Time in Employment</label>
                                                                            <div class="col-md-9">
                                                                                <input class="form-control" type="text" name="employment[0][time_at_employment]">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            <input type="button" data-repeater-create="" class="btn btn-block btn-primary" value="add">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3 class="m-t-40">Bank Details</h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Account Name</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="account_name">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Account Number</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="account_number">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Sort Code</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="sort_code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Time with Bank</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="time_with_bank">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Bank Name</label>
                                                            <div class="col-md-9">
                                                                <input class="form-control" type="text" name="bank_name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h3>Additional Commemnts</h3>
                                                    <hr class="m-t-0 m-b-40">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="control-label col-md-3">Additional Comments</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="comments">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-offset-3 col-md-9">
                                                                <input type="hidden" name="form" value="application">
                                                                <button type="submit" class="btn btn-success">Submit</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                    <section id="section-bar-5">
                                        <form method="POST" class="form-horizontal" id="order_form">
                                            <div class="form-body">
                                                <h3 class="box-title">Order Info</h3>

                                                <!--<div class="row">
<div class="col-lg-2 col-md-offset-5">
<button class="btn btn-block btn-default applicationListToggle">View Applications</button>
</div>
</div>-->
                                                <div class="row" id="applications-list">
                                                    <table class="table table-hover">
                                                        <thead>
                                                        <tr>
                                                            <th class="text-center">#</th>
                                                            <th>Details</th>
                                                            <th>Created</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td align="center">1</td>
                                                            <td>AUDI Q5 Q5 Suv 2.0 TDI 190ps Quattro SE S tronic</td>
                                                            <td><i class="fa fa-clock-o"></i> Mar 20, 2018</td>
                                                            <td><a target="_blank" href="/qph/customers/viewOrder/8/" class="fcbtn btn btn-success btn-outline btn-1f">View Order</a> <a href="/qph/customers/view/59/email/order/8/" class="fcbtn btn btn-success btn-outline btn-1f">Email Order</a>

                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </form>
                                    </section>
                                </div><!-- /content -->
                            </div>
                        </div>
                    </div><!-- /tabs -->
                </section>


            </div>
        </div>
    </div>
    <!--./row-->
    </div>
<?php $this->load->view('includes/footer.php'); ?>