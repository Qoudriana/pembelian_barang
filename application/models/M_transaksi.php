<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{

    public function laporan()
    {
        $query = $this->db->get('laporan_pembelian');
        return $query->result();
    }


    public function getData($supplier = '', $dateRange = '')
    {

        $this->db->select('*');
        $this->db->from('header');
        $this->db->join('supplier', 'supplier.id_supplier = header.id_supplier');
        $this->db->join('user', 'user.id_user = header.id_user');

        if ($supplier != '' && $dateRange != '') {

            $dateLost = explode('-', $dateRange);
            $condition = "header.tgl BETWEEN " . "'" . date_format(date_create($dateLost[0]), 'Y-m-d') . "'" . " AND " . "'" . date_format(date_create($dateLost[1]), 'Y-m-d') . "'";
            $this->db->where($condition);
            $this->db->where('header.id_supplier', $supplier);
        } else if ($supplier == '' && $dateRange != '') {

            $dateLost = explode('-', $dateRange);
            $condition = "header.tgl BETWEEN " . "'" . date_format(date_create($dateLost[0]), 'Y-m-d') . "'" . " AND " . "'" . date_format(date_create($dateLost[1]), 'Y-m-d') . "'";
            $this->db->where($condition);
        }
        return $this->db->get()->result();
    }


    public function header($id)
    {
        $this->db->select('*');
        $this->db->from('header');
        $this->db->join('supplier', 'supplier.id_supplier = header.id_supplier');
        $this->db->join('user', 'user.id_user = header.id_user');
        $this->db->where('header.no_pembelian', $id);
        return $this->db->get()->result();
    }


    public function detail($id, $table)
    {
        return $this->db->get_where($table, $id);
    }

    function cari($filter)
    {
        $this->db->select('*');
        $this->db->from('header');
        $this->db->join('supplier', 'supplier.id_supplier = header.id_supplier');
        $this->db->join('user', 'user.id_user = header.id_user');
        $this->db->where("header.id_supplier", $filter);
        return $this->db->get()->result();
    }

    public function getHeader()
    {
        $this->db->select('*');
        $this->db->from('header');
        $this->db->join('supplier', 'supplier.id_supplier = header.id_supplier');
        $this->db->join('user', 'user.id_user = header.id_user');
        return $this->db->get()->result();
    }

    public function getLaporan()
    {
        $sql = $this->db->get('detail');
        return $sql->result();
    }
}
