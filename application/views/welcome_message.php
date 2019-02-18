<!DOCTYPE html>
<html>
<head>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
<script type="text/javascript">
			let globalEmail='';
			$(document).ready(function() {
			$("#signup").click(function(event) {
			event.preventDefault();
            let name = document.getElementById("name").value;
            let email = document.getElementById("email").value;
            let pwd = document.getElementById("pwd").value;

			jQuery.ajax({
			type: "POST",
			url: "http://localhost/CodeIgniter-2.2.6/CodeIgniter-2.2.6/index.php/welcome/signup",
			dataType: 'json',
			data: {name : name,
            email : email,
            password : pwd
            },
			success: function(response) {
			alert("account created");
			}
			}); 
			});
			$("#login").click(function(event) {
			event.preventDefault();
            let email = document.getElementById("email1").value;
            let pwd = document.getElementById("pwd1").value;

			jQuery.ajax({
			type: "POST",
			url: "http://localhost/CodeIgniter-2.2.6/CodeIgniter-2.2.6/index.php/welcome/login",
			dataType: 'json',
			data: {
            email : email,
            password : pwd
            },
			success: function(res) {
			console.log(res);
			alert("welcome");
			let n = res[0].name;
			let e = res[0].email;
			globalEmail = res[0].email;
			let p = res[0].password;
			document.getElementById('pname').innerHTML = "welcome <h3>"+e+"</h3>";
			document.getElementById('n1').value = n;
			document.getElementById('n2').value = p;
			}
			}); 
			});
			$("#update").click(function(event) {
			event.preventDefault();
			let name = document.getElementById("n1").value;
            let email = globalEmail;
            let pwd = document.getElementById("n2").value;

			jQuery.ajax({
			type: "POST",
			url: "http://localhost/CodeIgniter-2.2.6/CodeIgniter-2.2.6/index.php/welcome/userUpdate",
			dataType: 'json',
			data: {name : name,
            email : email,
            password : pwd
            },
			success: function(res) {
			console.log(res);
			alert("welcome");
			let n = res[0].name;
			let e = res[0].email;
			let p = res[0].password;
			document.getElementById('pname').innerHTML = "welcome <h3>"+e+"</h3>";
			document.getElementById('n1').value = n;
			document.getElementById('n2').value = p;
			}
			}); 
			});
			});
</script>
    
</head>
<body>
    <center>
    <input type="text" placeholder="enter your name" id="name"><br><br>
    <input type="text" placeholder="enter your email id" id="email"><br><br>
    <input type="text" placeholder="enter your password" id="pwd"><br><br>
    <button id="signup">sign up</button>
    <br><br><br><br>
    
    <input type="text" placeholder="enter your email id" id="email1"><br><br>
    <input type="text" placeholder="enter your password" id="pwd1"><br><br>
    <button id="login">login</button>
	
	<br><br><br>
	<span id="pname">Currently you are not logged in :(</span><br><br>
    Chnage your details:<br>Enter your New Name:  <input id="n1" type="text"><br><br>
	Enter your new password:  <input id="n2" type="text"><br><br>
    <button id="update">Update</button>
</center>
</body>
</html>