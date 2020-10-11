<?php 
	
	require_once '../Service/BookController.class.php';


	require_once '../nusoap/lib/class.nusoap_base.php';
	require_once '../nusoap/lib/class.xmlschema.php';
	require_once '../nusoap/lib/class.soap_parser.php';
	require_once '../nusoap/lib/class.wsdl.php';
	require_once '../nusoap/lib/class.soap_fault.php';
	
	require_once '../nusoap/lib/class.soap_server.php';

	
	$server = new soap_server();

	$server->configureWSDL("BookWSDL", "http://localhost:8000/Servers/book.php");

	// Objeto book
	$server->wsdl->addComplexType('book','complexType','struct','all','',[
		'name' => ['name' => 'name','type' => 'xsd:string'],
		'year' => ['name' => 'year','type' => 'xsd:int'],
	]);

	$server->register('BookController..listAll', [], ['books'=>'xsd:string']);
	$server->register('BookController..save', ['book'=>'tns:book'], ['salvou'=>'xsd:int']);

	$server->service(file_get_contents("php://input"));

?>