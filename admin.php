<?php 
session_start();
if(!empty($_SESSION['logged_in'])){ 
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
	     				<li><a href="loggout.php">Log out</a></li>
	    			</ul>
  				  </li>
		          	<li><a href="admin.php">Dashboard</a></li>
		            <li><a href="editAbout.php">Edit About me</a></li>
		            <li><a href="editPost.php">Posts</a></li>
		            <li><a href="editUsers.php">Admins</a></li>
		          </ul>
        		</div><!--/.nav-collapse -->
			</nav>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h1>
						This is Admin Area
					</h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12"><h3>Recent Post</h3>
				</div>
				<div class="col-md-6">
						<table class="table table-striped">
							<?php 
								require_once 'inc/dbConn.php'; 
								$db = new dbConn('localhost','db',"user","pass");
								$db-> selectWithMinimum(4);
								$db->closeDb();
							?>

						</table>
				</div>
			</div>
		</div>	
<footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
</footer>
</body>

</html>
<?php }else{
	header("Location:login.php");
} ?>
