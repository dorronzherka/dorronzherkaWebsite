<?php 
	require_once 'PageException.php';
	class Page{
		private $page_name;
		private $page_content;
		private $page_id;

		public function __construct($page_name,$page_content,$page_id){
			if(empty($page_name))
				throw new PageException("Name of page is empty");
			if(empty($page_content))
				throw new PageException("Content page is empty");

			$this->page_name = $page_name;
			$this->page_content = $page_content;
			$this->page_id = $page_id;
		}

		public function getName(){
			return $this->page_name;
		}

		public function getContent(){
			return $this->page_content;
		}

		public function getId(){
			return $this->page_id;
		}

		public function __toString(){
			return "<p>".$this->page_content."</p>";
		}
	}
	
 ?>