<?php 
session_start();
require_once  '/Facebook/autoload.php';

$fb = new \Facebook\Facebook([
  'app_id' => '998025843734395',
  'app_secret' => '0696c84c7ac8cbedadd090cb897aff75',
  'default_graph_version' => 'v2.10',
]);

   $permissions = ['user_photos']; // optional
   $helper = $fb->getRedirectLoginHelper();
   $accessToken = $helper->getAccessToken();
   
if (isset($accessToken)) {
	
 		$url = "https://graph.facebook.com/v2.10/me/photos?fields=picture,name&limit=100&type=uploaded&access_token={$accessToken}";
		$headers = array("Content-type: application/json");
		
			 
		 $ch = curl_init();
		 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		 curl_setopt($ch, CURLOPT_URL, $url);
	         curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);  
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  
		 curl_setopt($ch, CURLOPT_COOKIEJAR,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_COOKIEFILE,'cookie.txt');  
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
		 curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3"); 
		 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); 
		   
		 $st=curl_exec($ch); 
		 $result=json_decode($st,TRUE);
		 // echo "<pre>";
		 // var_dump($result);
		 // echo "</pre>";
		 $data = $result['data'];

		 foreach ($data as $item) {
		 	if (isset($item['name'])) {
		 		echo $item['name']."<br>";
		 		echo "<img src=".$item['picture']."><br>";
		 	}else{
		 		echo $item['name']."<br>";
		 	}
		 }

} else {

	$loginUrl = $helper->getLoginUrl('http://ahsdok.net/ATNSTUDIO/', $permissions);
	echo '<a href="' . $loginUrl . '">Login with Facebook</a>';
}
?>