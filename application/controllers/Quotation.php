<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotation extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $quotation = array(
            '_shipping_price', '_discount', '_estimate', '_payment_method', '_note', '_description', '_ppn', '_ppn_status', '_type_discount', '_currency', '_no_faktur'
        );

        $meta = $this->Blueprint->get_meta_quo();


        foreach ($meta as $key) {
            if (in_array($key['meta_key'], $quotation)) {
                $data = array(
                    'title' => $key['meta_id'],
                    'var'   => 'quotation',
                    'status' => 1
                );
                // $this->Blueprint->insert_quo($data);
            }
        }
    }
}
