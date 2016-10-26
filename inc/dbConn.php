<?php 
	require_once 'Posts.php';
	require_once 'User.php';
	require_once 'Page.php';
	class dbConn{
		
		protected $dbconn;

		public function __construct($host,$dbname,$usr,$pss){
			try{
				$dsn ="mysql:host=".$host.";dbname=".$dbname;
				$this->dbconn = new PDO($dsn,$usr,$pss);
			}catch(PDOException $e){
				echo $e->getMessage();
			}			
		}

		public function closeDb(){
			$this->dbconn = null;
		}


		public function insertPosts(Post $post){
			try{
				$stmt = $this->dbconn->prepare("INSERT INTO posts (title,content,author,dat) VALUES (:title,:content,:author,:dd)");
				$stmt->execute(array(
					":title" => $post->getTitle(),
					":content" =>$post->getContent(),
					":author" =>$post->getAuthor(),
					":dd" => $post->getDate()
				));
			}catch(PostException $p){
				echo $p->getMessage();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function selectAll(){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM posts ORDER BY dat DESC");
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$data = new Post($row['id'],$row['title'],$row['content'],$row['author'],$row['dat']);
					echo "<tr><td>".$data->getId()."</td><td>".$data->getTitle()."</td><td>".$data->getAuthor()."</td><td>".$data->getDate()."</td><td><a href=edit.php?id=".$data->getId().">Edit</a></td><td><a href=delete.php?id=".$data->getId().">Delete</a></td></tr>";
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function selectWithMinimum($nr){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM posts ORDER BY dat DESC LIMIT ".$nr);
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$data = new Post($row['id'],$row['title'],$row['content'],$row['author'],$row['dat']);
					echo "<tr><td>".$data->getId()."</td><td>".$data->getTitle()."</td><td>".$data->getAuthor()."</td><td>".$data->getDate()."</td><td><a href=edit.php?id=".$data->getId().">Edit</a></td><td><a href=delete.php?id=".$data->getId().">Delete</a></td></tr>";
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function selectPosts($nr){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM posts ORDER BY dat DESC LIMIT ".$nr);
				$stmt->execute();
				while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$data = new Post($row['id'],$row['title'],$row['content'],$row['author'],$row['dat']);
					echo $data;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function deleteAll(){
			try{
				$stmt = $this->dbconn->prepare("TRUNCATE TABLE posts");
				$stmt->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function delete($id){
			try{
				$stmt = $this->dbconn->prepare("DELETE FROM posts WHERE id = :id");
				$stmt->bindValue(":id",$id);
				$stmt->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}

		public function getPost($id){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM posts WHERE id = :id");
				$stmt->bindValue(":id",$id);
				$stmt->execute();
				$row = $stmt->fetch();
				return new Post($row['id'],$row['title'],$row['content'],$row['author'],$row['dat']);

			}catch(Exception $e){
				return $e->getMessage();
			}
		}

		public function update(Post $post,$id){
			try{
				$stmt = $this->dbconn->prepare("UPDATE posts SET title = :title, content = :content, author = :author, dat = :date WHERE id = $id");
				$stmt->execute(array(
						":title" => $post->getTitle(),
						":content" => $post->getContent(),
						":author" => $post->getAuthor(),
						":date"  => $post->getDate()
					));
			}catch(Exception $e){
					echo $e->getMessage();
			}
		}

		public function registerUser(User $blla){
			try{
				$stmt = $this->dbconn->prepare("INSERT INTO users (name,username,password) VALUES (:name,:user,:password)");
				$stmt->execute(array(
						":name" => $blla->getName(),
						":user" => $blla->getUsername(),
						":password" => $blla->getPassword()
					));
			}catch(UserExcepiton $e){
				echo $e->getMessage();
			}
		}

		public	function checkUser(User $blla){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM users WHERE password = :password AND username = :username");
				$stmt->execute(array(
						":password" => $blla->getPassword(),
						":username" => $blla->getUsername()
				));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return array(
					"counter" => $stmt->RowCount(),
					"name" => $row['name'],
					"username" => $row['username']
					);
			}catch(Exception $e){
				return $e->getMessage();
			}
		}

		public function selectAllUsers(){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM users");
				$stmt->execute();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
					$user = new User($row['username'],$row['password'],$row['name']);
					echo "<tr><td>".$user->getName()."</td><td>".$user->getUsername()."</td><td><a href=editUser.php?id=".$row['id'].">Edit</a></td><td><a href=deleteUser.php?id=".$row['id'].">Delete</a></td></tr>";
				}
			}catch(Exception $e){
				echo  $e->getMessage();
			}
		}

		public function getUser($id){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM users WHERE id = :id");
				$stmt->execute(array(":id" => $id));
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return new User($row['username'],$row['password'],$row['name']);
			}catch(Exception $e){
				return $e->getMessage();
			}
		}

		public function updateUser(User $user , $id){
			try {
				$stmt = $this->dbconn->prepare("UPDATE users SET username = :username, password = :password , password = :password WHERE id = :id");
				$stmt->execute(array(
						":username" => $user->getUsername(),
						":password" => $user->getPassword(),
						":name"     => $user->getName(),
						":id"       => $id
					));
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		public function deleteUser($id){
			try{
				$stmt = $this->dbconn->prepare("DELETE FROM users WHERE id = :id");
				$stmt->bindValue(":id",$id);
				$stmt->execute();
			}catch(PDOException $e){
				echo $e->getMessage();
			}
		}
		

		public function getPage(){
			try{
				$stmt = $this->dbconn->prepare("SELECT * FROM pages");
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$page = new Page($row['title'],$row['content'],$row['id']);
				return $page;
			}catch(Exception $e){
				return $e->getMessage();
			}
		}

		public function updatePage(Page $page){
			try{
				$stmt = $this->dbconn->prepare("UPDATE pages SET title = :title , content = :content WHERE id = :id");
				$stmt->execute(array(
						":title" => $page->getName(),
						":content" => $page->getContent(),
						":id" => $page->getId()
					));
			}catch(Exception $e){
				echo $e->getMessage();
			}
		}

		}
	
 ?>	