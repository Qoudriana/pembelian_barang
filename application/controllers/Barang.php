<?php
defined('BASEPATH') or exit('No direct script access allowed');

class barang extends CI_Controller
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
        $data['title'] = "Data Stok Barang";
        $data['barang'] = $this->m_admin->barang();
        $data['supplier'] = $this->m_admin->supplier();
        $data['jenis'] = $this->m_admin->jenis();
        $data['satuan'] = $this->m_admin->satuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('barang/barang', $data);
        $this->load->view('templates/footer');
        unset($_SESSION['msg'],
        $_SESSION['ubah'],
        $_SESSION['hapus']);
    }

    public function tambah_barang()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah barang';
        $data['supplier'] = $this->m_admin->supplier();
        $data['jenis'] = $this->m_admin->jenis();
        $data['satuan'] = $this->m_admin->satuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('barang/form_tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan_barang()
    {
        $barang = $this->input->post('barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $supplier = $this->input->post('supplier');
        $jenis = $this->input->post('jenis');
        $satuan = $this->input->post('satuan');

        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $harga_int = (int) $harga_str;



        $this->form_validation->set_rules('barang', 'barang', 'required|trim', [
            'required' => 'barang harus diisi'
        ]);

        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Jenis harus diisi'
        ]);

        $this->form_validation->set_rules('satuan', 'satuan', 'required|trim', [
            'required' => 'Satuan harus diisi'
        ]);

        $this->form_validation->set_rules('harga', 'Harga', 'required|trim', [
            'required' => 'Harga Harus Diisi',
        ]);
        $this->form_validation->set_rules('supplier', 'Supplier', 'required|trim', [
            'required' => 'Supplier Harus Diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = "Form Tambah barang";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/menu', $data);
            $this->load->view('barang/form_tambah');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_barang' => $barang,
                'stok' =>  $qty,
                'harga_satuan' => $harga_int,
                'id_supplier' => $supplier,
                'id_jenis' => $jenis,
                'id_satuan' => $satuan
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
        $data['supplier'] = $this->m_admin->supplier();
        $data['jenis'] = $this->m_admin->jenis();
        $data['satuan'] = $this->m_admin->satuan();
        $this->load->view('templates/header', $data);
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
        $barang = $this->input->post('barang');
        $qty = $this->input->post('qty');
        $harga = $this->input->post('harga');
        $supplier = $this->input->post('supplier');
        $jenis = $this->input->post('jenis');
        $satuan = $this->input->post('satuan');

        $harga_str = preg_replace("/[^0-9]/", "", $harga);
        $harga_int = (int) $harga_str;

        $data = array(
            'nama_barang' => $barang,
            'stok' => $qty,
            'harga_satuan' => $harga_int,
            'id_supplier' => $supplier,
            'id_jenis' => $jenis,
            'id_satuan' => $satuan
        );
        $where = array('id_barang' => $this->input->post('id'));
        $this->m_admin->ubah_barang($where, $data, 'barang');
        $this->session->set_flashdata('ubah', 'Data Berhasil Diubah');
        redirect('barang');
    }
}
