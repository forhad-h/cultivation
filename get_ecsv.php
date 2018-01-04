<?php
require_once('config.php');

$path = pathinfo(__FILE__, PATHINFO_DIRNAME);
$path = str_replace('\\', '/', $path);

$table = str_replace('/', '_', $_GET['date']);

$out_path_ae = "$path/csv/all-expenditure/$table"."-".rand(1, 1000).".csv";
$out_path_te = "$path/csv/total-expenditure/$table"."-".rand(1, 1000).".csv";

if(!empty($_GET)) {
	
	$select_ae = "SELECT * INTO OUTFILE '{$out_path_ae}' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' FROM $table";
	
	$select_te = "SELECT * INTO OUTFILE '{$out_path_te}' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' FROM $table";
	
	mysqli_query($cone, $select_ae) or die('Operation failed. Please try again.');
	mysqli_query($conte, $select_te) or die('Operation failed. Please try again.');
	
	header('Location: index.php');
}