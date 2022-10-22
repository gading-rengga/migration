<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penawaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $project = $this->Blueprint->get_project();
        $invoice = $this->Blueprint->get_invoice();

        $inv = [];
        foreach ($project as $value) {
            foreach ($invoice as $val) {
                $inv = $val;
            }
            $data = array(
                'ID'        => $value['reff'],
                'company'   => $inv['company'],
                'contact'   => $inv['contact'],
                'user'      => $value['user'],
                'post_date' => $value['post_date'],
                'inserted'  => $value['inserted'],
                'status'    => 4,
                'var'       => 'quotation'
            );
            // var_dump($data);
            $this->Blueprint->insert_quotation($data);
        }
    }
}
