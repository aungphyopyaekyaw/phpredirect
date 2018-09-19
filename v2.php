<?php
$server_name = dns_get_record($_SERVER['SERVER_NAME'], DNS_CNAME);

if(!empty($server_name)) {
	foreach($server_name as $s_name) {
		$returnURL = $s_name['target'];
	}
	if(strpos($returnURL, 'kernellab.site')) {
		$server_array = explode('.', $returnURL);
		$server_array = array_reverse($server_array);
		unset($server_array[0]);
		unset($server_array[1]);
		unset($server_array[2]);
		$server_array = array_reverse(array_values($server_array));
		$s = array_search('slash', $server_array);
		$server_array[$s] = '/';
		$server_array[$s - 1] .= $server_array[$s] . $server_array[$s + 1];
		unset($server_array[$s]);
		unset($server_array[$s + 1]);
		$returnURL = 'http://' . implode('.',$server_array);
		header("Location: ".$pageURL);
	} else {
		defaultPage();
	}
} else {
	defaultPage();
}

function defaultPage() {
echo <<<HTML
	<!DOCTYPE html>
	<html lang="en" dir="ltr" class="sid-plesk">
		<p>This is default page.</p>
	</html>
HTML;
}
