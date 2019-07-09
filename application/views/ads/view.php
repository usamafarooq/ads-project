<style>
	iframe{
		 
	}
</style>

<div class="main-container section-padding">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 page-content">
			    <iframe src="<?php echo $ads['link'] ?>" frameborder="0" style="overflow:hidden;height: 100vh !important;width:100%" height="100%" width="100%"></iframe>
		</div>
	</div>
</div>

<script>
	setTimeout(function(){ 
		$.ajax({
		 	url: base_url+'clickads/save_view',
		 	type: 'POST',
		 	dataType: 'json',
		 	data: {id: '<?php echo $ads["id"] ?>'},
		 	success: function(res){
		 		if (res.status == 200) 
		 		{
		 			window.top.close();
		 		}
		 	}
		 })
		  
	}, 3000);
</script>
