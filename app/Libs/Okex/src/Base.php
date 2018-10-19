<?php
namespace App\Libs\Okex\src;

class Base {
	const API_BASE = '/api/v1/';
	
//	const WEB_BASE = 'https://www.okcoin.com/';//OKCoin国际站
	const WEB_BASE = 'https://www.okex.me/';//OKCoin中国站
	
	private $_rpc;
	private $_authentication;

	// This constructor is deprecated.
	public function __construct($authentication, $tokens = null, $apiKeySecret = null) {

        if (!function_exists('curl_init')) {
            throw new Exception('The OKCoin client library requires the CURL PHP extension.');
        }
		// First off, check for a legit authentication class type
		if ($authentication instanceof Authentication) {
			$this -> _authentication = $authentication;
		} else {
			// Here, $authentication was not a valid authentication object, so
			// analyze the constructor parameters and return the correct object.
			// This should be considered deprecated, but it's here for backward compatibility.
			// In older versions of this library, the first parameter of this constructor
			// can be either an API key string or an OAuth object.
			if ($tokens !== null) {
				$this -> _authentication = new OKCoin_OAuthAuthentication($authentication, $tokens);
			} else if ($authentication !== null && is_string($authentication)) {
				$apiKey = $authentication;
				if ($apiKeySecret === null) {
					// Simple API key
					$this -> _authentication = new SimpleApiKeyAuthentication($apiKey);
				} else {
					$this -> _authentication = new ApiKeyAuthentication($apiKey, $apiKeySecret);
				}
			} else {
				throw new OKCoinException('Could not determine API authentication scheme');
			}
		}
//        exit('111');
		$this -> _rpc = new Rpc(new Requestor(), $this -> _authentication);
	}

	// Used for unit testing only
	public function setRequestor($requestor) {
		$this -> _rpc = new Rpc($requestor, $this -> _authentication);
		return $this;
	}

	public function get($path, $params = array()) {
		return $this -> _rpc -> request("GET", $path, $params);
	}

	public function post($path, $params = array()) {
		return $this -> _rpc -> request("POST", $path, $params);
	}

	public function delete($path, $params = array()) {
		return $this -> _rpc -> request("DELETE", $path, $params);
	}

	public function put($path, $params = array()) {
		return $this -> _rpc -> request("PUT", $path, $params);
	}

}
