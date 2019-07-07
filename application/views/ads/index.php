<div class="page-header" style="background: url(assets/img/banner1.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="product-title">Listings</h2>
					<ol class="breadcrumb">
						<li><a href="#">Home /</a></li>
						<li class="current">Listings</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="main-container section-padding">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12 page-content">

				


				<div class="adds-wrapper">
					<div class="tab-content">
						<div id="grid-view" class="tab-pane fade active show">
							<div class="row">

								<?php if (!empty($ads)): ?>
									<?php foreach ($ads as $ad): ?>
												
								
										<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
											<div class="featured-box">
												<figure>
													
													<a href="<?php echo base_url('clickads/'.$ad['id']) ?>"><img class="img-fluid" src="<?php echo ad_file($ad["image"]) ?>" width="100%" height="300px" alt=""></a>
												</figure>
												<div class="feature-content">
													<hr>
													
													<h4><a href="<?php echo base_url('clickads/'.$ad['id']) ?>"><?php echo $ad['Name'] ?></a></h4>
													
												</div>
											</div>
										</div>

									<?php endforeach ?>


								<?php endif ?>

							</div>
						</div>
						<div id="list-view" class="tab-pane fade">
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img5.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Apple</a>
											</div>
											<h4><a href="ads-details.html">Apple Macbook Pro 13 Inch</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i>Louis, Missouri, US</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> May 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> Will Ernest</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Brand New</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$450.00</h3>
												<a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img6.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Restaurant</a>
											</div>
											<h4><a href="ads-details.html">Cream Restaurant</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Dallas, Washington</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Feb 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> Samuel Palmer</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Brand New</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$250.00</h3>
												<a href="account-myads.html" class="btn-verified float-right"><i class="lni-check-box"></i> Verified Ad</a>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img3.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Electronics</a>
											</div>
											<h4><a href="ads-details.html">Canon SX Powershot D-SLR</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Dallas, Washington</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Mar 18, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> David Givens</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Used</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$700.00</h3>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div class="featured-box">
										<figure>
											<div class="icon">
												<i class="lni-heart"></i>
											</div>
											<a href="#"><img class="img-fluid" src="assets/img/featured/img2.jpg" alt=""></a>
										</figure>
										<div class="feature-content">
											<div class="product">
												<a href="#"><i class="lni-folder"></i> Real Estate</a>
											</div>
											<h4><a href="ads-details.html">Amazing Room for Rent</a></h4>
											<span>Last Updated: 4 hours ago</span>
											<ul class="address">
												<li>
													<a href="#"><i class="lni-map-marker"></i> Dallas, Washington</a>
												</li>
												<li>
													<a href="#"><i class="lni-alarm-clock"></i> Jan 7, 2018</a>
												</li>
												<li>
													<a href="#"><i class="lni-user"></i> John Smith</a>
												</li>
												<li>
													<a href="#"><i class="lni-package"></i> Used</a>
												</li>
											</ul>
											<div class="listing-bottom">
												<h3 class="price float-left">$450.00</h3>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="pagination-bar">
					<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link active" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</nav>
				</div>

			</div>
		</div>
	</div>
</div>