<?php

$server_name = $_SERVER['SERVER_NAME'];
$server_port = $_SERVER['SERVER_PORT'];
$server_name = dns_get_record($server_name, DNS_ANY);
if(isset($server_name[1])) {
  header("Location: http://www.".$_SERVER['SERVER_NAME']);
  die();
}

foreach($server_name as $s_name) {
	$returnURL = $s_name['target'];
}

$pageURL = 'http';
($server_port === 443) ? $pageURL .= 's' : '';
$pageURL .= '://';

$server_array = explode('.', $returnURL);
$server_array = array_reverse($server_array);

unset($server_array[0]);
unset($server_array[1]);
unset($server_array[2]);

$server_array = array_values($server_array);
$server_array = array_reverse($server_array);

$pageURL .= implode('.',$server_array);

header("Location: ".$pageURL);
die();
