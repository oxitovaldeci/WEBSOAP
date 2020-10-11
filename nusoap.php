<?php 
	
	require_once '../nusoap/lib/class.nusoap_base.php';
	require_once '../nusoap/lib/class.xmlschema.php';
	require_once '../nusoap/lib/class.wsdl.php';
	require_once '../nusoap/lib/class.soap_fault.php';
	require_once '../nusoap/lib/class.soap_parser.php';
	require_once '../nusoap/lib/class.soap_server.php';
	// Model
	require_once '../Model/Book.class.php';
	require_once '../Service/BookControllerPDO.class.php';

	$soapServer = new soap_server();

	// Configurando WSDL

	$soapServer->configureWSDL("BookWSDL", "localhost:8000/Servers/nusoap.php");

	$soapServer->register(
		'BookController.fetchAll', [], ['data'=> 'xsd:string'], 'urn:book', 'urn:book#fetchAll'
	);

	$soapServer->service(file_get_contents("php://input"));
?>