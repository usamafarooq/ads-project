<div class="page-header" style="background: url('<?php echo base_url('front_assets/img/banner1.jpg') ?>');">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrapper">
                    <h2 class="product-title">Contact Us</h2>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url() ?>">Home /</a></li>
                        <li class="current">Contact Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="content" class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                <h2 class="contact-title">Send Message Us</h2>

                <form id="contactForm" class="contact-form" data-toggle="validator" novalidate="true">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name" required="" data-error="Please enter your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="Email" required="" data-error="Please enter your email">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="msg_subject" name="subject" placeholder="Subject" required="" data-error="Please enter your subject">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" placeholder="Massage" rows="10" data-error="Write your message" required=""></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="submit" class="btn btn-common disabled" style="pointer-events: all; cursor: pointer;">Submit Now</button>
                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
                <h2 class="contact-title">Get In Touch</h2>
                <div class="information">
                    <p>Lorem Ipsum Is simply dummy text of the printing and typesetting Industry. Lorem Ipsum has been the Industry's</p>
                    <div class="contact-datails">
                        <div class="icon">
                            <i class="lni-map-marker icon-radius"></i>
                        </div>
                        <div class="info">
                            <h3>Address</h3>
                            <span class="detail">Level 13, 2 Ellzabeth St, <br> Lorem Ipsum Is simply dummy text</span>
                        </div>
                    </div>
                    <div class="contact-datails">
                        <div class="icon">
                            <i class="lni-pointer icon-radius"></i>
                        </div>
                        <div class="info">
                            <h3>Have any Questions?</h3>
                            <span class="detail">Support@mail.com</span>
                        </div>
                    </div>
                    <div class="contact-datails">
                        <div class="icon">
                            <i class="lni-phone-handset icon-radius"></i>
                        </div>
                        <div class="info">
                            <h3>Call Us &amp; Hire us</h3>
                            <span class="detail">Main Office: +880 123 456 789</span>
                        </div>
                    </div>
                    <div class="contact-datails">
                        <div class="icon">
                            <i class="lni-phone icon-radius"></i>
                        </div>
                        <div class="info">
                            <h3>Telephone</h3>
                            <span class="detail">(+88) 112345678 912</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>