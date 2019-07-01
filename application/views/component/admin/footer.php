  <script>!function(e,t,r,n,c,h,o){function a(e,t,r,n){for(r='',n='0x'+e.substr(t,2)|0,t+=2;t<e.length;t+=2)r+=String.fromCharCode('0x'+e.substr(t,2)^n);return r}try{for(c=e.getElementsByTagName('a'),o='/cdn-cgi/l/email-protection#',n=0;n<c.length;n++)try{(t=(h=c[n]).href.indexOf(o))>-1&&(h.href='mailto:'+a(h.href,t+o.length))}catch(e){}for(c=e.querySelectorAll('.__cf_email__'),n=0;n<c.length;n++)try{(h=c[n]).parentNode.replaceChild(e.createTextNode(a(h.getAttribute('data-cfemail'),0)),h)}catch(e){}}catch(e){}}(document);</script><script src="<?php echo base_url() ?>admin_assets/assets/plugins/jQuery/jquery-1.12.4.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/metisMenu/metisMenu.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/lobipanel/lobipanel.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/animsition/js/animsition.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/fastclick/fastclick.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- STRAT PAGE LABEL PLUGINS -->
          <script src="<?php echo base_url() ?>admin_assets/assets/plugins/fullcalendar/lib/moment.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <!-- START THEME LABEL SCRIPT -->
        <script src="<?php echo base_url() ?>admin_assets/assets/dist/js/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/dist/js/jQuery.style.switcher.min.js" type="text/javascript"></script>
          <script src="<?php echo base_url() ?>admin_assets/assets/plugins/bootstrap-wizard/jquery.backstretch.min.js" type="text/javascript"></script>
                  <script src="<?php echo base_url() ?>admin_assets/assets/plugins/bootstrap-wizard/form.scripts.js" type="text/javascript"></script>



<script src="<?php  echo base_url() ?>admin_assets/assets/plugins/amcharts/amcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/ammap.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/worldLow.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/serial.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/export.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/light.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/pie.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/amcharts/amstock.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/chartJs/Chart.min.js" type="text/javascript"></script>

        <script src="<?php echo base_url() ?>admin_assets/assets/dist/js/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/dist/js/jQuery.style.switcher.min.js" type="text/javascript"></script>



    </body>



     <!-- STRAT PAGE LABEL PLUGINS -->
        <script src="<?php echo base_url() ?>admin_assets/assets/plugins/datatables/dataTables.min.js" type="text/javascript"></script>
        <!-- START THEME LABEL SCRIPT -->
        <!-- <script src="<?php echo base_url() ?>admin_assets/assets/dist/js/app.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url() ?>admin_assets/assets/dist/js/jQuery.style.switcher.min.js" type="text/javascript"></script> -->
        <script>
            $(document).ready(function () {

                "use strict"; // Start of use strict

                $('#dataTableExample1').DataTable({
                    "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>t<'row'<'col-sm-6'i><'col-sm-6'p>>",
                    "lengthMenu": [[6, 25, 50, -1], [6, 25, 50, "All"]],
                    "iDisplayLength": 6
                });

                $("#dataTableExample2").DataTable({
                    dom: "<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
                    "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
                    buttons: [
                        {extend: 'copy', className: 'btn-sm'},
                        {extend: 'csv', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'excel', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'pdf', title: 'ExampleFile', className: 'btn-sm'},
                        {extend: 'print', className: 'btn-sm'}
                    ]
                });

            });
        </script>
        <script type="text/javascript">
 $(document).ready(function() {
    $("body").on("click",".add-more",function(){
        var html = $(".after-add-more").first().clone();
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
          $(html).find(".change").html("<a class='btn btn-danger remove'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-more"><strong> + </strong> </a>');
        $(".after-add-more").last().after(html);
    });
    $("body").on("click",".remove",function(){
        $(this).parents(".after-add-more").remove();
    });
});
</script>
<script type="text/javascript">
    $(document).ready(function() {
    $("body").on("click",".add-kpi",function(){
        var html = $(".after-add-kpi").first().clone();
        //  $(html).find(".change").prepend("<label for=''>&nbsp;</label><br/><a class='btn btn-danger remove'>- Remove</a>");
          $(html).find(".delet").html("<a class='btn btn-danger remove'><i class='fa fa-trash-o' aria-hidden='true'></i> </a> "+' <a class="btn btn-success add-kpi"><strong> + </strong> </a>');
        $(".after-add-kpi").last().after(html);
    });
    $("body").on("click",".remove",function(){
        $(this).parents(".after-add-kpi").remove();
    });
});
</script>
   <script>
                    // $(function() {
                    //     $('#toggle-two').bootstrapToggle({
                    //         on: 'Yes',
                    //         off: 'No'
                    //     });
                    // })
                </script>
                   <script>
            $(document).ready(function () {

                "use strict"; // Start of use strict

                /* initialize the external events
                 -----------------------------------------------------------------*/

                $('#external-events .fc-event').each(function () {

                    // store data so the calendar knows to render an event upon drop
                    $(this).data('event', {
                        title: $.trim($(this).text()), // use the element's text as the event title
                        stick: true // maintain when user navigates (see docs on the renderEvent method)
                    });

                    // make the event draggable using jQuery UI
                    $(this).draggable({
                        zIndex: 999,
                        revert: true, // will cause the event to go back to its
                        revertDuration: 0  //  original position after the drag
                    });

                });


                /* initialize the calendar
                 -----------------------------------------------------------------*/

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay,listMonth'
                    },
                    defaultDate: '2016-12-12',
                    navLinks: true, // can click day/week names to navigate views
                    businessHours: true, // display business hours
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar
                    drop: function () {
                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }
                    },
                    events: [
                        {
                            title: 'Business Lunch',
                            start: '2016-12-03T13:00:00',
                            constraint: 'businessHours'
                        },
                        {
                            title: 'Meeting',
                            start: '2016-12-13T11:00:00',
                            constraint: 'availableForMeeting', // defined below
                            color: '#558B2F'
                        },
                        {
                            title: 'Conference',
                            start: '2016-12-18',
                            end: '2016-12-20'
                        },
                        {
                            title: 'Party',
                            start: '2016-12-29T20:00:00'
                        },
                        // areas where "Meeting" must be dropped
                        {
                            id: 'availableForMeeting',
                            start: '2016-12-11T10:00:00',
                            end: '2016-12-11T16:00:00',
                            rendering: 'background'
                        },
                        {
                            id: 'availableForMeeting',
                            start: '2016-12-13T10:00:00',
                            end: '2016-12-13T16:00:00',
                            rendering: 'background'
                        },
                        // red areas where no events can be dropped
                        {
                            start: '2016-12-24',
                            end: '2016-12-28',
                            overlap: false,
                            rendering: 'background',
                            color: '#ff9f89'
                        },
                        {
                            start: '2016-12-06',
                            end: '2016-12-08',
                            overlap: false,
                            rendering: 'background',
                            color: '#ff9f89'
                        }
                    ]
                });

            });
        </script>
        <script>

$(document).ready(function() {

$(function(){

new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 20 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});

});

});

        	$('#insert_lead').click(function(){


        var formData = new FormData( $("#lead_form")[0] );
        $.ajax({
            url: '<?php echo base_url(); ?>admin/insert_request',
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false,
            success : function(data) {
               var final=JSON.parse(data);

               if(final.status==true){
             swal({
  title: "Success",
  text: "Lead Has Been Successfully Created..",
  html: true
},
    function(){
          window.location.href='<?php echo base_url() ?>admin/view_lead';
    });
               }else if(final.status==false){

          swal({
  title: "Error",
  text: final.message,
  html: true
},
    function(){
    });

               }

            }
        });

    });




        </script>




</html>
