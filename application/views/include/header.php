<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <link rel="icon" type="image/x-icon" href="<?= base_url() ?>assets/adminfiles/images/favicons/" />
  <meta name="author" content="">
  <title>Admin</title>
 


   <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   <!-- Stylesheets -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/css/bootstrap.css"> -->
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
<body class="hold-transition sidebar-mini layout-fixed">

	<!-- getting website settings -->
	<?php
		$website_settings = $this->session->userdata('website_settings');
		$logo = $website_settings[0]['logo'];
	?>
 
 

  <?php 
  $active = $this->uri->segment(1);
  $active2 = $this->uri->segment(2);
  ?>

 
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
