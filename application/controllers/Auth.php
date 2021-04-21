<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * @package : BookingFoodTrucks
 * @created : 9th Apr 2021
 * @Author : Zita Yevloyeva
 * @filename : Auth.php
 */

class Auth extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('recaptcha');
    }

    /* if already logged in, redirect to dashboard, if not, to sign in page. */
    public function index()
    {
        if (is_loggedin()) {
            redirect(site_url('dashboard'), 'refresh');
        }
        $this->load->view('auth/login');
    }

    // Validating a user
    public function validate()
    {
        /**
         * active: 0 wairing for approval
         * active: 1 approved
         * active: 2 suspended
         * active: 3 closed
         */
        if (is_loggedin()) {
            redirect(site_url('dashboard'), 'refresh');
        }
        $email = required(sanitize($this->input->post('email')));
        $password = required($this->input->post('password'));
        // check credential
        $login_credential = $this->auth_model->login_credential($email, $password);
        if ($login_credential) {
            $role_type = $this->user_model->get_role_type_by_role_id($login_credential->role);
            if ($login_credential->active == 1) {
                $sessionData = array(
                    'loggedin_id' => $login_credential->id,
                    'loggedin_userid' => $login_credential->user,
                    'loggedin_role_id' => $login_credential->role,
                    'loggedin_type' => $role_type,
                    'loggedin' => true,
                );
                $this->session->set_userdata($sessionData);
                $this->db->update('login_credential', array('last_login' => date('Y-m-d H:i:s')), array('id' => $login_credential->id));
                $this->auth_model->detect_login_action($login_credential->id);
                // is logged in
                if ($this->session->has_userdata('redirect_url')) {
                    redirect($this->session->userdata('redirect_url'));
                } else {
                    redirect(site_url('dashboard'), 'refresh');
                }
            } else if ($login_credential->active == 2) {
                bft_notification(
                    'Your account has been suspended. Please <a href="#">contact BFT customer support</a>.', 
                    'danger', 
                    'alert-circle-o', 
                    site_url('auth')
                );
            } else if ($login_credential->active == 3) {
                bft_notification(
                    'Your account has been closed. Please <a href="#">contact BFT customer support</a>.', 
                    'block', 
                    'alert-circle-o', 
                    site_url('auth')
                );
            } else {
                bft_notification(
                    'Your account has been in reviewing step. Please wait for approval.', 
                    'warning', 
                    'alert-circle-o', 
                    site_url('auth')
                );
            }
        } else {
            bft_notification(
                'Incorrect username or password.', 
                'danger', 
                'shield-check', 
                site_url('auth')
            );
        }
    }

    /**
     * ROLES FUNCTION SHOW THE ROLES VIEW FOR REGISTRAION
     *
     * @return void
     */
    public function roles()
    {
        if (is_loggedin()) {
            redirect(site_url('dashboard'), 'refresh');
        }
        $this->load->view('auth/roles');
    }


    /**
     * if user alreay logged, redirect to dashboard, but if not, to signin up page
     *
     * @param [type] $role
     * @return void
     */
    public function registration($role)
    {
        if (is_loggedin()) {
            redirect(site_url('dashboard'), 'refresh');
        }
        $page_data['role'] = sanitize($role);
        $this->load->view('auth/registration', $page_data);
    }

    /**
     * FORGET PASSWORD FUNCTION IS RESPONSIBLE FOR RESETTING PASSWORD
     *
     * @return void
     */
    public function forget_password()
    {
        $this->load->view('auth/forget_password');
    }

    /**
     * FORGET PASSWORD FUNCTION IS RESPONSIBLE FOR RESETTING PASSWORD
     *
     * @return void
     */
    public function resetpassword()
    {
        $this->auth_model->reset_password();
    }

    /**
     * Register user
     *
     * @return void
     */
    public function register()
    {
        if (is_loggedin()) {
            redirect(site_url('dashboard'), 'refresh');
        }
        
        $validate_recaptcha = $this->recaptcha->validate_recaptcha_v3();
        if ($validate_recaptcha) {
            $this->auth_model->register();
        } else {
            bft_notification(
                'You have been detected as a bot.', 
                'danger', 
                'shield-check', 
                $_SERVER['HTTP_REFERER']
            );
        }
    }

    /* destroy session */
    public function logout()
    {
        $this->session->unset_userdata('loggedin_id');
        $this->session->unset_userdata('loggedin_userid');
        $this->session->unset_userdata('loggedin_type');
        $this->session->unset_userdata('loggedin');
        $this->session->sess_destroy();
        redirect(site_url('auth'), 'refresh');
    }
}
