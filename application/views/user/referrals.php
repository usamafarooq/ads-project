<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">My Referrals</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home /</a></li>
                        <li class="current">My Referrals</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="page-content">
                    <div class="inner-box">
                        <div class="dashboard-box">
                            <h2 class="dashbord-title">My Referrals</h2>
                        </div>
                        <div class="dashboard-wrapper">
                            <table class="table table-responsive dashboardtable tablemyads">
                                <thead>
                                    <tr>
                                        <th width="5%">Sno</th>
                                        <th width="15%">Username</th>
                                        <th width="5%">Visits</th>
                                        <th width="15%">Earning</th>
                                        <th width="15%">Total Paid</th>
                                        <th width="15%">My Earning</th>
                                        <th width="15%">Premium Date</th>
                                        <th width="15%">Expiry Date</th>
                                        <th width="15%">Account Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $user): ?>
                                    <tr data-category="active">
                                        <td><?php echo ($key + 1) ?></td>
                                        <td data-title="Title"><h3><?php echo $user['username'] ?></h3></td>
                                        <td><?php echo $user['visit'] ?></td>
                                        <td><?php echo $user['earning'] ?></td>
                                        <td><?php echo $user['paid'] ?></td>
                                        <td><?php echo $user['my_earning'] ?></td>
                                        <td><?php echo date('d M, Y', strtotime($user['date'])) ?></td>
                                        <td><?php echo date('d M, Y', strtotime($user['date'].' +'.$user['Duration'].' month')) ?></td>
                                        <td><?php echo $user['status'] ?></td>
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