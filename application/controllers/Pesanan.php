<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Buat Pesanan";
        $data['supplier'] = $this->M_pesanan->get_Supplier();
        $data['barang'] = $this->M_pesanan->get_Barang();
        $data['kode'] = $this->M_pesanan->kode();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('pesanan/buat_pesanan', $data);
        $this->load->view('templates/footer');
    }




    public function getHarga()
    {
        $idbarang = $this->input->post("id");
        $x = $this->M_pesanan->get_Data("barang", "id_barang", $idbarang);
        $myObj = new stdClass();
        foreach ($x as $r) {
            $myObj->nama_barang = $r->nama_barang;
            $myObj->harga = $r->harga_satuan;
            echo json_encode($myObj);
        }
    }

    public function tampilBarang()
    {
        $x = $this->input->post('id');
        $data = $this->M_pesanan->getTampilBarang($x);
        echo json_encode($data);
    }


    public function InsertHeader()
    {

        $idpembelian = $this->input->post('idpembelian');
        $idsupplier = $this->input->post('idsupplier');
        $tgl = $this->input->post('tgl');
        $iduser = $this->input->post('user');

        $this->load->model("M_pesanan");
        $try = $this->M_pesanan->insertHeader($idpembelian, $idsupplier, $tgl, $iduser);
        $this->session->set_flashdata('pesanan', 'Pesanan Berhasil Dibuat :)');
        echo json_encode($try);
    }

    public function InsertDetail()
    {

        $data = $this->input->post('data');

        $this->load->model("M_pesanan");
        $try = $this->M_pesanan->insertDetail($data);
        echo json_encode($try);
        // if ($try) {
        //     echo json_encode("Berhasil insert detail");
        // } else {
        //     echo json_encode("Gagal insert detail");
        // }
    }
}
