<?php 
session_start();
if(isset($_SESSION['username'])){ 
?>
<?php 
	require_once 'inc/dbConn.php';
	$id = $_GET['id'];
	$db = new dbConn('localhost','',"","");
	$data = $db->getUser($id);
	$db->closeDb();

	if(isset($_POST['password']) && isset($_POST['username'])){
		$db = new dbConn('localhost','dorronwebsite',"root","");
		$post = new User($_POST['username'],$_POST['password'],$password['name']);
		print_r($post);
		$db->updateUser($post,$id);
		$db->closeDb();
		header("Location:editUsers.php");
	} 
 ?>
<html>
<head>
	<title>Admin Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/myAdminStyle.css">
</head>
<body>
		<div id="header" class="container-fluid">
			<nav  class="navbar navbar-inverse nav">
				<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          </button>
          			<a class="navbar-brand" href="#">CMS</a>
       		 	</div>
				
				<div id="navbar" class="collapse navbar-collapse">
		          <ul id= "menuja" class="nav navbar-nav navbar-right">
		          	<li role="presentation" class="dropdown">
    				<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
      				<?php echo "Hello ".$_SESSION["name"]; ?> <span class="caret"></span>
    				</a>
	   				 <ul class="dropdown-menu">
	     				<li><a href="">Profile</a></li>
	     				<li><a href="">Log out</a></li>
	    			</ul>
  				  </li>
		          	<li><a href="admin.php">Dashboard</a></li>
		            <li><a href="editAbout.php">Edit About me</a></li>
		            <li><a href="editPost.php">Posts for blog</a></li>
		            <li><a href="editUsers.php">Admins</a></li>
		          </ul>
        		</div><!--/.nav-collapse -->
			</nav>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3>Edit User</h3>
				</div>
				<form method="post" action="editUser.php?id=<?php  echo $id;?>">
					<div class="col-md-12">
					<label>Name and surname</label>
					<input name="name" type="text" class="form-control" placeholder="Name" Value = "<?php echo $data->getName();?>">
					</div>
					<div class="col-md-12">
					<label>Username</label>
					<input name="username" type="text" class="form-control" placeholder="Userame" Value = "<?php echo $data->getUsername();?>">
					</div>
					<div class="col-md-12">
					<label>Password</label>
					<input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<div class="col-md-12">
						<input class="btn btn-default" type="submit" value="Submit">
					</div>

				</form>
				<div class="col-md-12">
					<a href="editUsers.php">Back</a>
				</div>
			</div>
		</div>	
<footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
</footer>
</body>
</html>
<?php 
}else{
	echo "not logged in";
}
 ?>