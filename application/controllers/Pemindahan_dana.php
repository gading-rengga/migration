<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemindahan_dana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $pemindahan_dana = $this->Blueprint->get_cash_in();

        foreach ($pemindahan_dana as $value) {
            $data = array(
                'ID'        => $value['reff'],
                'payment'   => 1,
                'user'      => $value['user'],
                'post_date' => $value['post_date'],
                'inserted'  => $value['inserted'],
                'status'    => 1,
                'var'       => 'cash_out'
            );

            $this->Blueprint->input_pemindahan_dana($data);
        }
    }
}
