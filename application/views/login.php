<!?php
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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/demo.css') ?>">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/img/logo_ss.png') ?>">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/img/logo_ss.png') ?>">
</head>
<body>
    
	
<div class="main">
            <!-- MAIN CONTENT -->
		<div class="col-md-12"> 
	        <div class="main-content">
		        <div class="container-fluid">
						<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img width="130px" height="80px" src="<?php echo base_url ()?>assets/img/logo_ss.png" alt="Klorofil Logo"></div>
								<p class="lead">Login</p>
							</div>
							<form class="form-auth-small" action="<?php echo base_url()?>Login/login" method="post">
								<div class="form-group">
									<label for="signin-email" class="control-label sr-only">Username</label>
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" class="form-control" id="signin-password" name="password"  placeholder="Password">
								</div>
								
								<button type="submit" class="btn btn-primary btn-md btn-block">Login</button>
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-lock">&nbsp;Belum Memiliki Akun ? </i> <a href="<?php echo base_url()?>/Daftar">&nbsp; | Daftar |</a></span>
								</div>
							</form>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Sistem Pakar Penentuan Motivasi Siswa</h1>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
                </div>
            </div>
		</div>
</div>
