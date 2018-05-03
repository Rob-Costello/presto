<?php $this->load->view('includes/header.php'); ?>
    <div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Press Job</h4>
        </div>
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="/presto/dashboard/">Dashboard</a></li>
                <li class="active">Press Job</li>
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
        <form method="POST" class="form-horizontal" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <section>
                            <div class="panel-body">
                                <div class="content-wrap">
                                    <div class="button-box">
                                        <button type="button" class="btn btn-outline btn-default waves-effect waves-light" onclick="location.href='/presto/jobs/view/<?php $job->id;  ?>/gen21Up/';"> <i class="fa fa-cube m-r-5"></i> <span>Create 21 up</span></button>
                                    </div>
                                    <section id="section-bar-1" class="content-current">
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Title</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="title" class="form-control" value="<?php if(isset($job->title)) echo $job->title; ?>" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Customer</label>
                                                            <div class="col-md-9">
                                                                <input type="text" name="customer_name" class="form-control" value="<?php if(isset($job->customer_name)) echo $job->customer_name; ?>" autocomplete="off" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Press Filename</label>
                                                            <div class="col-md-9">
                                                                <input type="tel" name="filename" class="form-control" value="<?php if(isset($job->filename)) echo $job->filename; ?>" autocomplete="off">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Template</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="template">
                                                                    <option <?php if(isset($job->template)  && $job->template == '92 x 60 Plastic Card (Landscape)') { ?>selected<?php } ?>>92 x 60 Plastic Card (Landscape)</option>
                                                                    <option <?php if(isset($job->template)  && $job->template == '92 x 60 Plastic Card (Portrait)') { ?>selected<?php } ?>>92 x 60 Plastic Card (Portrait)</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Single / Double Sided</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="sides">
                                                                    <option <?php if(isset($job->sides)  && $job->sides == 'Single Sided') { ?>selected<?php } ?>>Single Sided</option>
                                                                    <option <?php if(isset($job->sides)  && $job->sides == 'Double Sided') { ?>selected<?php } ?>>Double Sided</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--/span-->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label col-md-3">Proof Sheet</label>
                                                            <div class="col-md-9">
                                                                <select class="form-control" name="proof_sheet">
                                                                    <option <?php if(isset($job->proof_sheet)  && $job->proof_sheet == 'Standard') { ?>selected<?php } ?>>Standard</option>
                                                                    <option <?php if(isset($job->proof_sheet)  && $job->proof_sheet == 'No Header') { ?>selected<?php } ?>>No Header</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <div class="col-md-9 offset-md-3">
                                                                <div class="form-check" style="margin-left: 190px;">
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="hidden" name="full_sheet" value="0" />
                                                                        <input type="checkbox" class="custom-control-input" name="full_sheet" value="1" <?php if(isset($job->full_sheet) && $job->full_sheet == 1) { ?>checked<?php } ?>>
                                                                        <span class="custom-control-indicator"></span>
                                                                        <span class="custom-control-description">Full sheet per record</span>
                                                                    </label>
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="hidden" name="one_press" value="0" />
                                                                        <input type="checkbox" class="custom-control-input" name="one_press" value="1" <?php if(isset($job->one_press) && $job->one_press == 1) { ?>checked<?php } ?>>
                                                                        <span class="custom-control-indicator"></span>
                                                                        <span class="custom-control-description">One Press PDF per source file</span>
                                                                    </label>
                                                                    <label class="custom-control custom-checkbox">
                                                                        <input type="hidden" name="compensate_for_text" value="0" />
                                                                        <input type="checkbox" class="custom-control-input" name="compensate_for_text" value="1" <?php if(isset($job->compensate_for_text) && $job->compensate_for_text == 1) { ?>checked<?php } ?>>
                                                                        <span class="custom-control-indicator"></span>
                                                                        <span class="custom-control-description">Compensate for text on artwork footer</span>
                                                                    </label>
                                                                </div>
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
                                                                <button type="submit" class="btn btn-success">Save</button>
                                                                <button type="button" onclick="location.href='/presto/jobs/';" class="btn btn-default">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6"> </div>
                                                </div>
                                            </div>
                                        </section>
                                </div><!-- /content -->
                            </div>
                </section>


            </div>
        </div>
    </div>
    <!--./row-->
            <?php if( isset($job->id) ) { ?>
        <div class="row">
            <div class="col-sm-12 ol-md-12 col-xs-12">
                <div class="white-box">
                        <h3 class="box-title">Upload Artwork</h3>
                        <input type="file" id="input-file-now" name="artwork" class="dropify" data-allowed-file-extensions="png jpg jpeg pdf" />
                </div>
            </div>
            <div class="col-sm-12 ol-md-12 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title m-b-0">Artwork Uploads</h3>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Filename</th>
                                <th>Uploaded By</th>
                                <th>Uploaded Date</th>
                                <th>Pages</th>
                                <th>Filesize</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php foreach( $artwork as $art ){ ?>
                                <tr>
                                    <td></td>
                                    <td><?php echo $art->name; ?></td>
                                    <td><?php echo $art->first_name; ?> <?php echo $art->last_name; ?></td>
                                    <td><?php echo $art->datetime ?></td>
                                    <td>1</td>
                                    <td><?php echo $art->size; ?></td>
                                    <td class="text-nowrap">
                                        <a href="#" data-toggle="tooltip" data-original-title="Close"> <i class="fa fa-close text-danger"></i> </a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    </form>
<?php $this->load->view('includes/footer.php'); ?>