<?php
class Authentication {
	public function Login($code) {
		$url =  BASE_URI.'/oauth/token';
		$data = array('grant_type' => 'authorization_code', 'client_id' => CLIENT_ID, 'client_secret' => CLIENT_SECRET, 'code' => $code, 'redirect_uri' => REDIRECT_URL);
		$result = curl_f($url, $data);
#		print_r($result);
		if($result->token_type == 'bearer') {
			$userME = curl_f('https://api.mercadolibre.com/users/me?access_token='.$result->access_token);
#			print_r($userME);
			if(strstr($userME->nickname, 'ML')) {
				$_SESSION['access_token'] = $result->access_token;
				$_SESSION['refresh_token'] = $result->refresh_token;
				$_SESSION['site_id'] = $userME->site_id;
				$_SESSION['nickname'] = $userME->nickname;
				$_SESSION['email'] = $userME->email;
				header('Location: dash.php?login=1');
				exit;
			} else {
				header('Location: index.php?error=1');
				exit;
			}
		} else {
			header('Location: index.php?error=1');
			exit;
		}
	}
	public function logOut() {

	}
}

function curl_f($url, $data) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
	if($data != '') {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	}
	curl_setopt($ch, CURLOPT_URL, $url);
	$result = curl_exec($ch);
	$result = json_decode($result);
	return $result;
}
?>
