<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Satuan extends CI_Controller
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
        $data['title'] = "Satuan";
        $data['satuan'] = $this->m_admin->satuan();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('satuan/satuan', $data);
        $this->load->view('templates/footer');
        unset($_SESSION['msg'],
        $_SESSION['ubah'],
        $_SESSION['hapus']);
    }

    public function tambah_satuan()
    {
        $satuan = $this->input->post('satuan');

        $this->form_validation->set_rules('satuan', 'Satuan', 'required|trim', [
            'required' => 'Harus Diisi!'
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
                'satuan' => $satuan
            ];
            $this->m_admin->insert_satuan($data, 'satuan');
            $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
            redirect('satuan');
        }
    }

    public function hapus_satuan($id)
    {
        $r = array('id_satuan' => $id);
        $this->m_admin->hapus_satuan($r, 'satuan');
        $this->session->set_flashdata('hapus', 'Data Berhasil Dihapus');
        redirect('satuan');
    }

    public function ubah_satuan()
    {
        $satuan = $this->input->post('satuan');

        $data = array(
            'satuan' => $satuan
        );
        $where = array('id_satuan' => $this->input->post('id'));
        $this->m_admin->ubah_satuan($where, $data, 'satuan');
        $this->session->set_flashdata('ubah', 'Data Berhasil Diubah');
        redirect('satuan');
    }

    public function jenis()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Jenis";
        $data['jenis'] = $this->m_admin->jenis();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('satuan/jenis', $data);
        $this->load->view('templates/footer');
        unset($_SESSION['msg'],
        $_SESSION['ubah'],
        $_SESSION['hapus']);
    }

    public function tambah_jenis()
    {
        $jenis = $this->input->post('jenis');

        $this->form_validation->set_rules('jenis', 'jenis', 'required|trim', [
            'required' => 'Harus Diisi!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = "Form Tambah barang";
            $this->load->view('templates/header');
            $this->load->view('templates/topbar');
            $this->load->view('templates/menu', $data);
            $this->load->view('satuan/jenis');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'jenis' => $jenis
            ];
            $this->m_admin->insert_jenis($data, 'jenis');
            $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
            redirect('satuan/jenis');
        }
    }

    public function hapus_jenis($id)
    {
        $r = array('id_jenis' => $id);
        $this->m_admin->hapus_jenis($r, 'jenis');
        $this->session->set_flashdata('hapus', 'Data Berhasil Dihapus');
        redirect('satuan/jenis');
    }

    public function ubah_jenis()
    {
        $jenis = $this->input->post('jenis');

        $data = array(
            'jenis' => $jenis
        );
        $where = array('id_jenis' => $this->input->post('id'));
        $this->m_admin->ubah_jenis($where, $data, 'jenis');
        $this->session->set_flashdata('ubah', 'Data Berhasil Diubah');
        redirect('satuan/jenis');
    }
}
