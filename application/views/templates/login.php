<style type="text/css">
	h4{
		font-weight: bolder;
	}
	div a:hover{
		text-decoration: none;
	}
	/*button.btn:hover{
		transform: scale(0.9);
		font-weight: bold;
	}*/
	div.na{
		text-align: center;
	}
	div.icons{
		text-align: center;
	}
	div.icons i{
		color: white;
		border-radius: 50%;
		padding: 10px;
		margin: 0px 5px;
		font-size: 25px;
	}
	a i.fab:hover{
		background-color: white;
		color: blue;
		transition: 1s;
	}
</style>

<form method="post" action="<?php echo base_url('index.php/users/userlogin'); ?>" class="container col-md-4 mt-5">
	<h6 class="text-danger"><?php echo validation_errors(); ?></h6>
	
	<h4 class="text-center text-light">LOGIN</h4>

	<label class="text-light">Username:</label>
	<input type="text" name="uname" placeholder="Username" class="form-control mb-2">

	<label class="text-light">Password:</label>
	<input type="password" name="password" placeholder="Password" class="form-control mb-3">

	<button class="btn btn-success btn-block mb-2">Login</button>

	<div class="na text-light mb-3">
		<div class="text-danger" style="font-weight: bold;"><a href="<?php echo base_url('index.php/posts/forgotpwd'); ?>" class="text-danger">Forgot Password</a></div>
		Don't have an account? 
		<a href="<?php echo base_url('index.php/pages/register'); ?>" class="text-info" style="font-weight: bold;">Register here</a>
	</div>

	<div class="icons">
		<a href="https://twitter.com/efficientjohn"><i class="fab fa-twitter"></i></a>
		<a href="https://www.instagram.com/efficientjohn/?hl=en"><i class="fab fa-instagram"></i></a>
		<a href="https://www.facebook.com/ogunnowo.olatayo/"><i class="fab fa-facebook"></i></a>
	</div>

</form>