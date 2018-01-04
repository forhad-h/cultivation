<?php
require_once('config.php');

$path = pathinfo(__FILE__, PATHINFO_DIRNAME);
$path = str_replace('\\', '/', $path);

$table = str_replace('/', '_', $_GET['date']);

$out_path_ai = "$path/csv/all-investment/$table"."-".rand(1, 1000).".csv";
$out_path_ti = "$path/csv/total-investment/$table"."-".rand(1, 1000).".csv";

if(!empty($_GET)) {
    $select_ai = "SELECT * INTO OUTFILE '{$out_path_ai}' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' FROM $table";
	
	$select_ti = "SELECT * INTO OUTFILE '{$out_path_ti}' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' FROM $table";
	
	mysqli_query($coni, $select_ai) or die('Operation failed. Please try again.');
	mysqli_query($conti, $select_ti) or die('Operation failed. Please try again.');
	
	header('Location: index.php');
}