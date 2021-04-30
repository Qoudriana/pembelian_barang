<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    public function getTgl($tglawal)
    {
        $sql = "select * from laporan_pembelian where tanggal='$tglawal'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function laporan()
    {
        $sql = "SELECT header.no_pembelian,header.tgl,supplier.supplier FROM header INNER JOIN supplier ON supplier.id_supplier = header.id_supplier";
        $query = $this->db->query($sql);
        return $query->result();
    }


    public function getData()
    {

        $sql = $this->db->get('laporan_pembelian');
        return $sql->result();
    }

    // public function cari($tanggal, $supplier)
    // {
    //     $this->db->like('tgl', $tanggal);
    //     $this->db->or_like('supplier', $supplier);
    //     $this->db->get('laporan_pembelian')->result();
    // }

    public function edit($i, $table)
    {
        return $this->db->get_where($table, $i);
    }
}
