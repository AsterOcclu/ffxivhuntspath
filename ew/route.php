<?php
	require_once('../core.php');
	
	$data = getDataEw();
	$request = json_decode(file_get_contents('php://input'),true);
	
	if(empty($request)) {
		http_response_code(400);
		return;
	}

	header('Content-Type: application/json');
	
	$cachedMatrix = getCachedDistancesEw();
	$cachedPaths = getPrecalculatedPaths('ew');
	$response = getBestRoute('ew', $data, $request, $cachedMatrix, $cachedPaths);
	echo $response;