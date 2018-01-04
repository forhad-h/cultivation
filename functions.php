<?php
require_once('config.php');

function template_url() {
	$mainpath = pathinfo($_SERVER['PHP_SELF'], PATHINFO_DIRNAME);
	$baseFolder = explode('/', $mainpath);
	$template_url = "http://".$_SERVER['HTTP_HOST'].'/'.$baseFolder[1];
	return $template_url;
}

function get_header() {
	require_once('includes/header.php');
}

function get_footer() {
	require_once('includes/footer.php');
}