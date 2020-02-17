<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap_datepicker.css">
</head>
<body>
<input type="hidden" id="base_url" value="<?= base_url()?>">	
<a href="<?= base_url()?>Home">Home</a><br>
<a href="<?= base_url()?>Home/Logout">Logout</a><br>
Master Data
<ul>
	<li><a href="<?= base_url()?>Home/Currency">currency</a></li>
	<li><a href="<?= base_url()?>Port">port</a></li>
	<li><a href="<?= base_url()?>Country">country</a></li>
	<li><a href="<?= base_url()?>Agent">agent</a></li>
	<li><a href="<?= base_url()?>Agent/Agent_group">agent groups</a></li>
	<li><a href="<?= base_url()?>Customer">Customer</a></li>
	<li><a href="<?= base_url()?>Customer/Customer_group">Customer groups</a></li>
</ul>

Operation - Shipment
<ul>
	<li><a href="<?= base_url()?>Shipment/all_shipment">All Shipment</a></li>
	<hr>
	<li><a href="<?= base_url()?>Shipment/sea_import_shipment">Sea Import Shipment</a></li>
	<li><a href="<?= base_url()?>Shipment/sea_import_job">Sea Import Job</a></li>
	<hr>
</ul>	
<a href="<?= base_url()?>Home/Website_settings">Manage Website Settings</a><br>

 -->



 <!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="bootstrap admin template">
  <?php 


          ?>
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/adminfiles/images/favicons/" />
  <meta name="author" content="">
  <title>Admin</title>
  <!-- Stylesheets -->
  <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap_datepicker.css">
	<link rel="stylesheet" href="<?= base_url()?>assets/css/custom.css">
 
  <style>


/* Pagination */
div.pagination {
  font-family: "Lucida Sans Unicode", "Lucida Grande", LucidaGrande, "Lucida Sans", Geneva, Verdana, sans-serif;
  padding:2px;
  margin: 3px 10px 25px;
    float: right;
}

div.pagination a {
  margin: 2px;
  padding: 0.4em 0.64em 0.4em 0.64em;
  background-color: #036fb2;
  text-decoration: none; /* no underline */
  color: #fff;
}
div.pagination a:hover, div.pagination a:active {
  padding: 0.5em 0.64em 0.43em 0.64em;
  margin: 2px;
  background-color: #f16724;
  color: #fff;
}
div.pagination span.current {
    padding: 0.5em 0.64em 0.43em 0.64em;
    margin: 2px;
    background-color: #f6efcc;
    color: #6d643c;
  }
div.pagination span.disabled {
    display:none;
  }
.pagination ul li{display: inline-block;}
.pagination ul li a.active{opacity: .5;}

/* loading */
.loading{position: absolute;left: 0; top: 0; right: 0; bottom: 0;z-index: 2;background: rgba(255,255,255,0.7);}
.loading .content {
    position: absolute;
    transform: translateY(-50%);
     -webkit-transform: translateY(-50%);
     -ms-transform: translateY(-50%);
    top: 50%;
    left: 0;
    right: 0;
    text-align: center;
    color: #555;
}
</style>

 
</head>
<body class="animsition">

	<!-- getting website settings -->
	<?php
		$website_settings = $this->session->userdata('website_settings');
		$logo = $website_settings[0]['logo'];
	?>
 
  <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
    <div class="navbar-header">
      <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
      data-toggle="menubar">
        <span class="sr-only">Toggle navigation</span>
        <span class="hamburger-bar"></span>
      </button>
      <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
      data-toggle="collapse">
        <i class="icon wb-more-horizontal" aria-hidden="true"></i>
      </button>
      
      <div class="navbar-brand navbar-brand-center"> <!--site-gridmenu-toggle-->
     <a href="<?= base_url() ?>Home"><img src="<?= base_url() ?>assets/uploads/website_settings/<?= $logo?>" alt="..." style=" margin-left: 65px; width: 88px;margin-top: 2px;"></a>
       
      </div>
      
      <button type="button" class="navbar-toggler collapsed search_icon" data-target="#site-navbar-search"
      data-toggle="collapse">
        <span class="sr-only">Toggle Search</span>
        <i class="icon wb-search" aria-hidden="true"></i>
      </button>
    </div>
    <div class="navbar-container container-fluid">
      <!-- Navbar Collapse -->
      <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
        
        <!-- Navbar Toolbar Right -->
        
        <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
           
            <li class="nav-item dropdown">
              <a class="dropdown-item" href="<?= base_url() ?>Home/Logout" role="menuitem">Logout</a>

              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="<?= base_url() ?>Admin/Logout" role="menuitem"><i class="icon wb-power" aria-hidden="true"></i> Logout</a>
              </div>
            </li>
        
         </ul>
        <!-- End Navbar Toolbar Right -->
      </div>
      <!-- End Navbar Collapse -->
      <!-- Site Navbar Seach -->
      <div class="collapse navbar-search-overlap" id="site-navbar-search">
        <form role="search">
          <div class="form-group">
            <div class="input-search">
              <i class="input-search-icon wb-search" aria-hidden="true"></i>
              <input type="text" class="form-control" name="site-search" placeholder="Search...">
              <button type="button" class="input-search-close icon wb-close" data-target="#site-navbar-search"
              data-toggle="collapse" aria-label="Close"></button>
            </div>
          </div>
        </form>
      </div>
      <!-- End Site Navbar Seach -->
    </div>
  </nav>

  <?php 
  $active = $this->uri->segment(1);
  $active2 = $this->uri->segment(2);
  ?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrg">
  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 mrg">
    <div class="site-menubar">
      <div class="site-menubar-body">
          <ul class="navigation">

          <li class="click1">
            <a href="javascript:();">
            <span class="site-menu-title">Doctor Information</span>
            </a>
   
        
        
              <img class="arrw_img3" src="<?=base_url()?>assets/img/arrw_btm.png">
         
              <img class="arrw_img2" src="<?=base_url()?>assets/img/arrw_top.png">
           
            
            
          </li>

          <ul class="subhide1" style="<?php if($active2 == 'home_filtered' || $active2 == 'home'|| $active2 == 'edit_doctor_info'){echo 'display: block';}?>">
            <li>
              <a href="<?= base_url() ?>Dashboard/home" class="<?=(($active == "Dashboard" && $active2 == "home")||($active == "Dashboard" && $active2 == "edit_doctor_info")) ? 'active2' : ''?>">Doctor Info</a>
            </li>
            <li>
              <a href="<?= base_url() ?>Dashboard/home_filtered" class="<?=($active == "Dashboard" && $active2 == "home_filtered") ? 'active2': ''?>">Filter Doctor Info</a>
            </li> 
          </ul>

          <li>
            <a href="<?= base_url() ?>Home" class="<?=($active == "Dashboard" && $active2 == "home_filtered_washroom") ? 'active2': ''?>">
              <span class="site-menu-title">Dashboard</span>
            </a>
          </li>

          <li class="click3">
            <a href="javascript:();">
              <span class="site-menu-title">Operation Shipment</span>
            </a>
            <img class="arrw_img31" src="<?=base_url()?>assets/img/arrw_btm.png">
            <img class="arrw_img311" src="<?=base_url()?>assets/img/arrw_top.png">
          </li>

          <ul class="subhide3" style="<?php if($active2 == 'analytics_report' || $active2 == 'analytics_report_washroom'){echo 'display: block';}?>">

          	<li><a href="<?= base_url()?>Shipment/all_shipment">All Shipment</a></li>
			<li><a href="<?= base_url()?>Shipment/sea_import_shipment">Sea Import Shipment</a></li>
			<li><a href="<?= base_url()?>Shipment/sea_import_job">Sea Import Job</a></li>

            <!-- <li class="<?=($active == "Dashboard" && $active2 == "analytics_report") ?'active2':''?>">
              <a href="<?= base_url() ?>Dashboard/analytics_report" class="<?=($active == "Dashboard" && $active2 == "analytics_report") ? 'active2': ''?>">Doctor Stats</a>
            </li>
            <li class="<?=($active == "Dashboard" && $active2 == "analytics_report_washroom") ? 'active2':''?>">
              <a href="<?= base_url() ?>Dashboard/analytics_report_washroom" class="<?=($active == "Dashboard" && $active2 == "analytics_report_washroom") ? 'active2': ''?>">Washroom Stats</a>
            </li>  -->
          </ul>


          <li class="click2">
            <a href="javascript:();">
              <span class="site-menu-title">Master Data</span>
            </a>
            <img class="arrw_img" src="<?=base_url()?>assets/img/arrw_btm.png">
            <img class="arrw_img1" src="<?=base_url()?>assets/img/arrw_top.png">
          </li>

          <ul class="subhide2" style="<?php if($active2 == 'website_settings' || $active2 == 'update_password'){echo 'display: block';}?>">

          	<li><a href="<?= base_url()?>Home/Currency">currency</a></li>
			<li><a href="<?= base_url()?>Port">port</a></li>
			<li><a href="<?= base_url()?>Country">country</a></li>
			<li><a href="<?= base_url()?>Agent">agent</a></li>
			<li><a href="<?= base_url()?>Agent/Agent_group">agent groups</a></li>
			<li><a href="<?= base_url()?>Customer">Customer</a></li>
			<li><a href="<?= base_url()?>Customer/Customer_group">Customer groups</a></li>

           <!--  <li class="<?=($active == "Dashboard" && $active2 == "website_settings") ?'active2':''?>">
              <a href="<?= base_url() ?>Dashboard/website_settings" class="<?=($active == "Dashboard" && $active2 == "website_settings") ? 'active2': ''?>">Manage Api</a>
            </li>
            <li class="<?=($active == "Dashboard" && $active2 == "update_password") ? 'active2':''?>">
              <a href="<?= base_url() ?>Dashboard/update_password" class="<?=($active == "Dashboard" && $active2 == "update_password") ? 'active2': ''?>">Update password</a>
            </li> --> 
          </ul>

          </ul>
      </div>
    </div>
  </div>
</div>
 
<input type="hidden" id="base_url" value="<?=base_url()?>">
      <!-- Modal -->
<div class="modal fade" id="my_dynamic_model_id" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="mydynamiv_model_label">Modal title</h4>
          </div>
          <div id="mydynamiv_model_body" class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <a id="mydynamiv_model" href="" class="btn btn-danger" data-animal-type="bird">
                    <i class="halflings-icon white trash"><span class="fa fa-trash-o"></span></i> 
                  </a>
             <!-- <button type="button" class="btn btn-danger">Confirm</button> -->
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal for confirmation end-->
<script type="text/javascript">

var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>',
    csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';
    
</script>
