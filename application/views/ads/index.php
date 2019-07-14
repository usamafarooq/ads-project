<style>
	.strike-through{
		text-decoration: overline line-through underline;
		color: #ab47bc !important;
	}
</style>

<div class="page-header" style="background: url(assets/img/banner1.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="breadcrumb-wrapper">
					<h2 class="product-title">Ads List</h2>
					<ol class="breadcrumb">
						<li><a href="<?php echo base_url() ?>">Home /</a></li>
						<li class="current">Ads List</li>
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
								<div class="col md-6">
									<ul>
										<li> Daily Ads Limit : <span class="ads_limit"><?php echo $user['Daily_Ads'] ?></span> </li>
										<li> Available Limit : <span class="ads_limit"><?php echo $limit ?></span> </li>
										<li> Account Status : <span class="ads_limit"><?php echo $user['status'] ?></span> </li>
									</ul>
									
									
								</div>
							</div>
							<div class="row">

								<?php if (!empty($ads)): ?>
									<?php foreach ($ads as $ad): ?>
												
								
										<div class="col-xs-6 col-sm-4 col-md-2 col-lg-2" data-id="<?php echo $ad['id'] ?>">
											<div class="featured-box">
												<figure>
													
													<a target="__blank" href="<?php echo base_url('clickads/view/'.$ad['id']) ?>"><img class="img-fluid" src="<?php echo ad_file($ad["image"]) ?>" width="100%" height="300px" alt=""></a>
												</figure>
												<div class="feature-content">
													<hr>
													
													<h4><a target="__blank" class="highlight" href="<?php echo base_url('clickads/view/'.$ad['id']) ?>"><?php echo $ad['Name'] ?></a></h4>
													
												</div>
											</div>
										</div>

									<?php endforeach ?>

									<?php else: ?>


										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-danger" >
											No ad(s) available
										</div>

								<?php endif ?>

							</div>
						</div>
						
					</div>
				</div>


				<!-- <div class="pagination-bar">
					<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item"><a class="page-link active" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">Next</a></li>
						</ul>
					</nav>
				</div> -->

			</div>
		</div>
	</div>
</div>

<script>

window.setInterval(function() {
		$.ajax({
			url: base_url+'clickads/checkViewedAds',
			type: 'GET',
			dataType: 'json',
			success:function(res){
				if (res.status == 200 && res.data.length > 0) {
					$.each(res.data, function(i, v) {
						$this = $('div [data-id='+v.ad_id+']');
						if ($this.length > 0) 
						{
							$($this).find('.highlight').addClass('strike-through');
							anchor = $($this).find('a');
							if (anchor.length > 0) 
							{
								$.each(anchor, function(index, val) {
									$(val).attr('href', '#');
								});
							}
						}
					});
				}
			}
		});
		
	}, 3000);
	

	
</script>