<?php
session_start();
	require_once 'Facebook/autoload.php';
	$fb = new \Facebook\Facebook([
  'app_id' => '998025843734395',
  'app_secret' => '0696c84c7ac8cbedadd090cb897aff75',
  'default_graph_version' => 'v2.10',
  //default_access_token' => '{access-token}', // optional
]);
	$helper = $fb->getRedirectLoginHelper();
?>