<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

function is_logged_in()
{
    $check = get_instance();
    if(!$check->session->userdata('login_id')){
        redirect('auth');
    }
}

function has_logged()
{
    $check = get_instance();
    if(unserialize(get_cookie('autologin'))['id']) $check->session->set_userdata('login_id', unserialize(get_cookie('autologin'))['id']);
    if($check->session->userdata('login_id')){
        redirect('user');
    }
}
