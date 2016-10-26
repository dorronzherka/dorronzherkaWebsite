<?php 
session_start();
if(empty($_SESSION['logged_in'])){ 
?>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

	<div id="logomy" class="col-md-13">
		<img  class= "img-responsive" src="imgs/yellow_dorronlogo.png">
	
	
		<form  method="POST" action="checklogin.php">
			<label for="exampleInputEmail1">Username</label>
    		<input name="username" type="text" class="form-control"  placeholder="Username">
    		<label for="exampleInputPassword1">Password</label>
    		<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    		<button type="submit" class="btn btn-default">Submit</button>
		</form>
                <a href="index.php">Go back to Home Page</a>

	</div>


	<footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</footer>
</body>

</html>	
<?php 
}else{
  header("Location:admin.php");
}
?>				