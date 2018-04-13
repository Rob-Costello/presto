<?php $this->load->view('includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Orders</h4>
            </div>
            <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="#">Dashboard</a></li>
                    <li class="active">Orders</li>
                </ol>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h4 class="card-title">Order Management</h4>

                    <div class="table-responsive m-t-40">
                        <div id="example23_wrapper" class="dataTables_wrapper">
                            <div class="dt-buttons">
                                <a class="dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                    <span>Declined Authorisation (0)</span>
                                </a>
                                <a class="dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                    <span>Awaiting Authorisation (0)</span>
                                </a>
                                <a class="dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                    <span>Awaiting Payment Details (0)</span>
                                </a>
                                <a class="dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="example23" href="#">
                                    <span>Awaiting Press Artwork (2)</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                    <span>Press Artwork Generated (0)</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                    <span>Reprint Required (0)</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                    <span>Processing Order (41)</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                    <span>Complete (4155)</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#">
                                    <span>Cancelled (930)</span>
                                </a>
                                <a class="dt-button buttons-print" tabindex="0" aria-controls="example23" href="#"><span>Abandoned (1)</span></a></div><div id="example23_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example23"></label></div><table id="example23" class="display nowrap table table-hover table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example23_info" style="width: 100%;">
                                <thead>
                                <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 120px;">Order ID</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Date</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 55px;">Client</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 89px;">Created By</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 92px;">Description</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 75px;">Net Total</th>
                                    <th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="/* width: 96px; */">VAT</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="/* width: 96px; */">Total</th><th class="sorting" tabindex="0" aria-controls="example23" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="/* width: 96px; */">Order Status</th></tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th rowspan="1" colspan="1">Order ID</th>
                                        <th rowspan="1" colspan="1">Date</th>
                                        <th rowspan="1" colspan="1">Client</th>
                                        <th rowspan="1" colspan="1">Created By</th>
                                        <th rowspan="1" colspan="1">Description</th>
                                        <th rowspan="1" colspan="1">Net Total</th>
                                        <th rowspan="1" colspan="1">VAT</th>
                                        <th rowspan="1" colspan="1">Total</th>
                                        <th rowspan="1" colspan="1">Order Status</th>
                                        <th rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">000001</td>
                                    <td>Wed 4th April 12:46</td>
                                    <td>David Wright</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£17.00</td>
                                    <td>£3.40</td>
                                    <td>£22.40</td>
                                    <td>Processing Order</td>
                                    <td><a href="/presto/orders/edit/1/"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">000002</td>
                                    <td>Wed 4th April 12:18</td>
                                    <td>Chris Meare</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£28.00</td>
                                    <td>£5.60</td>
                                    <td>£33.60</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">000003</td>
                                    <td>Wed 4th April 11:56</td>
                                    <td>Nigel Marshall</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£22.00</td>
                                    <td>£4.40</td>
                                    <td>£26.40</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">000004</td>
                                    <td>Wed 4th April 11:52</td>
                                    <td>Don Williams</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£12.00</td>
                                    <td>£2.40</td>
                                    <td>£14.40</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">000005</td>
                                    <td>Wed 4th April 11:52</td>
                                    <td>Sam Cairns</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£47.90</td>
                                    <td>£9.58</td>
                                    <td>£57.48</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">000006</td>
                                    <td>Wed 4th April 11:13</td>
                                    <td>Will Watson</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£20.20</td>
                                    <td>£4.04</td>
                                    <td>£24.24</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">000007</td>
                                    <td>Tue 3rd April 23:13</td>
                                    <td>Brian Lambert</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£48.50</td>
                                    <td>£9.70</td>
                                    <td>£58.20</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">000008</td>
                                    <td>Tue 3rd April 18:22</td>
                                    <td>June Armstrong</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£17.00</td>
                                    <td>£3.40</td>
                                    <td>£20.40</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="odd">
                                    <td class="sorting_1">000009</td>
                                    <td>Tue 3rd April 17:58</td>
                                    <td>Vivien Smith</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£26.00</td>
                                    <td>£5.20</td>
                                    <td>£31.20</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                <tr role="row" class="even">
                                    <td class="sorting_1">000010</td>
                                    <td>Tue 3rd April 17:52</td>
                                    <td>Alistair Ramus</td>
                                    <td>Website</td>
                                    <td>Website Order</td>
                                    <td>£52.00</td>
                                    <td>£10.40</td>
                                    <td>£62.40</td>
                                    <td>Processing Order</td>
                                    <td><a href=""><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a></td>
                                </tr>
                                </tbody>
                            </table><div class="dataTables_info" id="example23_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div><div class="dataTables_paginate paging_simple_numbers" id="example23_paginate"><a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous">Previous</a><span><a class="paginate_button current" aria-controls="example23" data-dt-idx="1" tabindex="0">1</a><a class="paginate_button " aria-controls="example23" data-dt-idx="2" tabindex="0">2</a><a class="paginate_button " aria-controls="example23" data-dt-idx="3" tabindex="0">3</a><a class="paginate_button " aria-controls="example23" data-dt-idx="4" tabindex="0">4</a><a class="paginate_button " aria-controls="example23" data-dt-idx="5" tabindex="0">5</a><a class="paginate_button " aria-controls="example23" data-dt-idx="6" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="example23" data-dt-idx="7" tabindex="0" id="example23_next">Next</a></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->
<?php $this->load->view('includes/footer.php'); ?>