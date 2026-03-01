<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Generate extends CI_Controller {

    public function index()
    {
        $this->load->library('encryption');
        echo $this->encryption->encrypt('ahmedi123');
    }
}