<!DOCTYPE html>
<html lang="en">


<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php echo $title?></title>
        <!-- FEVICON AND TOUCH ICON -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>admin_assets/assets/dist/img/ico/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url() ?>admin_assets/assets/dist/img/ico/apple-touch-icon-57-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url() ?>admin_assets/assets/dist/img/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url() ?>admin_assets/assets/dist/img/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="<?php echo base_url() ?>admin_assets/assets/dist/img/ico/apple-touch-icon-144-precomposed.png">
        <!-- STATRT GLOBAL MANDATORY STYLE -->
        <link href="<?php echo base_url() ?>admin_assets/assets/dist/css/base.css" rel="stylesheet" type="text/css"/>
        <!-- START PAGE LABEL PLUGINS -->
        <link href="<?php echo base_url() ?>admin_assets/assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>admin_assets/assets/plugins/fullcalendar/fullcalendar.print.min.css" rel="stylesheet" media='print' type="text/css"/>
        <link href="<?php echo base_url() ?>admin_assets/assets/plugins/datatables/dataTables.min.css" rel="stylesheet" type="text/css"/>
        <!-- START THEME LAYOUT STYLE -->
        <link href="<?php echo base_url() ?>admin_assets/assets/dist/css/component_ui.min.css" rel="stylesheet" type="text/css"/>
        <link id="defaultTheme" href="<?php echo base_url() ?>admin_assets/assets/dist/css/skins/skin-dark-1.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url() ?>admin_assets/assets/dist/css/custom.css" rel="stylesheet" type="text/css"/>
        <!-- multi select -->
        <link href="<?php echo  base_url()?>admin_assets/assets/plugins/amcharts/export.css" rel="stylesheet" type="text/css" />


<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

 <script src="<?php echo base_url() ?>assets/sweet/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/sweet/dist/sweetalert.css">

   <!-- include alertify.css -->
<link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/alertifyjs/css/alertify.css">

<!-- include semantic ui theme  -->
<link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/alertifyjs/css/themes/semantic.css">

<!-- include alertify script -->
<script src="<?php echo base_url() ?>admin_assets/alertifyjs/alertify.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>admin_assets/dist/css/bootstrap-select.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>admin_assets/dist/js/bootstrap-select.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    <link href="<?php echo base_url() ?>admin_assets/assets/dist/button/css/bootstrap-toggle.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.3/highlight.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/assets/dist/button/doc/script.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>admin_assets/assets/dist/button/js/bootstrap-toggle.js"></script>
    </head>
    <body>
        <div id="wrapper" class="wrapper animsition">
            <!-- Navigation -->
            <nav class="navbar navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="material-icons">apps</i>
                    </button>
                    <a class="navbar-brand" href="#">
                      <img class="main-logo" src="<?php echo base_url() ?>admin_assets/images/logo.png" alt="">

                        <!--<span>AdminPage</span>-->
                    </a>
                </div>
                <div class="nav-container">
                    <!-- /.navbar-header -->
                    <ul class="nav navbar-nav hidden-xs">
                        <li><a id="fullscreen" href="#"><i class="material-icons">fullscreen</i> </a></li>
                        <!-- /.Fullscreen -->
                        <li class="hidden-xs">
                            <a class="search-trigger" href="#">
                                <i class="material-icons">search</i>
                            </a>
                            <div class="fullscreen-search-overlay" id="search-overlay">
                                <a href="#" class="fullscreen-close" id="fullscreen-close-button"><i class="ti-close"></i></a>
                                <div id="fullscreen-search-wrapper">
                                    <form method="get" id="fullscreen-searchform" action="#">
                                        <input type="text" value="" placeholder="Type keyword(s) here" id="fullscreen-search-input">
                                        <i class="ti-search fullscreen-search-icon"><input value="" type="submit"></i>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <!-- /.Full page search -->
                        <li><a id="menu-toggle" href="#"><i class="material-icons">apps</i></a></li>
                        <!-- /.Sidebar menu toggle icon -->
                        <!--Start dropdown mega menu-->

                        <!--End dropdown mega menu-->

                    </ul>
                    <ul class="nav navbar-top-links navbar-right">
                        <!--<li class="dropdown">-->
                        <!--    <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
                        <!--        <i class="material-icons">chat</i>-->
                        <!--        <span class="label label-danger">9</span>-->
                        <!--    </a>-->
                        <!--    <ul class="dropdown-menu dropdown-messages">-->
                        <!--        <li class="rad-dropmenu-header"><a href="#">New Messages</a></li>-->
                        <!--        <li>-->
                        <!--            <a href="#" class="rad-content">-->
                        <!--                <div class="inbox-item">-->
                        <!--                    <div class="inbox-item-img"><img src="<?php echo base_url() ?>admin_assets/assets/dist/img/avatar.png" class="img-circle" alt=""></div>-->
                        <!--                    <strong class="inbox-item-author">Naeem Khan</strong>-->
                        <!--                    <span class="inbox-item-date">-13:40 PM</span>-->
                        <!--                    <p class="inbox-item-text">Hey! there I'm available...</p>-->
                        <!--                    <span class="profile-status available pull-right"></span>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--        </li>-->

                        <!--        <li class="rad-dropmenu-footer"><a href="#">View All messages</a></li>-->
                        <!--    </ul> -->
                        <!--</li>-->
                        <!--<li class="dropdown">-->
                        <!--    <a class="dropdown-toggle" data-toggle="dropdown" href="#">-->
                                <!--<i class="ti-flag-alt"></i>-->
                        <!--        <i class="material-icons">flag</i>-->
                        <!--        <span class="label label-success">4</span>-->
                                <!--<i class="ti-angle-down"></i>-->
                        <!--    </a>-->
                        <!--    <ul class="dropdown-menu dropdown-tasks">-->
                                <!--<li class="ui_popover_tooltip"></li>-->
                        <!--        <li class="rad-dropmenu-header"><a  href="#">Your Task</a></li>-->


                        <!--        <li>-->
                        <!--            <a href="#">-->
                        <!--                <div>-->
                        <!--                    <p><strong>Task 4</strong>-->
                        <!--                        <span class="pull-right sm-text">80% Complete</span></p>-->
                        <!--                    <div class="progress progress-striped active">-->
                        <!--                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">-->
                        <!--                            <span class="sr-only">80% Complete (danger)</span>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li class="rad-dropmenu-footer"><a href="#">See All Tasks</a></li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                        <li class="dropdown" id="click_notification" >
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="material-icons">add_alert</i>
<span class="label label-success" id="count_notification"></span>                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li class="rad-dropmenu-header"><a href="#">Your Notifications</a></li>


                                <div id="get_notification" style="overflow:auto;height:300px;">

                                </div>
                            </ul>  <!-- /.dropdown-alerts -->
                            <!-- /.dropdown-alerts -->
                        </li>
                        <!-- /.Dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="material-icons">person_add</i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="profile.html"><i class="ti-user"></i>&nbsp; Profile</a></li>
                                <li><a href="mailbox.html"><i class="ti-email"></i>&nbsp; My Messages</a></li>
                                <li><a href="lockscreen.html"><i class="ti-lock"></i>&nbsp; Lock Screen</a></li>
                                <li><a href="#"><i class="ti-settings"></i>&nbsp; Settings</a></li>
                                <li><a href="<?php echo base_url() ?>admin/destroy"><i class="ti-layout-sidebar-left"></i>&nbsp; Logout</a></li>
                            </ul><!-- /.dropdown-user -->
                        </li><!-- /.Dropdown -->
                        <li class="log_out">
                            <a href="<?php echo base_url() ?>admin/destroy">
                                <i class="material-icons">power_settings_new</i>
                            </a>
                        </li><!-- /.Log out -->
                    </ul> <!-- /.navbar-top-links -->
                </div>
            </nav>
            <!-- /.Navigation -->
            <div class="sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                   <ul class="nav" id="side-menu">
                      <li class="nav-heading "> <span>Main Navigation&nbsp;&nbsp;&nbsp;&nbsp;------</span></li>
                      <?php 
                        foreach ($menus as $menu) {
                          echo '<li><a href="'.base_url($menu['url']).'" class="material-ripple"><i class="material-icons">'.$menu['icon'].'</i> '.$menu['name'].'</a></li>';
                        }
                      ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>


            <script>
            $('#click_notification').click(function(){
                $(document).ready(function(){
                    $.ajax({
                        url:"<?php echo base_url() ?>admin/get_notification",
                        type:"get",
                        success:function(resp){
                            // console.log(resp);
                            $('#get_notification').html(resp);
                        }
                    });
                });
            });

            </script>
            <script>
            function count_notification(){
                $(document).ready(function(){
                    $.ajax({
                        url:"<?php echo base_url() ?>admin/count_notification",
                        type:"get",
                        success:function(resp){
                            // console.log(resp);
                            $('#count_notification').html(resp);
                        }
                    });
                });
            }
            count_notification();

            setInterval(count_notification,2000);

            </script>
