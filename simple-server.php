<?php 

	class Calculator{

		public function Add($a, $b){
			return $a+$b;
		}
		public function Subtract($a, $b){
			return $a-$b;
		}

		public function Multiply($a, $b){
			return $a*$b;
		}
		public function Divide($a, $b){
			return intdiv($a, $b);
		}
	}
	
	try{
		$server = new SoapServer(null, array(
			'uri' => "http://localhost:8000")
		);

		$server->setClass("Calculator");

		$server->handle();
		
	}catch(SoapFault $e){
		echo $e->getMessage();
	}
	

?>