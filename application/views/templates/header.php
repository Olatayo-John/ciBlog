<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css') ?>">
	 <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	 <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.0/gsap.min.js"></script>
	 <script src="https://kit.fontawesome.com/ca92620e44.js"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light mb-3 navbar-fixed-top" style="background-color: white">

		<div class="navbar-brand">
			<img src="<?php echo base_url('assets/images/moose.jpg'); ?>" width="100px">
			<label class="navbar-brand">
				<a href="<?php echo base_url('index.php/pages/index'); ?>">ciBlog</a>
			</label>
		</div>

		<button class="btn btn-outline-dark menubtn ml-auto" onclick="opennav()">&#9776;</button>

		<div class="side-nav" id="side-nav">

			<a href="javascript:void(0)" class="closex" onclick="closenav()">&times;</a>
			<ul style="list-style-type: none;">
				<?php if(!$this->session->userdata('logged_in')): ?>
					<li class="nav-item"><a href="<?php echo base_url('index.php/pages/index') ?>" class="nav-link text-success" style="font-weight: bolder;"><i class="fas fa-lock"></i>Login/Register</a></li>
				<?php endif; ?>

				<?php if($this->session->userdata('logged_in')): ?>
					<li class="nav-item"><a href="<?php echo base_url('index.php/users/userprofile/'.$this->session->userdata('id')); ?>" class="nav-link text-info" style="font-weight: bolder;"><i class="fas fa-user"></i><?php echo $this->session->userdata('uname'); ?></a></li>
					<li class="nav-item"><a href="<?php echo base_url('index.php/posts/create') ?>" class="nav-link text-danger" style="font-weight: bolder;"><i class="fas fa-plus"></i>Create Post</a></li>
				<?php endif; ?>

				<li class="nav-item"><a href="<?php echo base_url('index.php/posts/index') ?>" class="nav-link"><i class="fas fa-blog"></i>Blogs</a></li>
				<li class="nav-item"><a href="<?php echo base_url('index.php/pages/services') ?>" class="nav-link"><i class="fab fa-servicestack"></i>Services</a></li>
				<li class="nav-item"><a href="<?php echo base_url('index.php/pages/about') ?>" class="nav-link"><i class="fas fa-address-card"></i>About</a></li>

				<?php if($this->session->userdata('logged_in')): ?>
					<li class="nav-item"><a href="<?php echo base_url('index.php/users/logout') ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</nav>

	<div class="container mb-5" id="content">
		<?php if($this->session->flashdata('user_registered')) : ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('user_registered'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('invalid_login')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('invalid_login'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('valid_login')) : ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('valid_login'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_created')) : ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('post_created'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_deleted')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('post_deleted'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('post_updated')) : ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('post_updated'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('logout')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('logout'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('comment_added')) : ?>
			<div class="alert alert-success alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('comment_added'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('comment_deleted')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('comment_deleted'); ?></strong>
			</div>
		<?php endif; ?>

		<?php if($this->session->flashdata('comment_edited')) : ?>
			<div class="alert alert-danger alert-dismissible fade show">
				<button data-dismiss="alert" class="close">&times;</button>
				<strong><?php echo $this->session->flashdata('comment_edited'); ?></strong>
			</div>
		<?php endif; ?>

		<!-- <?php if ($this->session->userdata('logged_in')): ?>
			<strong class="text-light" style="font-size: 18px;"><?php echo "Welcome " .$this->session->userdata('uname') ?></strong>
		<?php endif;?> -->

		<script>
		function opennav() {
			document.getElementById('side-nav').style.width="250px";
			// document.getElementById('content').style.marginRight="250px";
		}
		function closenav() {
			document.getElementById('side-nav').style.width="0";
			// document.getElementById('content').style.marginRight="auto";
		}
		gsap.from(".alert", {duration: 1, x: -500, ease: "bounce"});
	</script>