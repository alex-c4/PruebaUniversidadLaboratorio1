<?php
 	
	 require_once 'config.php';


	try{
		$accessToken = $helper->getAccessToken();

	} catch (\Facebook\Exceptions\FacebookResponseException $e){
		echo "Response Exception: " . $e->getMessage();
		exit();

	} catch (\Facebook\Exceptions\FacebookSDKException $e){
		echo "SDK Exception: " . $e->getMessage();
		exit();

	}

	if(!$accessToken){
		//header(string: 'Location: loging.php');
		header('Location: loging.php');
		exit();
	}

	$oAuth2Client = $FB->getOAuth2Client();
	if (!$accessToken->isLongLived())
		$accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);


	//$response = $FB->get( endpoint:"/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
	$response = $FB->get("/me?fields=id, first_name, last_name, email, picture.type(large)", $accessToken);
	$userData = $response->getGraphNode()->asArray();
	
	echo "<pre>";
	var_dump($userData);
	
	$_SESSION['userData'] = $userData;
	$_SESSION['accessToken'] = (string) $accessToken;
	//header(string: 'Location: index.php');
	//header('Location: /registerFB');
	//route('/registerFB');
	//url('/registerFB');
	header('Location: http://localhost/xportgold/PruebaUniversidadLaboratorio1/public/registerFB');
	
	exit();
	

?>