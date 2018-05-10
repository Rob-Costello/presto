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
                        <h4 class="card-title col-sm-9">User Management</h4>
                        <div class="button-box col-sm-3">
                            <button class="btn btn-info waves-effect waves-light" style="float: right;" onclick="location.href='add/';"> <i class="fa fa-plus m-r-5"></i> <span>Create New User</span></button>
                        </div>
                    </div>
                    <div class="table-responsive m-t-40">
                        <div id="example23_wrapper" class="dataTables_wrapper">

                            <div id="example23_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example23"></label></div><table id="example23" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                <thead>
                                <tr role="row">
                                    <?php foreach($tableheadings as $t): ?>
                                    <th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 120px;"><?php echo $t; ?></th>
                                <?php endforeach; ?>
                                </tr>
                                </thead>

                                <tbody>

                                <?php foreach( $users['data'] as $u ): ?>
                                    <tr role="row" class="odd">
                                        <td class="sorting_1"><?php echo $u->id; ?></td>
                                        <td><?php echo $u->username; ?></td>
                                        <td><?php echo $u->email; ?></td>
                                        <td><?php echo $u->created_on; ?></td>

                                        <td><?php echo $u->first_name; ?></td>
                                        <td><?php echo $u->last_name; ?></td>
                                        <td><?php echo $u->company ?></td>
                                        <td><?php echo $u->phone; ?></td>
                                        <td><a href="/presto/users/view/<?php echo $u->id; ?>/"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                    </tr>
                                <?php endforeach ?>
                                </tbody>
                            </table>
                            <div class="dataTables_paginate paging_simple_numbers" id="example23_paginate"><a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous">Previous</a><span><a class="paginate_button current" aria-controls="example23" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example23" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example23" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="example23" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="example23" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="example23" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="example23" data-dt-idx="7" tabindex="0" id="example23_next">Next</a></div></div>
                        <div class="dataTables_info" id="example23_info" role="status" aria-live="polite">Showing <?php echo $pagination_start; ?> to <?php echo $pagination_end; ?> of <?php $users['count']; ?> entries</div>
                        <div class="dataTables_paginate paging_simple_numbers">
                            <?php echo $pagination; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
<?php $this->load->view('includes/footer.php'); ?>
