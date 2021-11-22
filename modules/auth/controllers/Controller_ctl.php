<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_ctl extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        
    }

    public function index()
    {
        has_logged();
        $this->form_validation->set_rules('username', 'Username', 'required');
        if ($this->form_validation->run() == false) {
            $mydata['js'][] = '<script src="okok.js"></script>';
            $mydata['js'][] = '<script src="okok1.js"></script>';
            $mydata['js'][] = '<script src="okok2.js"></script>';

            $mydata['kata'] = 'oke lagi sih';

            $mydata['css'][] = '<link rel="stylesheet" href="css.css"/>';
            $mydata['css'][] = '<link rel="stylesheet" href="css.css"/>';

            display(1, 'oke', $mydata);
        } else {
            $this->encryption->initialize(
                array(
                    'cipher' => 'aes-256',
                    'mode' => 'cbc',
                    'key' => $this->encryption->create_key(32)
                )
            );

            $this->encryption->initialize(array('driver' => 'openssl'));
            $plain_text = $this->config->item('prefix_session').$this->input->post('username').rand(111,999);
            $ciphertext = $this->encryption->encrypt($plain_text);

            $cookie = array(
                'id' =>  base64_encode($this->config->item('prefix_session').rand(111,999)),
                'key' => $ciphertext
            );
            $data = @serialize($cookie);
            set_cookie(array('name' => 'autologin', 'value' => $data, 'expire' => 5184000));

            $data = [
                'username' => $this->config->item('prefix_session').$this->input->post('username'),
                'login_id' => $this->config->item('prefix_session').rand(111,999)
            ];

            $this->session->set_userdata($data);
            redirect('user/index');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->unset_userdata('login_id');
        $this->session->unset_userdata('username');
        redirect('auth');
        // echo 'keluar';
        print_r($this->session->userdata());
    }

}
