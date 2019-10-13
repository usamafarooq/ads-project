<div class="row" style="background-color: #4e5363; color: white; font-family: open sans,sans-serif; ">
	<div class="col-md-12">
		<div class="col-md-6">

			<div class="text-right">
				Time : <span class="timeLimit">0:30</span>
			</div>
		</div>	
	</div>
</div>
<div class="main-container section-padding">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-xs-12 page-content">

			<?php if (!empty($ads['image'])): ?>
				
			<div style="text-align: center">
				<img src="<?php echo base_url($ads['image']) ?>" alt="" width="">
			</div>
			<?php else: ?>
				<?php if (strpos($ads['link'], 'http') === FALSE): ?>
					<?php $ads['link'] = 'http://'.$ads['link'] ?>

				<?php endif ?>
			    <iframe src="<?php echo $ads['link'] ?>" frameborder="0" style="overflow:hidden;height: 100vh !important;width:100%" height="100%" width="100%"></iframe>
			<?php endif ?>

		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>front_assets/js/jquery-min.js"></script>




<script>
		var myInterval;
		// window.addEventListener('focus', startTimer);
		// window.addEventListener('blur', stopTimer);

		time = 30;
		request_send = 0; 
		function adstimeHandler(){
			time -= 1;
			if ( time < 0 ) {
				time = 0;
			}

			if (time == 0) 
			{
				if (request_send == 0) 
				{
					request_send = 1;
					adsCallback();
				}
			}
			$('.timeLimit').text('00:'+parseInt(time));
		} 
		
		// Start timer
		// myInterval = window.setInterval(adstimeHandler, 1000);
		
		 function startTimer() {
			  myInterval = window.setInterval(adstimeHandler, 1000);
		 }
		// Stop timer
		 function stopTimer() {
		  window.clearInterval(myInterval);
		 }
		function adsCallback(){
			$.ajax({
			 	url: '<?php echo base_url() ?>clickads/save_view',
			 	type: 'GET',
			 	dataType: 'jsonp',
			 	async: false,
			 	data: {id: '<?php echo $ads["id"] ?>'},
			 	success: function(res){
			 			window.top.close();
			 	}
			 }) 
		}

        // check the visiblility of the page
        var hidden, visibilityState, visibilityChange;

        if (typeof document.hidden !== "undefined") {
            hidden = "hidden", visibilityChange = "visibilitychange", visibilityState = "visibilityState";
        }
        else if (typeof document.mozHidden !== "undefined") {
            hidden = "mozHidden", visibilityChange = "mozvisibilitychange", visibilityState = "mozVisibilityState";
        }
        else if (typeof document.msHidden !== "undefined") {
            hidden = "msHidden", visibilityChange = "msvisibilitychange", visibilityState = "msVisibilityState";
        }
        else if (typeof document.webkitHidden !== "undefined") {
            hidden = "webkitHidden", visibilityChange = "webkitvisibilitychange", visibilityState = "webkitVisibilityState";
        }


        if (typeof document.addEventListener === "undefined" || typeof hidden === "undefined") {
            $(window).on("blur focus", function(e) {
			    var prevType = $(this).data("prevType");

			    if (prevType != e.type) {   //  reduce double fire issues
			        switch (e.type) {
			            case "blur":
			                stopTimer()
			                break;
			            case "focus":
			                startTimer()
			                break;
			        }
			    }

			    $(this).data("prevType", e.type);
			})
        }
        else {
            document.addEventListener(visibilityChange, function() {

                switch (document[visibilityState]) {
                case "visible":
                    	startTimer();
                    break;
                case "hidden":
                    	stopTimer();
                    break;
                }
            }, false);
        }

        if (document[visibilityState] === "visible") {
            startTimer();
        }
</script>
