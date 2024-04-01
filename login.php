<?php
	ob_start();
	session_start();
	if (isset($_SESSION['user'])){
		header ("Location: index.php");
	}
	if ((@$_POST['user'] == "security" and @$_POST['pass'] == "security@12345")){
		$_SESSION['user'] = $_POST['user'];	
		echo "LOGIN SUCCESS";
		header ("Location: index.php");
	}
	else if(@$_POST['user'] == '' and @$_POST['pass'] == '') {
		echo @$_POST['user'];
	}
	else{
		$err =  "Username or Password Invalid!";
	}
?>
<html>
	<head>
		<title>  LOGIN | OFPKR </title>
		<style>
			#error{
				color:red;
			}
			input[type=text], input[type=password] {
		  		width: 100%;
		  		padding: 12px 20px;
		  		margin: 8px 0;
		  		display: inline-block;
		  		border: 1px solid #ccc;
		  		box-sizing: border-box;
			}

			input[type=submit] {
  				background-color: #5873eb;
  				color: white;
  				padding: 14px 20px;
  				margin: 8px 0;
  				border: none;
  				cursor: pointer;
  				width: 100%;
			}

			input[type=submit]:hover {
  				opacity: 0.8;
			}
		</style>
	</head>
	<body>
		<center>
			<h1>Login for Visitor's Pass.</h1>
			<form action = "#" method = "POST">
				<table>
					<tr>
						<td colspan = 2> <h2 id = "error"> <?php echo @$err; ?> </h2></td>
					</tr>
					<tr>
						<td> <label> USERNAME: </label> </td>
						<td> <input type = "text" placeholder = "Username" name = "user" required /> </td>
					</tr>
					<tr>
						<td> <label> PASSWORD: </label> </td>
						<td> <input type = "password" placeholder = "Password" name = "pass" required /> </td>
					</tr>
					<tr>
						<td colspan = 2> <input type = "submit" value = "Login" /></td>
					</tr>
				
				</table>
			</form>
		
		</center>
	</body>

</html>