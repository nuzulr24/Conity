<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Controller_ctl extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        // is_logged_in();
        $mydata['js'][] = '<script src="okok.js"></script>';
        $mydata['js'][] = '<script src="okok1.js"></script>';
        $mydata['js'][] = '<script src="okok2.js"></script>';

        $mydata['kata'] = 'oke lagi sih';

        $mydata['css'][] = '<link rel="stylesheet" href="css.css"/>';
        $mydata['css'][] = '<link rel="stylesheet" href="css.css"/>';
        display(1, 'home', $mydata);

        // delete_cookie('autologin');

        

    }

}
