<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gudang extends CI_Controller
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
        $data['jumlah'] = $this->m_admin->jumlah_supplier();
        $data['jml'] = $this->m_admin->jumlah_barang();
        $data['jmlh'] = $this->m_admin->jumlah_user();
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu', $data);
        $this->load->view('dahsboard', $data);
        $this->load->view('templates/footer');
    }

    public function supplier()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Supplier';
        $data['supplier'] = $this->m_admin->supplier();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('admin/supplier', $data);
        $this->load->view('templates/footer');
    }
}
