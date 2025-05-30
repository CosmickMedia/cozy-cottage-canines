<?php

class K9_Genetics_Api {

	private static $class_instance;
	private $api_url;

	public function __construct() {
		$this->api_url = Theme_Manager::get_instance()->get_theme_option('k9_api_url');
	}

	/**
	 * @return K9_Genetics_Api
	 */
	public static function get_instance() {
		if (self::$class_instance === null) {
			self::$class_instance = new self();
		}

		return self::$class_instance;
	}

	public function get_breed_list() {
		return $this->curl_request('breeds');
	}

	public function curl_request($endpoint, $type = 'GET', $data = null) {

		$curl = curl_init();
		$url = "{$this->api_url}/$endpoint";

		$options = [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_CUSTOMREQUEST=> $type,
			CURLOPT_HTTPHEADER => [
				'Content-Type: application/json'
			]
		];

		if($data) {
			$options[CURLOPT_POSTFIELDS] = json_encode($data);
		}

		curl_setopt_array($curl, $options);

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return false;
		} else {
			return json_decode($response);
		}

	}

}
