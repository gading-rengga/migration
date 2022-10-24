<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blueprint extends CI_Model
{
    // =================Global Script=================
    public function get_post($id = 0)
    {
        $this->db->select('ID');
        $this->db->where('ID', $id);
        $this->db->from('sdn-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_meta($id = 0)
    {
        $this->db->select('*');
        $this->db->where('meta_id', $id);
        $this->db->from('sdn-post-meta');
        $query = $this->db->get();
        return $query->result_array();
    }

    // ==============Pindah Data===============
    public function get_post_in()
    {
        $sql = "SELECT * FROM `sdn-post` WHERE var IN (SELECT var FROM `sdn-post` WHERE reff = 0 GROUP BY var)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function insert_pindah_data($data)
    {
        $db2 = $this->load->database('migration', TRUE);
        $db2->where('ID', $data['ID']);
        $query = $db2->get('sdn-post');

        if ($query->num_rows() > 0) {
            print 'Data Sudah Ada : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
        } else {
            print 'Data Berhasil diInsert : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
            $db2->insert('sdn-post', $data);
        }
    }

    // ==============Pemindahan Dana===============
    public function get_cash_in()
    {
        $this->db->select('*');
        $this->db->where('var', 'cash_in');
        $this->db->where('reff !=', '0');
        $this->db->from('sdn-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function input_pemindahan_dana($data)
    {
        $db2 = $this->load->database('migration', TRUE);
        $db2->where('ID', $data['ID']);
        $query = $db2->get('sdn-post');
        if ($query->num_rows() > 0) {
            print 'Data Sudah Ada : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
        } else {
            print 'Data Berhasil diInsert : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
            $db2->insert('sdn-post', $data);
        }
    }


    // ===============PAID====================
    public function get_paid()
    {
        $this->db->select('*');
        $this->db->where('var', 'paid');
        $this->db->from('sdn-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function input_paid($data)
    {
        $db2 = $this->load->database('migration', TRUE);
        $db2->where('ID', $data['ID']);
        $query = $db2->get('sdn-post');
        if ($query->num_rows() > 0) {
            print 'Data Sudah Ada : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
        } else {
            print 'Data Berhasil diInsert : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
            $db2->insert('sdn-post', $data);
        }
    }


    //=================PAY=====================
    public function get_paid_pay()
    {
        $this->db->select('*');
        $this->db->where('var', 'paid');
        $this->db->from('sdn-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_pay($data)
    {
        $db2 = $this->load->database('migration', TRUE);
        $db2->where('ID', $data['ID']);
        $query = $db2->get('sdn-post');
        if ($query->num_rows() > 0) {
            print 'Data Sudah Ada : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
        } else {
            print 'Data Berhasil diInsert : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
            $db2->insert('sdn-post', $data);
        }
    }

    // ================Penawaran================
    public function get_project()
    {
        $this->db->select('*');
        $this->db->where('var', 'project');
        $this->db->from('sdn-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_invoice()
    {
        $this->db->select('*');
        $this->db->where('var', 'invoice');
        $this->db->from('sdn-post');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function insert_quotation($data)
    {
        $db2 = $this->load->database('migration', TRUE);
        $db2->where('ID', $data['ID']);
        $query = $db2->get('sdn-post');
        if ($query->num_rows() > 0) {
            print 'Data Sudah Ada : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
        } else {
            print 'Data Berhasil diInsert : <br>' . "ID = " . $data['ID'] . "<br>" . "Var = " . $data['var']  . '<br>' . '<br>';
            $db2->insert('sdn-post', $data);
        }
    }


    // ================DB backup================
    public function get_db2()
    {
        $db2 = $this->load->database('migration', TRUE);
        $db2->select('*');
        $this->db->where('var', 'cash_in');
        $db2->from('sdn-post');
        $query = $db2->get();
        return $query->result_array();
    }
}
