<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Payment History</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home /</a></li>
                        <li class="current">Payment History</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="section-padding">
    <div class="container">
        <div class="row">
            <?php $this->load->view('user/user_sidebar'); ?>
                <div class="col-sm-12 col-md-8 col-lg-9">
            <!-- <div class="col-sm-12 col-md-12 col-lg-12"> -->
                <div class="page-content">
                    <div class="inner-box">
                        <div class="dashboard-box">
                            <h2 class="dashbord-title">Payment History</h2>
                        </div>
                        <div class="dashboard-wrapper">
                            <table class="table table-responsive dashboardtable tablemyads">
                                <thead>
                                    <tr>
                                        <th width="30%">Withdraw Date</th>
                                        <th width="20%">Payout Date</th>
                                        <th width="20%">Amount</th>
                                        <th width="30%">Method</th>
                                        <th width="30%">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($payments as $key => $payment): ?>
                                    <tr data-category="active">
                                        <td><?php echo date('d M, Y', strtotime($payment['created_at'])) ?></td>
                                        <td><?php echo ($payment['Status'] == 'Approve') ? date('d M, Y', strtotime($payment['approve_date'])) : '' ?></td>
                                        <td><?php echo $payment['Amount'] ?></td>
                                        <td>Mobile Service</td>
                                        <td><?php echo $payment['Status'] ?></td>
                                        <!-- <td>
                                            1
                                        </td>
                                        <td class="photo"><img class="img-fluid" src="assets/img/product/img1.jpg" alt=""></td>
                                        <td data-title="Title">
                                            <h3>HP Laptop 6560b core i3 3nd generation</h3>
                                            <span>Ad ID: ng3D5hAMHPajQrM</span>
                                        </td>
                                        <td data-title="Category"><span class="adcategories">Laptops & PCs</span></td>
                                        <td data-title="Ad Status"><span class="adstatus adstatusactive">active</span></td>
                                        <td data-title="Price">
                                            <h3>139$</h3>
                                        </td>
                                        <td data-title="Action">
                                            <div class="btns-actions">
                                                <a class="btn-action btn-view" href="#"><i class="lni-eye"></i></a>
                                                <a class="btn-action btn-edit" href="#"><i class="lni-pencil"></i></a>
                                                <a class="btn-action btn-delete" href="#"><i class="lni-trash"></i></a>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>