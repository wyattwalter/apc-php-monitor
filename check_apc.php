<?php

if(count($argv) < 2 or $argv[1]=="help"){
	print("usage: php -f apc_stats.php fqdn\n");
	exit;
}

$host = $argv[1];
$url = "http://" . $host . "/apc_stats.php";

$results = file_get_contents($url) or die("server is not responding");

$results = unserialize($results);

$output = "OK| ";
$output = $output . "hit_ratio=" . $results["num_hits"]/($results["num_hits"]+$results["num_misses"]) . "\n";
print($output);
?>
