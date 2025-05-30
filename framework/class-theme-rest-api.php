<?php

class Theme_Rest_Api {

	public function __construct() {
		add_action('rest_api_init', [$this, 'get_endpoints']);
		add_action('rest_api_init', [$this, 'post_endpoints']);
		add_action('rest_api_init', [$this, 'put_endpoints']);
	}

	public function get_endpoints() {

		register_rest_route('petland/v1', '/available-puppies', [
			'methods' => 'GET',
			'callback' => [$this, 'get_available_puppies'],
            'permission_callback' => '__return_true',
		]);

        register_rest_route('petland/v1', '/k9-breeds', [
            'methods' => 'GET',
            'callback' => [$this, 'get_k9_breeds'],
            'permission_callback' => '__return_true',
        ]);

		register_rest_route('petland/v1', '/financing-content', [
			'methods' => 'GET',
			'callback' => [$this, 'get_financing_content'],
            'permission_callback' => '__return_true',
		]);

		register_rest_route('petland/v1', '/pet/(?P<pet_id>\d+)/(?P<pet_location>[a-zA-Z0-9-]+)', [
			'methods' => 'GET',
			'callback' => [$this, 'get_pet_details'],
            'permission_callback' => '__return_true',
		]);
	}

	public function post_endpoints() {
		register_rest_route('petland/v1', '/request-pet-information', [
			'methods' => 'POST',
			'callback' => [$this, 'request_pet_information'],
            'permission_callback' => '__return_true',
		]);

		register_rest_route('petland/v1', '/request-breed-information', [
			'methods' => 'POST',
			'callback' => [$this, 'request_breed_information'],
            'permission_callback' => '__return_true',
		]);

		register_rest_route('petland/v1', '/request-contact-information', [
			'methods' => 'POST',
			'callback' => [$this, 'request_contact_information'],
            'permission_callback' => '__return_true',
		]);

        register_rest_route('petland/v1', '/request-careers-information', [
            'methods' => 'POST',
            'callback' => [$this, 'request_careers_information'],
            'permission_callback' => '__return_true',
        ]);
	}

	public function put_endpoints() {}

	public function get_available_puppies() {
		return [
			'puppies' => Petkey_Api::get_instance()->get_pet_inventory(),
			'breeds' => Petkey_Api::get_instance()->get_breed_list(),
		];
	}

	public function get_pet_details($data) {
		return Petkey_Api::get_instance()->get_pet_details($data['pet_id'], $data['pet_location']);
	}

	public function get_financing_content() {
		return [
			'html' => Theme_Manager::get_instance()->get_finance_content()
		];
	}

	/**
	 * Create or update Lead in Zoho.
	 *
	 * @param WP_REST_Request $request
	 */
	public function request_contact_information(WP_REST_Request $request) {
		$params = $request->get_json_params();

        $use_shopwindow = Theme_Manager::get_instance()->get_theme_option('shopwindow_use');

        if ($use_shopwindow == 'true') {
            $response = Shopwindow_Api::get_instance()->create_generic_form_contact($params);
            wp_send_json_success($response);
            return;
        }

		$data = [
			'First_Name' => $params['firstName'],
			'Last_Name' => $params['lastName'],
			'Email' => $params['email'],
			'Mobile' => $params['phone'],
			'Description' => $params['message'],
		];

		$records_by_phone = $this->get_zoho_lead_by_phone($params['phone']);

		$response = null;

		$any_record_updated = false;
		if ($records_by_phone) {
			foreach ($records_by_phone as $record) {

				if (!$this->check_if_record_has_special_order_tag($record)) {
					$response = $this->update_zoho_lead($data, $record->getEntityId());
					$any_record_updated = true;
				}

			}

		} else {
			$response = $this->create_zoho_lead($data);
			$any_record_updated = true;
		}

		if (!$any_record_updated) {
			$response = $this->create_zoho_lead($data);
		}

        wp_send_json_success($response);
	}

    /**
     * Create or update Lead in Zoho.
     */
    public function request_careers_information($request) {

        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $params = $_POST;
        $prefix = 'careersInfo_';
        $data = [
            'First Name' => $params["{$prefix}firstName"],
            'Last Name' => $params["{$prefix}lastName"],
            'Phone Number' => $params["{$prefix}phone"],
            'Email' => $params["{$prefix}email"],
            'Address' => $params["{$prefix}address"],
            'City' => $params["{$prefix}city"],
            'State' => $params["{$prefix}state"],
            'Zip' => $params["{$prefix}zip"],
            'Position' => $params["{$prefix}position"],
        ];

        $attachments = null;
        if($_FILES['careersInfo_resume']) {
            if($_FILES['careersInfo_resume']['error'] === UPLOAD_ERR_OK) {
                $attachment_id = media_handle_upload('careersInfo_resume', 0);
                $attachments[] = get_attached_file($attachment_id);
            }

        }

        $to = Theme_Manager::get_instance()->get_theme_option('employment_form_receipts');
        $subject = Theme_Manager::get_instance()->get_theme_option('employment_form_subject');

        $message = '';

        foreach($data as $key => $field) {
            $message.= "{$key}: $field\n";
        }

        if (wp_mail($to, $subject, $message, null, $attachments)) {
            wp_send_json_success();
        } else {
            wp_send_json_error();
        }
    }


    /**
	 * Create or update Lead in Zoho.
	 *
	 * @param WP_REST_Request $request
	 */
	public function request_breed_information(WP_REST_Request $request) {
		$params = $request->get_json_params();

        $use_shopwindow = Theme_Manager::get_instance()->get_theme_option('shopwindow_use');

        if ($use_shopwindow == 'true') {
            $response = Shopwindow_Api::get_instance()->create_breed_form_contact($params);
            wp_send_json_success($response);
            return;
        }

		$data = [
			'First_Name' => $params['firstName'],
			'Last_Name' => $params['lastName'],
			'Email' => $params['email'],
			'Mobile' => $params['phone'],
			'Description' => $params['message'],
			'Special_Order_Breed' => $params['breed'],
			'Breed_URL' => $params['breedUrl'],
		];

		$records_by_phone = $this->get_zoho_lead_by_phone($params['phone']);

		$response = null;

		$any_record_updated = false;
		if ($records_by_phone) {

			foreach ($records_by_phone as $record) {

				if ($this->check_if_record_has_special_order_tag($record)) {
					$response = $this->update_zoho_lead($data, $record->getEntityId());
					$any_record_updated = true;
				}

			}

		} else {
			$response = $this->create_zoho_lead($data);
			$any_record_updated = true;
		}

		if (!$any_record_updated) {
			$response = $this->create_zoho_lead($data);
		}

		wp_send_json_success($response);
	}

	/**
	 * Create or update Lead in Zoho.
	 *
	 * @param WP_REST_Request $request
	 */
	public function request_pet_information(WP_REST_Request $request) {
		$params = $request->get_json_params();

        $use_shopwindow = Theme_Manager::get_instance()->get_theme_option('shopwindow_use');

        if ($use_shopwindow == 'true') {
            $response = Shopwindow_Api::get_instance()->create_pet_form_contact($params);
            wp_send_json_success($response);
            return;
        }

		$data = [
			'First_Name' => $params['firstName'],
			'Last_Name' => $params['lastName'],
			'Email' => $params['email'],
			'Mobile' => $params['phone'],
			'Description' => $params['message'],
			'Location' => $params['location'],
			'Puppy_ID' => $params['petId'],
			'Puppy_URL' => $params['petUrl'],
			'Breed' => $params['breed'],
			'Gender' => $params['gender'],
			'Color' => $params['color'],
			'DOB' => $params['dob'],
		];

		$records_by_phone = $this->get_zoho_lead_by_phone($params['phone']);

		$response = null;

		$any_record_updated = false;
		if ($records_by_phone) {

			foreach ($records_by_phone as $record) {

				if (!$this->check_if_record_has_special_order_tag($record)) {
					$response = $this->update_zoho_lead($data, $record->getEntityId());
					$any_record_updated = true;
				}

			}

		} else {
			$response = $this->create_zoho_lead($data);
			$any_record_updated = true;
		}

		if (!$any_record_updated) {
			$response = $this->create_zoho_lead($data);
		}

		wp_send_json_success($response);
	}

	/**
	 * @param $phone
	 *
	 * @return ZCRMRecord[] | boolean
	 */
	private function get_zoho_lead_by_phone($phone) {
		try {
			ZCRMRestClient::initialize();
			$phone_number = preg_replace('/\D/', '', $phone);
			$lead = ZCRMRestClient::getInstance()->getModuleInstance('Leads')->searchRecordsByPhone($phone_number);

			return $lead->getData();
		} catch (ZCRMException $e) {
			return false;
		}
	}

	/**
	 * @param $record ZCRMRecord
	 * @return bool
	 */
	private function check_if_record_has_special_order_tag($record) {
		$tags = $record->getFieldValue('Tag');

		foreach ($tags as $tag) {
			if ($tag['name'] == 'Special Order') {
				return true;
			}
		}

		return false;

	}

	/**
	 * Insert lead on Zoho CRM.
	 *
	 * @param $data[]
	 * @return bool|BulkAPIResponse|Exception|ZCRMException
	 */
	private function create_zoho_lead($data) {
		try {
			ZCRMRestClient::initialize();

			$record = ZCRMRecord::getInstance('Leads', null);
			foreach ($data as $key => $value) {
				$record->setFieldValue($key, $value);
			}
			return ZCRMRestClient::getInstance()->getModuleInstance('Leads')->createRecords([$record]);

		} catch (ZCRMException $e) {
			return false;
		}

	}

	/**
	 * Update lead on Zoho CRM.
	 *
	 * @param $data
	 * @param $entityId
	 *
	 * @return BulkAPIResponse | boolean
	 */
	private function update_zoho_lead($data, $entityId) {

		try {
			ZCRMRestClient::initialize();

			$record = ZCRMRecord::getInstance('Leads', $entityId);
			foreach ($data as $key => $value) {
				$record->setFieldValue($key, $value);
			}

			return ZCRMRestClient::getInstance()->getModuleInstance('Leads')->updateRecords([$record]);
		} catch (ZCRMException $e) {
			return false;
		}
	}

}