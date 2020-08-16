function regval() {
	var name= document.register.name.value;
	var uname= document.register.uname.value;
	var email= document.register.email.value;
	var pwd= document.register.password.value;

	if (name == null || name == null) {
		window.alert('Requiredd');
		return false;
	}
}