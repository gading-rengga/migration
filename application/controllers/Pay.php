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

        foreach ($get_paid as $value) {
            $var = $this->_check_sesuai($value['reff']);

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

    public function _check_sesuai($reff=0){
        $var = 'cash_in';
        $n_ord = $n_purc = $n_inv = 0;

        $order = array(
            '_shipping_price', '_discount', '_resi', '_expedition', '_payment_method'
        );

        $purchase = array(
            '_total', '_no_note', '_project', '_moneyG', '_brand', '_discount'
        );

        $invoice = array(
            '_total','_no_note','_no_faktur','_due_date','_mode_ppn','_ppn'
        );

        $meta = $this->Blueprint->get_meta($reff);
        $check = array_filter($meta);

        if(empty($check)){
            return $var;
        }

        foreach ($meta as $key) {
            if(in_array($key['meta_key'], $order)){
                $n_ord += 1;
            }

            if(in_array($key['meta_key'], $purchase)){
                $n_purc += 1;
            }

            if(in_array($key['meta_key'], $invoice)){
                $n_inv += 1;
            }
        }

        $n_ord /= count($order);
        $n_inv /= count($invoice);
        $n_purc /= count($purchase);

        $nilai = 0;
        if($n_ord>=$n_inv){
            $nilai = $n_ord;
            $var = 'order';
        }else{
            $nilai = $n_inv;
            $var = 'invoice_purchase';
        }

        if($nilai<$n_purc){
            $var = 'purchase';
        }

        // check ID
        $post = $this->Blueprint->get_post($reff);
        $check = array_filter($post);
        if($var=='order' && empty($check)){
            $var = 'non_order';
        }

        return $var;
    }
}
