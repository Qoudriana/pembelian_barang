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

    public function satuan()
    {
        $query = $this->db->get('satuan');
        return $query->result();
    }

    public function jenis()
    {
        $query = $this->db->get('jenis');
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

    public function insert_satuan($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function insert_jenis($data, $table)
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

    public function hapus_satuan($r, $table)
    {
        $this->db->where($r);
        $this->db->delete($table);
    }

    public function hapus_jenis($r, $table)
    {
        $this->db->where($r);
        $this->db->delete($table);
    }
    
    public function hapus_transaksi($r, $table)
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

    public function ubah_satuan($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function ubah_jenis($where, $data, $table)
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

    // Ubah Password
    public function simpan_password()
    {
        $pass = md5($this->input->post('psw_baru'));
        $data = array(
            'password' => $pass
        );
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->update('user', $data);
    }
    // fungsi untuk mengecek password lama :
    public function psw_lama()
    {
        $old = md5($this->input->post('psw_lama'));
        $this->db->where('password', $old);
        $query = $this->db->get('user');
        return $query->result();;
    }
}
