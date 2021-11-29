<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">

<head>
	<title>Dashboard | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/bootstrap/css/bootstrap.min.css')  ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/font-awesome/css/font-awesome.min.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/linearicons/style.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/vendor/chartist/css/chartist-custom.css') ?>">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/main.css') ?>">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/apple-icon.png') ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/favicon.png') ?>">
    <link rel="stylesheet" href="<?php echo base_url ()?>assets/css/dataTables.bootstrap4.min.css">
<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
     <!-- <?php if ($status=='home') {?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/responsive.css">
    
<?php }elseif ($status=='user'){?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/news.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/news_responsive.css">  
    
<?php }elseif ($status=='kategori'){?>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about_responsive.css">

<?php }elseif ($status=='gejala'){?>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about_responsive.css">

<?php }elseif ($status=='solusi'){?>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about_responsive.css">

<?php }elseif ($status=='rule'){?>
   <link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url ()?>u_assets/styles/about_responsive.css">

       <?php }?>-->
    
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="index.html"><img width="90px" height="30px" src="<?php echo base_url('assets/img/logo_ss.png') ?>" alt="Klorofil Logo" class="logo text-center"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo base_url('assets/img/siswa.png') ?>" class="img-circle" alt="Avatar"> <span><?php echo $this->session->userdata("nama"); ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo base_url('login/logout') ?>"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
        <!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<?php if($this->session->userdata("level") == 2){ ?>
							<li><a href="<?php echo base_url()?>Home"  <?php if ($status=='home'){?> class="active" <?php }?>><i class="fa fa-home"></i> <span>Home</span></a></li>
                        	<li><a href="<?php echo base_url()?>Raport"  <?php if ($status=='raport'){?> class="active" <?php }?>><i class="fa fa-book"></i> <span>Raport</span></a></li>
						<?php } ?>

						<?php if($this->session->userdata("level") == 1){ ?>
							<!-- <li ><a href="<?php echo base_url()?>User" <?php if ($status=='user'){?> class="active" <?php }?>><i class="fa fa-id-badge"></i> <span>Data User</span></a></li> -->
							<li ><a href="<?php echo base_url()?>Kategori" <?php if ($status=='kategori'){?> class="active" <?php }?>><i class="fa fa-tasks"></i> <span>Kategori</span></a></li>
							<li ><a href="<?php echo base_url()?>Gejala" <?php if ($status=='gejala'){?> class="active" <?php }?>><i class="fa fa-heartbeat"></i> <span>Gejala</span></a></li>
							<li ><a href="<?php echo base_url()?>Rule" <?php if ($status=='rule'){?> class="active" <?php }?>><i class="fa fa-share-alt"></i> <span>Rule</span></a></li>
							<li ><a href="<?php echo base_url()?>Solusi" <?php if ($status=='solusi'){?> class="active" <?php }?>><i class="fa fa-suitcase"></i> <span>Solusi</span></a></li>
							<li ><a href="<?php echo base_url()?>Laporan" <?php if ($status=='laporan'){?> class="active" <?php }?>><i class="fa fa-bar-chart"></i> <span>Laporan</span></a></li>
						<?php } ?>
						
						
						
						
                    </ul>
				</ nav>
			</div>
		</div>
		
