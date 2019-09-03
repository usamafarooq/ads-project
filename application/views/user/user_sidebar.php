<div class="col-sm-12 col-md-4 col-lg-3 page-sidebar">
                    <aside>
                        <div class="sidebar-box">
                            <div class="user">
                                <figure>
                                    <a href="#"><img src="assets/img/author/img1.jpg" alt=""></a>
                                </figure>
                                <div class="usercontent">
                                    <h3><?php echo $this->session->userdata('first_name').' '. $this->session->userdata('last_name') ?>
                                    <br>
                                        <small><?php echo $this->session->userdata('status') ?></small>
                                    </h3>
                                    <!-- <h4>Administrator</h4> -->
                                </div>
                            </div>
                            <nav class="navdashboard">
                                <ul>
                                    <li>
                                        <a class="<?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : '' ?>" href="<?php echo base_url('user/dashboard') ?>"><i class="lni-home"></i><span> Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?php echo ($this->uri->segment(2) == 'edit') ? 'active' : '' ?>" href="<?php echo base_url('user/edit') ?>"><i class="lni-user"></i><span> Edit Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?php echo ($this->uri->segment(1) == 'referrals') ? 'active' : '' ?>"  href="<?php echo base_url('referrals') ?>"><i class="lni-users"></i><span> My Referrals</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?php echo ($this->uri->segment(1) == 'withdraw') ? 'active' : '' ?>"  href="<?php echo base_url('withdraw') ?>"><i class="lni-sort-amount-asc"></i><span> Withdraw</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?php echo ($this->uri->segment(1) == 'payments') ? 'active' : '' ?>" href="<?php echo base_url('payments') ?>"><i class="lni-sort-amount-asc"></i><span> Payment History</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('user/logout') ?>"> <i class="lni-close"></i><span>Logout</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </aside>
                </div>