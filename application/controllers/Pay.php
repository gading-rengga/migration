<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pay extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Blueprint');
    }

    public function index()
    {
        $get_paid = $this->Blueprint->get_paid_pay();
        $order = array(
            '_shipping_price', '_discount', '_resi', '_expedition', '_payment_method'
        );

        $purchase = array(
            '_total', '_no_note', '_project', '_moneyG', '_brand', '_discount'
        );

        $cash_in = array(
            ''
        );

        // Invoice_order tidak ada dalam sobad_post
        // $invoice_purchase = array(
        //     ''
        // );

        foreach ($get_paid as $value) {
            $meta = $this->Blueprint->get_meta($value['reff']);
            foreach ($meta as $val) {
                if (in_array($val['meta_key'], $order)) {
                    $var = 'order';
                    // var_dump($val);
                } elseif (in_array($val['meta_key'], $purchase)) {
                    $var = 'purchase';
                    // var_dump($val);
                } elseif (in_array($val['meta_key'], $cash_in)) {
                    $var = 'cash_in';
                    // var_dump($val);
                } elseif (!in_array($val['meta_key'], $order) && $val['ID'] == '') {
                    $var = 'non_order';
                    // var_dump($val);
                }
            }
            $data = array(
                'ID'        => $value['reff'],
                'post_date' => $value['post_date'],
                'inserted'  => $value['inserted'],
                'status'    => 1,
                'var'       => $var,
                'type'      => $var == 'cash_in' ? 2 : 0,
                'trash'     => $value['trash']
            );
            $this->Blueprint->insert_pay($data);
        }
    }
}
