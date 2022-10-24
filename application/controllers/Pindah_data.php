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
            $data = array(
                'ID'        => $value['ID'],
                'title'     => $value['title'],
                'company'   => $value['company'],
                'contact'   => $value['contact'],
                'type'      => $value['type'],
                'user'      => $value['user'],
                'payment'   => $value['payment'],
                'post_date' => $value['post_date'],
                'status'    => $value['status'],
                'inserted'  => $value['inserted'],
                'updated'   => $value['updated'],
                'var'       => $value['var'],
                'notes'     => $value['notes'],
                'reff'      => $value['reff'],
                'trash'     => $value['trash']
            );
            $this->Blueprint->insert_pindah_data($data);
        }
    }
}
