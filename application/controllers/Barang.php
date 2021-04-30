<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Data Stok Barang";
        $data['barang'] = $this->m_admin->barang();
        $data['supplier'] = $this->m_admin->supplier();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('barang/barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_barang()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah barang';
        $data['supplier'] = $this->m_admin->supplier();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('barang/form_tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan_barang()
    {
        $this->form_validation->set_rules('barang', 'barang', 'required|trim', [
            'required' => 'barang harus diisi'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|numeric', [
            'required' => 'Harga Harus Diisi',
            'numeric' => 'Harga Telepon harus angka'
        ]);
        $this->form_validation->set_rules('supplier', 'Supplier', 'required|trim|numeric', [
            'required' => 'Supplier Harus Diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = "Form Tambah barang";
            $this->load->view('templates/header');
            $this->load->view('templates/topbar');
            $this->load->view('templates/menu', $data);
            $this->load->view('barang/form_tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_barang' => $this->input->post('barang'),
                'stok' => $this->input->post('qty'),
                'harga_satuan' => $this->input->post('harga'),
                'id_supplier' => $this->input->post('supplier')
            ];

            $this->m_admin->insert_barang($data, 'barang');
            $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
            redirect('barang');
        }
    }

    public function form_edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $i = array(
            'id_barang' => $id
        );
        $data['barang'] = $this->m_admin->edit_barang($i, 'barang')->result();
        $data['title'] = "Form Edit barang";
        $this->load->view('templates/header');
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('barang/form_edit');
        $this->load->view('templates/footer');
    }

    public function hapus_barang($id)
    {
        $r = array('id_barang' => $id);
        $this->m_admin->hapus_barang($r, 'barang');
        $this->session->set_flashdata('hapus', 'Data Berhasil Dihapus');
        redirect('barang');
    }

    public function ubah_barang()
    {
        $data = array(
            'nama_barang' => $this->input->post('barang'),
            'stok' => $this->input->post('qty'),
            'harga_satuan' => $this->input->post('harga')
        );
        $where = array('id_barang' => $this->input->post('id'));
        $this->m_admin->ubah_barang($where, $data, 'barang');
        $this->session->set_flashdata('ubah', 'Data Berhasil Diubah');
        redirect('barang');
    }
}
