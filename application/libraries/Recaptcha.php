<?php (! defined('BASEPATH')) and exit('No direct script access allowed');

/**
 * @product gRecaptcha Library
 * @package CodeIgniter
 * @author Zita Yevloyeva
 */

 class Recaptcha
 {
     /**
      * ci instance object
      *
      */
    private $_ci;

    /**
     * reCAPTCHA site up, verify and api url.
     */
    const sign_up_url = 'https://www.google.com/recaptcha/admin';
    const site_verify_url = 'https://www.google.com/recaptcha/api/siteverify';
    const api_url = 'https://www.google.com/recaptcha/api.js';

    /**
     * constructor
     * 
     * @param string $config
     */
    public function __construct()
    {
        $this->_ci = & get_instance();

        $this->_ci->db->where('key', 'recaptcha_v2_secretkey');
        $this->_recaptcha_v2_secretkey = $this->_ci->db->get('system_settings')->row('value');

        $this->_ci->db->where('key', 'recaptcha_v3_secretkey');
        $this->_recaptcha_v3_secretkey = $this->_ci->db->get('system_settings')->row('value');
    }

    /**
     * Validate recaptcha V2 function is responsible for validating the recaptcha
     *
     * @return boolean
     */
    public function validate_recaptcha_v2()
    {
        $recaptcha = trim($this->_ci->input->post('g-recaptcha-response'));
        $userIp = $this->_ci->input->ip_address();
        $secret = $this->_recaptcha_v2_secretkey;
        $data = array(
            'secret' => "$secret",
            'response' => "$recaptcha",
            'remoteip' => "$userIp"
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, self::site_verify_url);
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $status = json_decode($response, true);
        
        if ($status['success']) {
            return true;
        } else {
            return false;
        }
    }

    public function validate_recaptcha_v3()
    {
        $recaptcha = trim($this->_ci->input->post('g-recaptcha-response'));
        $userIp = $this->_ci->input->ip_address();
        $secret = $this->_recaptcha_v3_secretkey;
        $data = array(
            'secret' => "$secret",
            'response' => "$recaptcha",
            'remoteip' => "$userIp"
        );

        $verify = curl_init();
        curl_setopt($verify, CURLOPT_URL, self::site_verify_url);
        curl_setopt($verify, CURLOPT_POST, true);
        curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($verify, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($verify);
        $status = json_decode($response, true);
        
        if ($status['success'] && $status['score'] >= 0.5) {
            return true;
        } else {
            return false;
        }
    }
 }