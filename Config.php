<?php

$hostName = 'localhost';
$idbName = 'investment';
$tidbName = 'total_investment';
$edbName = 'expenditure';
$tedbName = 'total_expenditure';
$userName = 'root';
$password = '';

$coni = mysqli_connect($hostName, $userName, $password, $idbName) or die('connection error');

$conti = mysqli_connect($hostName, $userName, $password, $tidbName) or die('connection error');

$cone = mysqli_connect($hostName, $userName, $password, $edbName) or die('connection error');
$conte = mysqli_connect($hostName, $userName, $password, $tedbName) or die('connection error');