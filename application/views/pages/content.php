<div class="jumbotron text-center mt-5">
	<h3>Home Page</h3>
	<p>This is the home page of my Blog site</p>

	<div class="mt-3">
		<?php if(!$this->session->userdata('logged_in')) :?>
			<a href="<?php echo base_url('index.php/pages/login'); ?>"><button class="btn btn-success">Login</button></a>
			<a href="<?php echo base_url('index.php/pages/register'); ?>"><button class="btn btn-danger">Register</button></a>
		<?php endif; ?>
	</div>
</div>

<style type="text/css">
	button a{
		color: white;
	}
	button a:hover{
		color: white;
		text-decoration: none;
	}
</style>