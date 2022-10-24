<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pindah_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $get_post = $this->Blueprint->get_post_in();
        foreach ($get_post as $value) {
            $this->Blueprint->insert_pindah_data($value);
        }
    }
}
