<?php 

	class Book{
		private $books;

		public function __construct(){
			$f = file_get_contents("books.json");

			$this->books = $f;
		}
		
		public function getBooks(){			
			return $this->books;
		}
	}

	
	try{
		$server = new SoapServer(null, array(
			'uri' => "http://localhost:8000")
		);

		$server->setClass("Book");

		$server->handle();
		
	}catch(SoapFault $e){
		echo $e->getMessage();
	}
?>