<?php

class Shopwindow_Api {
    private $default_form;
    private $pet_forms;
    private $pet_forms_object = [];
    private $url = "https://%s.shopwindow.io/crm/form/submit/declared_form/%s";
    private static $class_instance;

    public function __construct() {
        $this->pet_forms = Theme_Manager::get_instance()->get_theme_option('petkey_api_key');
        $default_form = Theme_Manager::get_instance()->get_theme_option('shopwindow_contact_form');
        $keys = explode('|', trim($default_form));
        $this->default_form = ['account' => $keys[0], 'form_id' => $keys[1]];
        $this->set_keys_object();
    }

    /**
     * Singleton Instance
     *
     * @return Shopwindow_Api
     */
    public static function get_instance(): Shopwindow_Api {
        if (self::$class_instance === null) {
            self::$class_instance = new self();
        }

        return self::$class_instance;
    }

    public function create_pet_form_contact($data) {
        $location = sanitize_title($data['location']);

        $formatted_data = [
            "contact.email" => $data['email'],
            "contact.phone" => $data['phone'],
            "person.firstname" => $data['firstName'],
            "person.lastname" => $data['lastName'],
            "person.contactusmessage" => $data['message'],
            "person.dob" => $data['dob'],
            "person.color" => $data['color'],
            "person.gender" => $data['gender'],
            "person.breed" => $data['breed'],
            "person.refid" => $data['petId'],
            "subscriber.subscribe_person" => $data['requestInfo'] ? "1" : "0",
        ];
        $url = sprintf($this->url, $this->pet_forms_object[$location]['account'], $this->pet_forms_object[$location]['form_id']);


        return $this->curl_request($url, 'POST', $formatted_data);
    }

    public function create_generic_form_contact($data) {
        $formatted_data = [
            "contact.email" => $data['email'],
            "contact.phone" => $data['phone'],
            "person.firstname" => $data['firstName'],
            "person.lastname" => $data['lastName'],
            "person.contactusmessage" => $data['message'],
            "subscriber.subscribe_person" => $data['requestInfo'] ? "1" : "0",
        ];
        $url = sprintf($this->url, $this->default_form['account'], $this->default_form['form_id']);

        return $this->curl_request($url, 'POST', $formatted_data);
    }

    public function create_breed_form_contact($data) {
        $formatted_data = [
            "contact.email" => $data['email'],
            "contact.phone" => $data['phone'],
            "person.firstname" => $data['firstName'],
            "person.lastname" => $data['lastName'],
            "person.contactusmessage" => $data['message'],
            "person.breed" => $data['breed'],
            "subscriber.subscribe_person" => $data['requestInfo'] ? "1" : "0",
        ];
        $url = sprintf($this->url, $this->default_form['account'], $this->default_form['form_id']);

        return $this->curl_request($url, 'POST', $formatted_data);
    }

    /**
     * Prepare the api keys object
     */
    private function set_keys_object() {
        if (is_array($this->pet_forms) || is_object($this->pet_forms)) {
            foreach ($this->pet_forms as $key) {
                $keys = explode('|', trim($key));

                $this->pet_forms_object[sanitize_title($keys[0])] = [
                    'account' => $keys[2],
                    'form_id' => $keys[3]
                ];
            }
        }
    }

    /**
     * @param $api_key
     * @param $endpoint
     * @param $type
     * @param null $data
     *
     * @return array|bool|mixed|object
     */
    public function curl_request($url, $type, $data = null) {

        $curl = curl_init();

        $options = [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $type,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json'
            ]
        ];

        if ($data) {
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