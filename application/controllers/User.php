<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['getuser'] = $this->m_admin->user();
        $data['title'] = "User Management";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('user/data_user', $data);
        $this->load->view('templates/footer');
        unset($_SESSION['msg'],
        $_SESSION['ubah'],
        $_SESSION['hapus'],
        $_SESSION['aktivasi']);
    }

    public function form_user()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Tambah User";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('user/tambah');
        $this->load->view('templates/footer');
    }

    public function simpan_user()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama harus diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email Harus Diisi',
            'is_unique' => 'Email Sudah Pernah Digunakan'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Email Harus Diisi',
            'is_unique' => 'Email Sudah Pernah Digunakan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[5]|matches[password2]', [
            'required' => 'Password Harus Diisi',
            'matches' => 'Password Tidak Sama',
            'min_length' => 'Password Telalu Pendek'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = "Tambah User";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/menu', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('nama', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'role' => htmlspecialchars($this->input->post('role', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'created_at' => time(),
                'foto' => 'default.jpg',

            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg', 'Data Berhasil Disimpan !');
            redirect('user');
        }
    }

    public function form_edit($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Edit User";
        $i = array(
            'id_user' => $id
        );
        $data['users'] = $this->m_admin->edit_user($i, 'user')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('user/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_user()
    {
        $data = array(
            'name' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role')
        );
        $where = array('id_user' => $this->input->post('id'));
        $this->m_admin->ubah_user($where, $data, 'user');
        $this->session->set_flashdata('ubah', 'Data Berhasil Diubah');
        redirect('user');
    }

    public function hapus_user($id)
    {
        $r = array('id_user' => $id);
        $this->m_admin->hapus_user($r, 'user');
        $this->session->set_flashdata('hapus', 'terhapus');;
        redirect('user');
    }

    public function toggle($id)
    {
        $x = array('id_user' => $id);
        $status = $this->m_admin->get('user', $x)['status'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'user diaktifkan.' : 'user dinonaktifkan.';

        if ($this->m_admin->ubah_user($x, ['status' => $toggle], 'user')) {
            $this->session->set_flashdata('msg', $pesan);
        }
        unset($_SESSION['msg'],
        $_SESSION['ubah'],
        $_SESSION['hapus'],
        $_SESSION['aktivasi']);
        $this->session->set_flashdata('aktivasi', $pesan);
        redirect('user');
    }
}
