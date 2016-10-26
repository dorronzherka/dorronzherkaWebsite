<?php 
	require_once 'PostException.php';
		class Post{
			private $id;
			private $title;
			private $content;
			private $author;
			private $date;


			//Constructor
			// public function __construct($id ,$title,$content,$author,$date) {
			// 	if(empty($id))
			// 		throw new PostException("id is empty");
			// 	if(empty($title))
			// 		throw new PostException("title is empty");
			// 	if(empty($content))
			// 		throw new PostException("content is empty");
			// 	if(empty($author))
			// 		throw new PostException("author is empty");
				

			// 	$this->id = $id;
			// 	$this->title = $title;
			// 	$this->author = $author;
			// 	$this->date = $date;
			// }

			public function __construct($id,$title,$content,$author,$date) {
				if(empty($title))
					throw new PostException("title is empty");
				if(empty($content))
					throw new PostException("content is empty");
				if(empty($author))
					throw new PostException("author is empty");
				
				$this->id = $id;
				$this->title = $title;
				$this->content = $content;
				$this->author = $author;
				$this->date = $date;
			}


			//Getters
			public function getId(){
				return $this->id;
			}

			public function getTitle(){
				return $this->title;
			}

			public function getContent(){
				return $this->content;
			}

			public function getAuthor(){
				return $this->author;
			}

			public function getDate(){
				return $this->date;
			}

			//setters
			public function setTitle($title){
				if(empty($title))
					throw new PostException("title is empty");

				$this->title = $title;
			}

			public function setContent($content){
				if(empty($content))
					throw new PostException("content is empty");

				$this->content = $content;
			}

			public function setAuthor($author){
				if(empty($author))
					throw new PostException("author is empty");

				$this->author = $author;
			}


			public function setDate($date){
				if(empty($date))
					throw new PostException("date is empty");

				$this->date = $date;
			}

			public function __toString(){
				return "<div id='blog-post' class='col-xs-12'><h4>".$this->title."</h4><p>".$this->content."</p><span id='date'<p>".$this->date."</p></span><span id='author'><p>".$this->author."</p></span></div>";
			}

		}

 ?>