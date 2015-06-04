<?php
function show_site_name() {
	return 'OHL Delivery Invoicing';
}

function show_page_name(){
	$currentFile = $_SERVER["PHP_SELF"];
	$parts = explode('/', $currentFile);
	$currentFile = $parts[count($parts) - 1];
	$parts = explode('.',$currentFile);
	if($parts[0]=='index'){
		$parts[0] = 'home';
		return strtoupper($parts[0]);
	} else {
		return strtoupper($parts[0]);
	}
}
?>