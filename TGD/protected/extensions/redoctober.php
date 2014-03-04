<?php

class redoctober extends CApplicationComponent
{
	public $url = 'https://localhost:8080';
	public $port = 8080;

	public $username = 'dani';
	public $password = 'dani';

	public $owners = '"user1","user2"';
	public $minimun = 2;

	public $cert = "/Users/dani/Dev/redoctober/cert/server.crt";

	public function init(){

	}

	public function decrypt($text){

		$data = '{"Name":"'.$this->username.'","Password":"'.$this->password.'","Minimum":'.$this->minimun.', "Owners":['.$this->owners.'],"Data":"'.$text.'"}';

		// var_dump(getcwd() . "/client.pem");
		// die;

		$tuCurl = curl_init(); 
		curl_setopt($tuCurl, CURLOPT_URL, $this->url."/decrypt"); 
		curl_setopt($tuCurl, CURLOPT_PORT , $this->port); 
		curl_setopt($tuCurl, CURLOPT_VERBOSE, 0); 
		curl_setopt($tuCurl, CURLOPT_HEADER, 0); 
		curl_setopt($tuCurl, CURLOPT_SSLVERSION, 3); 
		curl_setopt($tuCurl, CURLOPT_CAINFO, $this->cert); 
		curl_setopt($tuCurl, CURLOPT_POST, 1); 
		curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, 1); 
		curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data); 

		$tuData = curl_exec($tuCurl); 
		curl_close($tuCurl); 

		$json = json_decode($tuData);

		if ($json != null){

			if ($json->Status == 'ok')
			{
				$tuData=base64_decode($json->Response);
				return $tuData; 
			}
			else
				return $json->Status;
		}

		return null;
	}

	public function encrypt($text){

		$text=base64_encode($text);

		$data = '{"Name":"'.$this->username.'","Password":"'.$this->password.'","Minimum":'.$this->minimun.', "Owners":['.$this->owners.'],"Data":"'.$text.'"}';

		// var_dump(getcwd() . "/client.pem");
		// die;

		$tuCurl = curl_init(); 
		curl_setopt($tuCurl, CURLOPT_URL, $this->url."/encrypt"); 
		curl_setopt($tuCurl, CURLOPT_PORT , $this->port); 
		curl_setopt($tuCurl, CURLOPT_VERBOSE, 0); 
		curl_setopt($tuCurl, CURLOPT_HEADER, 0); 
		curl_setopt($tuCurl, CURLOPT_SSLVERSION, 3); 
		curl_setopt($tuCurl, CURLOPT_CAINFO, $this->cert); 
		curl_setopt($tuCurl, CURLOPT_POST, 1); 
		curl_setopt($tuCurl, CURLOPT_SSL_VERIFYPEER, 1); 
		curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($tuCurl, CURLOPT_POSTFIELDS, $data); 

		$tuData = curl_exec($tuCurl); 
		// if(!curl_errno($tuCurl)){ 
		//   $info = curl_getinfo($tuCurl); 
		//   echo 'Took ' . $info['total_time'] . ' seconds to send a request to ' . $info['url']; 
		// } else { 
		//   echo 'Curl error: ' . curl_error($tuCurl); 
		// } 
		curl_close($tuCurl); 

		$json = json_decode($tuData);

		if ($json != null){

			if ($json->Status == 'ok')
			{
				return $json->Response; 
			}
			else
				return $json->Status;
		}

		return $tuData; 
	}

}


/*

./redoctober -addr=localhost:8080 -vaultpath=diskrecord.json -cert=cert/server.crt -key=cert/server.pem -static=/Users/dani/Dev/redoctober/index.html

curl --cacert cert/server.crt https://localhost:8080/encrypt  \
        -d '{"Name":"Alice","Password":"Lewis","Minimum":2, "Owners":["Alice","Bill","Cat","Dodo"],"Data":"V2h5IGlzIGEgcmF2ZW4gbGlrZSBhIHdyaXRpbmcgZGVzaz8="}'

./bin/redoctober -addr=localhost:8080 -vaultpath=diskrecord.json -cert=/etc/ssl/certs/thegooddata.org.crt -key=/etc/ssl/private/thegooddata.org.key -static=index.html


*/