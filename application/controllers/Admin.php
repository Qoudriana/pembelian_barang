<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Dashboard";
        $data['jumlah'] = $this->m_admin->jumlah_supplier();
        $data['jml'] = $this->m_admin->jumlah_barang();
        $data['jmlh'] = $this->m_admin->jumlah_user();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('dahsboard', $data);
        $this->load->view('templates/footer');
    }


    public function supplier()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Data Supplier";
        $data['supplier'] = $this->m_admin->supplier();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('admin/supplier', $data);
        $this->load->view('templates/footer');
    }

    public function form_supplier()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Form Tambah Supplier";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('admin/form_supplier');
        $this->load->view('templates/footer');
    }

    public function simpan_supplier()
    {
        $this->form_validation->set_rules('supplier', 'Supplier', 'required|trim', [
            'required' => 'Supplier harus diisi'
        ]);
        $this->form_validation->set_rules('telp', 'Telepon', 'required|trim|numeric', [
            'required' => 'Telepon Harus Diisi',
            'numeric' => 'Nomor Telepon harus angka'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Alamat harus diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Form Tambah Supplier";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('admin/form_supplier');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'supplier' => $this->input->post('supplier'),
                'telp' => $this->input->post('telp'),
                'alamat' => $this->input->post('alamat')
            ];

            $this->m_admin->insert_supplier($data, 'supplier');
            $this->session->set_flashdata('msg', 'Data Berhasil Disimpan !');
            redirect('admin/supplier');
        }
    }

    public function hapus_supplier($id)
    {
        $r = array('id_supplier' => $id);
        $this->m_admin->hapus_supplier($r, 'supplier');
        redirect('admin/supplier');
    }

    public function form_edit_supplier($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $i = array(
            'id_supplier' => $id
        );
        $data['supplier'] = $this->m_admin->edit_supplier($i, 'supplier')->result();
        $data['title'] = "Form Edit Supplier";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('admin/edit_supplier');
        $this->load->view('templates/footer');
    }

    public function ubah_supplier()
    {
        $data = array(
            'supplier' => $this->input->post('supplier'),
            'telp' => $this->input->post('telp'),
            'alamat' => $this->input->post('alamat')
        );
        $where = array('id_supplier' => $this->input->post('id'));
        $this->m_admin->ubah_supplier($where, $data, 'supplier');
        $this->session->set_flashdata('ubah', 'Data Berhasil Diubah');
        redirect('admin/supplier');
    }
}
