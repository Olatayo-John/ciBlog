<style type="text/css">
	h4{
		font-weight: bolder;
	}
	div a:hover{
		font-weight: bold;
		text-decoration: none;
	}
	label{
		font-weight: bolder;
	}
	div#wn,#wu,#we,#pl,#wp{
		font-weight: bolder;
		color: red;
	}
	/*input.btn:hover{
		transform: scale(0.9);
		font-weight: bold;
	}*/
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

<form method="post" name="register" onsubmit="eturn regval()" class="container col-md-5 mb-5" action="<?php echo base_url('index.php/users/userregister'); ?>">

	<h4 class="text-center text-light">REGISTRATION</h4>

	<h6 class="text-danger"><?php echo validation_errors(); ?></h6>

	<label class="text-light">Name:</label>
	<input type="text" name="name" id="name" placeholder="Name" class="form-control">
	<div id="wn" class="mb-2"></div>

	<label class="text-light">Username:</label>
	<input type="text" name="uname" id="wui" placeholder="Username" class="form-control">
	<div id="wu" class="mb-2"></div>

	<label class="text-light">E-mail:</label>
	<input type="email" name="email" placeholder="E-mail" class="form-control">
	<div id="we" class="mb-2"></div>

	<h6 class="text-danger">*Password must be over 5 characters long</h6>
	<label class="text-light">Password:</label>
	<input type="password" name="password" placeholder="Password" class="form-control">
	<div id="pl" class="mb-2"></div>

	<label class="text-light">Re-type Password:</label>
	<input type="password" name="rpassword" placeholder="Re-type password" class="form-control">
	<div id="wp" class="mb-3"></div>

	<div class="mb-2">
		<input type="submit" value="Register" class="btn btn-success btn-block">
	</div>

	<div class="text-light mb-3 text-center">
		Already a user?
		<a href="<?php echo base_url('index.php/pages/login') ?>" class="text-center text-info" style="font-weight: bold;">Login here</a>
	</div>

	<div class="icons">
		<a href="https://twitter.com/efficientjohn"><i class="fab fa-twitter"></i></a>
		<a href="https://www.instagram.com/efficientjohn/?hl=en"><i class="fab fa-instagram"></i></a>
		<a href="https://www.facebook.com/ogunnowo.olatayo/"><i class="fab fa-facebook"></i></a>
	</div>

</form>

<script type="text/javascript">
	function regval() {
	var name= document.register.name.value;
	var uname= document.register.uname.value;
	var email= document.register.email.value;
	var pwd= document.register.password.value;
	var rpwd= document.register.rpassword.value;

	if (name == "" || name == null) {
		wn.innerHTML= "Name is required";
		return false;
	}if (uname == "" || uname == null) {
		wu.innerHTML= "Pick a Username";
		return false;
	}
	if (email == "" || email == null) {
		we.innerHTML= "E-mail is required";
		return false;
	}
	if (pwd == "" || pwd == null) {
		pl.innerHTML= "Pick a password";
		return false;
	}
	if (pwd.length < 5 ) {
		pl.innerHTML= "Passowrd too short";
		return false;
	}if (rpwd == "" || rpwd == null) {
		wp.innerHTML= "Re-type Password";
		return false;
	}if (pwd !== rpwd) {
		wp.innerHTML= "Passowrd does not match";
		return false;
	}else{
		return true;
	}
}

</script>