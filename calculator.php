<?php 
	
		
	require_once '../nusoap/lib/class.nusoap_base.php';
	require_once '../nusoap/lib/class.xmlschema.php';
	require_once '../nusoap/lib/class.soap_parser.php';
	// require_once '../nusoap/lib/class.wsdl.php';
	// require_once '../nusoap/lib/class.soap_fault.php';
	
	// require_once '../nusoap/lib/class.soap_server.php';

	spl_autoload_register(function ($class_name) {
		$classe_nusoap = '../nusoap/lib/class.'.$class_name.'.php';
		if(file_exists($classe_nusoap)){
			require_once $classe_nusoap;
		}    	
	});

	$server = new soap_server();

	$server->configureWSDL("CalculatorWSDL", "http://localhost:8000/Servers/calculator.php?wsdl");

	$server->register("Add", 
		['intA'=>'xsd:int', 'intB'=>'xsd:int'],
		['retorno'=>'xsd:int'],
		"http://localhost:8000/", //target
	);

	$server->register("Subtract", 
		['intA'=>'xsd:int', 'intB'=>'xsd:int'],
		['retorno'=>'xsd:int'],
		"http://localhost:8000/", //target
	);
	

	$server->service(file_get_contents("php://input"));


	function Add($intA, $intB){
		return $intA+$intB;
	}
	function Subtract($intA, $intB){
		return $intA-$intB;
	}
?>