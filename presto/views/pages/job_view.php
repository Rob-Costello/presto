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
                                    <section id="section-bar-2"></section>
                                    <section id="section-bar-3"></section>
                                    <section id="section-bar-4"></section>
                                    <script>
                                        var phpVars = {
                                            personal: 0,
                                            activeTab: "",
                                        };
                                    </script>
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