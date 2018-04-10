<?php $this->load->view('includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Finder</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="/secure/dashboard/">Dashboard</a></li>
                    <li class="active">Tag</li>
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
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <h3 class="box-title">Finder Info</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->first_name . ' ' . $finder->last_name; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->email; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Address</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->addr_line_1 . ' ' . $finder->addr_line_2 . ' ' . $finder->city . ' ' . $finder->postcode; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">PayPal Email</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->paypal_email; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--./row-->

        <?php if( $finder->payment == 1 ) { ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <h3 class="box-title">Payment Action Required</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Reward</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> &pound;<?php echo $tag->reward; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Transaction</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $transaction->value . ' ' . $transaction->notes; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light" name="action" value="payment">Payment Made</button>
                                        <!--/row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>

        <?php if( $finder->collection == 1 ) { ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <h3 class="box-title">Collection Action Required</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Collection From</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->addr_line_1 . ' ' . $finder->addr_line_2 . ' ' . $finder->city . ' ' . $finder->postcode; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Delivery To</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $owner->shipping_address; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tracking Code</label>
                                                <div class="col-md-9">
                                                    <input type="text" name="tracking_code">
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light" name="action" value="collection">Collection Arranged</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>

        <?php if( $finder->collection_date != NULL ) { ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <h3 class="box-title">Collection Arranged</h3>
                                    <hr class="m-t-0 m-b-40">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Collection Arranged</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->collection_date; ?> </p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Tracking Code</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->tracking_code; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Collection From</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $finder->addr_line_1 . ' ' . $finder->addr_line_2 . ' ' . $finder->city . ' ' . $finder->postcode; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Delivery To</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $owner->shipping_address; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>

        <?php if( $finder->not_received == 1 ) { ?>
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <h3 class="box-title">Change Status to Received</h3>
                                    <hr class="m-t-0 m-b-40">
                                    
                                    <button type="submit" class="btn btn-success waves-effect waves-light" name="action" value="receieved">Item Received</button>
                                    <!--/row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        <?php } ?>

</div>
<?php $this->load->view('includes/footer.php'); ?>