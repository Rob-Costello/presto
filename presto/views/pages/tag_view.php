<?php $this->load->view('includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Offer</h4>
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
                                    <h3 class="box-title">Tag Info</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Code</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $tag->code; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Created</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $tag->created; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Type</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php if($tag->keyring == 1 ) echo 'keyring'; else echo 'Sticker'; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Status</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $status; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Description</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $tag->description; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Reward</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> &pound;<?php echo $tag->reward; ?> </p>
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
        </form></div>

        <?php if( $owner != null ){ ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-wrapper collapse in" aria-expanded="true">
                        <div class="panel-body">
                            <form method="POST" class="form-horizontal">
                                <div class="form-body">
                                    <h3 class="box-title">Owner Info</h3>
                                    <hr class="m-t-0 m-b-40">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Name</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $owner->first_name . ' ' . $owner->last_name; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Email</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $owner->user_email; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                    </div>
                                    <!--/row-->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Billing Address</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php echo $owner->billing_address; ?> </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/span-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label col-md-3">Shipping Address</label>
                                                <div class="col-md-9">
                                                    <p class="form-control-static"> <?php if( $owner->shipping_address ) { echo $owner->shipping_address; } else { echo $owner->billing_address; } ?> </p>
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
        <?php } ?>

            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title">Tag Events Log</h3>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Event</th>
                                    <th>Date</th>
                                    <th>Value</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach( $events as $event ){ ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $event->name; ?></td>
                                        <td><?php echo $event->datetime; ?></td>
                                        <td><?php echo $event->value; ?></td>
                                    </tr>
        
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="white-box">
                    <h3 class="box-title">Finders</h3>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Datetime</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; foreach( $finders as $finder ){ ?>

                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php echo $finder->first_name . ' ' . $finder->last_name; ?></td>
                                        <td><?php echo $finder->email; ?></td>
                                        <td><?php echo $finder->mobile; ?></td>
                                        <td><?php echo $finder->datetime; ?></td>
                                    </tr>
        
                                <?php $i++; } ?>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

</div>
<?php $this->load->view('includes/footer.php'); ?>