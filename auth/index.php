<?php
// set CORS and mime type
header('AMP-Access-Control-Allow-Source-Origin: *');
header('Content-type: application/json');

// set default 'access' response
$response = array(
        'access'=>false
);

// check if cookie was set for 'authorized'
$access = isset($_COOKIE['auth']) ? $_COOKIE['auth'] : false;

// if 'authorized', set 'access' in json response to 'true'
if($access) {
        $response = array_merge(
                $response,
                array(
                        'loggedIn'=>true,
						'error'=>false
                )
        );
}

$super = isset($_COOKIE['admin']) ? $_COOKIE['admin'] : false;
if($super) {
        $response = array_merge(
                $response,
                array(
						'admin'=>true
                )
        );
}


// return array for AMP
echo json_encode( $response );