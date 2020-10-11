<?php 

	class Fruit{
		private $fruits;

		public function __construct(){
			$f = file_get_contents("fruits.json");

			$this->fruits = $f;
		}
		public function getPrice($fruit){
			return $this->fruits[$fruit];
		}

		public function getFruits(){
			
			echo "<pre>";
			var_dump($this->fruits);
			echo "</pre>";
			// return $this->fruits;
		}
	}

	$f = new Fruit();
	$f->getFruits();

	// try{
	// 	$server = new SoapServer(null, array(
	// 		'uri' => "http://localhost:8000")
	// 	);

	// 	$server->setClass("Fruit");

	// 	$server->handle();
		
	// }catch(SoapFault $e){
	// 	echo $e->getMessage();
	// }
?>