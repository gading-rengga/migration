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
        $get_paid = $this->Blueprint->get_paid();
        $data_meta = array();

        foreach ($get_paid as $value) {
            $var = $this->_check_sesuai($value['reff']);

            if($var=='invoice'){
                continue;
            }

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
        }
    }

    public function _check_sesuai($reff=0){
        $var = 'cash_out';
        $n_ord = $n_inv = 0;

        $order = array(
            '_shipping_price', '_discount', '_resi', '_expedition', '_payment_method'
        );

        $invoice = array(
            '_nominal', '_due_date', '_term_payment', '_detail', '_do_number'
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

            if(in_array($key['meta_key'], $invoice)){
                $n_inv += 1;
            }
        }

        $n_ord /= count($order);
        $n_inv /= count($invoice);

        $var = $n_ord >= $n_inv ? 'order' : 'invoice';
        return $var;
    }
}
