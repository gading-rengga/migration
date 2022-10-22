<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paid extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $order = array(
            '_shipping_price', '_discount', '_resi', '_expedition', '_payment_method'
        );

        $invoice = array(
            '_nominal', '_due_date', '_term_payment', '_detail', '_do_number'
        );

        $cash_out = array(
            ''
        );

        $get_paid = $this->Blueprint->get_paid();
        $data_meta = array();

        foreach ($get_paid as $value) {

            $meta = $this->Blueprint->get_meta($value['reff']);
            foreach ($meta as $key) {
                if (in_array($key['meta_key'], $order)) {
                    $var = 'order';
                } else if (in_array($key['meta_key'], $invoice)) {
                    $var = 'invoice';
                } else if (in_array($key['meta_key'], $cash_out)) {
                    $var = 'cash_out';
                } elseif (!in_array($key['meta_key'], $order) && !in_array($key['meta_key'], $invoice) && !in_array($key['meta_key'], $cash_out)) {
                    $var = 'undefined';
                }
                $data_meta = $key;
            }

            // var_dump($value);
            if ($var !== 'undefined') {
                $data = array(
                    'ID'        => $value['reff'],
                    'post_date' => $value['post_date'],
                    'inserted'  => $value['inserted'],
                    'status'    => 1,
                    'var'       => $var,
                    'type'      => $var == 'cash_out' ? 1 : 0,
                    'trash'     => $value['trash']
                );
                // var_dump($data);
                $this->Blueprint->input_paid($data);
            } else {
                print 'Data Tidak dalam Kategory Kesesuaian : <br>' . "ID = " . $data_meta['ID'] . '<br>' . "meta_id = " . $data_meta['meta_id'] . '<br>' . "meta_key = " . $data_meta['meta_key']  . '<br>' . '<br>';
            }
        }
    }
}
