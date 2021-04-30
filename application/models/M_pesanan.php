<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_pesanan extends CI_Model
{
    // kode otomatis
    public function kode()
    {
        $q = $this->db->query("SELECT max(right(no_pembelian,4)) as no_pembelian FROM header WHERE DATE(tgl)=CURDATE()");
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->no_pembelian) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return date('dmy') . $kd;
    }
    public function get_Supplier()
    {
        $query = $this->db->get('supplier');
        return $query->result();
    }

    public function get_Barang()
    {
        $query = $this->db->get('barang');
        return $query->result();
    }

    public function get_Kode($table)
    {
        $sql = "Select * from $table";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function getTampilBarang($x)
    {
        // $query = $this->db->get_where('barang', array('id_supplier' => $x));
        $sql = "select * from barang where id_supplier='$x'";
        $query = $this->db->query($sql);
        return $query->result();
    }

    public function get_Data($table, $field, $criteria)
    {
        $sql = "Select * from $table where $field = '$criteria'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
            return $query->result();
        else

            return false;
    }

    public function insertHeader($idpembelian, $idsupplier, $tgl, $iduser)
    {

        $try = $this->db->query("insert into header(no_pembelian,id_supplier,tgl, id_user)values('$idpembelian', '$idsupplier','$tgl', '$iduser')");

        return $try;
    }

    public function InsertDetail($data)
    {

        foreach ($data as  $dt) {

            $idpembelian = $dt['idpembelian'];
            $idbarang = $dt['idbarang'];
            $qty = $dt['qty'];
            $harga = $dt['harga'];

            $this->db->query("insert into detail values ('$idpembelian', '$idbarang', '$qty', '$harga')");
        }

        return true;
    }
}
