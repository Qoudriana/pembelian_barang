<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $data['title'] = "Laporan Transaksi";
        $data['supplier'] = $this->m_admin->supplier();
        $data['header'] = $this->M_transaksi->getData();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('transaksi/transaksi', $data);
        $this->load->view('templates/footer');
    }


    public function view($supplier = '', $dateRange = '')
    {

        $supplier = $_POST['supplier'];
        $dateRange = $_POST['dateRange'];

        $callback = array(
            'data' => $this->M_transaksi->getData($supplier, $dateRange),
        );

        header('Content-Type: application/json');
        echo json_encode($callback); // Convert array $callback ke json

    }

    public function detail($id)
    {
        $i = array(
            'no_pembelian' => $id
        );
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Laporan Transaksi";
        $data['laporan'] = $this->M_transaksi->header($id);
        $data['detail'] = $this->M_transaksi->detail($i, 'laporan_pembelian')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('transaksi/laporan_trans', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id)
    {
        $r = array('no_pembelian' => $id);
        $this->m_admin->hapus_transaksi($r, 'header');
        $this->session->set_flashdata('hapus', 'Data Berhasil Dihapus');
        redirect('transaksi');
    }


    public function print($id)
    {
        $i = array(
            'no_pembelian' => $id
        );
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Cetak Laporan";
        $data['laporan'] = $this->M_transaksi->header($id);
        $data['detail'] = $this->M_transaksi->detail($i, 'laporan_pembelian')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('transaksi/print_laporan', $data);
        // $this->load->view('templates/footer');
    }
}
