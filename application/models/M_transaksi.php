<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function getData()
    {

        $sql = $this->db->get('laporan_pembelian');
        return $sql->result();
    }

    public function getSum()
    {

        $this->db->select_sum('total');
        $this->db->from('laporan_pembelian');
        return $this->db->get()->row();
    }
}
