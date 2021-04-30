<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        // $tanggal = $this->input->post('tanggal');
        // $supplier = $this->input->post('filter');
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Laporan Transaksi";
        $data['supplier'] = $this->m_admin->supplier();
        $data['laporan'] = $this->M_transaksi->laporan();
        // $dt = $this->M_transaksi->cari($supplier, $tanggal);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('transaksi/transaksi', $data);
        $this->load->view('templates/footer');
    }

    public function view()
    {
        $callback = array(
            'data' => $this->Mdata->getData(),
        );
        header('Content-Type: application/json');
        echo json_encode($callback); // Convert array $callback ke json

    }

    public function form_edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Laporan Transaksi";
        $i = array(
            'id_supplier' => $id
        );
        $data['supplier'] = $this->m_admin->supplier();
        $data['laporan'] = $this->M_transaksi->laporan();
        // $data['laporan'] = $this->M_transaksi->edit($i, 'laporan_pembelian');
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('transaksi/laporan_trans', $data);
        $this->load->view('templates/footer');
    }
}
