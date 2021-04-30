<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_admin extends CI_Model
{
    //GET DATA
    public function supplier()
    {
        $query = $this->db->get('supplier');
        return $query->result();
    }

    public function barang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function user()
    {
        $query = $this->db->get('user');
        return $query->result();
    }
    // END GET DATA


    // INSERT DATA
    public function insert_supplier($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert_barang($data, $table)
    {
        $this->db->insert($table, $data);
    }
    // END INSERT DATA


    // DELETE DATA
    public function hapus_supplier($r, $table)
    {
        $this->db->where($r);
        $this->db->delete($table);
    }

    public function hapus_barang($r, $table)
    {
        $this->db->where($r);
        $this->db->delete($table);
    }

    public function hapus_user($r, $table)
    {
        $this->db->where($r);
        $this->db->delete($table);
    }
    // END DELETE DATA



    //GET EDIT DATA
    public function edit_supplier($i, $table)
    {
        return $this->db->get_where($table, $i);
    }

    public function edit_barang($i, $table)
    {
        return $this->db->get_where($table, $i);
    }

    public function edit_user($i, $table)
    {
        return $this->db->get_where($table, $i);
    }
    // END GET EDIT DATA



    // EDIT DATA
    public function ubah_supplier($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ubah_user($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ubah_barang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // END EDIT DATA

    // AKTIVASI USER
    public function get($table, $data = [], $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }
    // END AKTIVASI USER

    // JUMLAH DATA
    public function jumlah_supplier()
    {
        $query = $this->db->get('supplier');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jumlah_barang()
    {
        $query = $this->db->get('barang');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function jumlah_user()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
