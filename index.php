 <?php 
 	require_once 'inc/dbConn.php'; 
	$db = new dbConn('localhost','',"","");
  ?>
 <html>
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dorron Zherka</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/mycss.css">
</head>
<body>
	<div id="entire"class="container-fluid">
		<div id="header" class="container-fluid">
			<nav  class="navbar navbar-inverse nav navbar-fixed-top">
				<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
		          </button>
          			<a class="navbar-brand" href="#"><img id="logomy"	class= "img-responsive" src="imgs/yellow_dorronlogo.png"></a>
       		 	</div>
				
				<div id="navbar" class="collapse navbar-collapse">
		          <ul id= "menuja" class="nav navbar-nav navbar-right">
		            <li><a href="#homepage">Home</a></li>
		            <li><a href="#aboutme">About me</a></li>
		            <li><a href="#blog">Blog</a></li>
		          </ul>
        		</div><!--/.nav-collapse -->
			</nav>
		</div>
		<div id="entire" class="container-fluid">
				<div id ="homepage" class="page container-fluid">
					<!-- <img id="gif" class= "img-responsive "src=""> -->
					<p>
						<br>
						<!-- hahahah -->
						<br>
						<!-- this funny yeah -->
						<br>
						<!-- yo know it -->
						<br>
						<!-- love dx is my favorite team  -->
						<br>
						<!-- if u not down with this  -->
						<br>
						<!-- i've go two words for u -->
						<br>
						<!-- SUCK IT!!!!!!! -->
						<br>
						<!-- HAHAHAHHA -->
						<br>
						<!-- Thank u for reading the source code -->
						<br>
						<!-- but u  should read it  -->
						<br>
						<!-- this ugly code hahah :D -->
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<br>
						<!-- 

							**             *      *
							*  *            *    *
							*   *             * *
  							*    *             *
							*     *           *  *
							*     *          *    *
							*     *         *      *    
							*    *         *         *
							****          *           *
						 -->	
					</p>
				</div>
				
				<div id="aboutme"class="page container-fluid">
					<div id="aboutme-container"class="container">
					<div class="row">
						<div id="aboutme-title" class="col-md-12">
							<h3>About me</h3>
						</div>
					</div>	
					<div class="row">
						<div id="img" class="col-md-6">
						<img id="aboutme-photo" class="img-responsive" src="https://scontent-fra3-1.xx.fbcdn.net/v/t1.0-9/12994481_1589646938029857_616668142525627334_n.jpg?oh=133215c6de8a543c589d0fc29c4d0556&oe=589B0CB6">
					</div>
					<div  id="txt" class = "col-md-6">
						<p>
							<?php 
								echo $db->getPage();
							 ?>
						</p>
					</div>

					</div>
					</div>
				</div>
				<div id="blog" class="page container-fluid">
					<div id="blog-container" class="container">
						<div class="row">
							<div class="col-xs-12">
								<h3>
									Blog
								</h3>
							</div>
							<?php 
								$db->selectPosts(4);
								$db->closeDb();
							?>	
					</div>		
					</div>
			</div>
			<div id="footer" class="container-fluid">
							<div class="row">
								<div id="left">
									<p>
										Copyright 2016
										<br>
										Contact me : dorronzherka96@gmail.com
									</p>
								</div>
								<div id="right">
									<a class="fb" href="http://www.facebook.com/dorronzherka">&#xe027;</a>
									<a class="tw" href="https://twitter.com/ZherkaDorron">&#xe087;</a>
									<a class="li" href="https://www.linkedin.com/in/dorron-zherka-951308b1">&#xe052;</a>
								</div>
						</div>
			</div>
		</div>
	<footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/myScript.js"></script>
	</footer>
</body>
</html>		