<?php $this->load->view('includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Press Jobs</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Press Jobs</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <div class="row">
                        <h4 class="card-title col-sm-9">Press Job Management</h4>
                        <div class="button-box col-sm-3">
                            <button class="btn btn-info waves-effect waves-light" style="float: right;" onclick="location.href='add/';"> <i class="fa fa-plus m-r-5"></i> <span>Create New Press Job</span></button>
                         </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <div id="example23_wrapper" class="dataTables_wrapper">
                            <div class="dt-buttons">
                                <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                    <span>My Press Jobs (1)</span>
                                </a>
                                <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                    <span>All Press Jobs (2)</span>
                                </a>
                                </div>
                                <div id="example23_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example23"></label></div><table id="example23" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 120px;">Job ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Customer Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Job Title</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55px;">Created By</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 89px;">Created Date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 92px;">Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="/* width: 96px; */">Actions</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">Job ID</th>
                                    <th rowspan="1" colspan="1">Customer Name</th>
                                    <th rowspan="1" colspan="1">Job Title</th>
                                    <th rowspan="1" colspan="1">Created By</th>
                                    <th rowspan="1" colspan="1">Created Date</th>
                                    <th rowspan="1" colspan="1">Status</th>
                                    <th rowspan="1" colspan="1">Actions</th>
                                </tr>
                                </tfoot>
                                <tbody>

                                <?php foreach( $jobs['data'] as $job ) { ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo $job->id; ?></td>
                                        <td><?php echo $job->customer_name; ?></td>
                                        <td><?php echo $job->title; ?></td>
                                        <td><?php echo $job->createdBy; ?></td>
                                        <td><?php echo $job->datetime; ?></td>
                                        <td>N/A</td>
                                        <td><a href="/presto/jobs/view/<?php echo $job->id; ?>/"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $jobs['count']; ?> entries</div>
                            <div class="dataTables_paginate paging_simple_numbers">
                                <?php echo $pagination; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?php $this->load->view('includes/footer.php'); ?>