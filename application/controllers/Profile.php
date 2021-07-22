<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
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
        $data['title'] = "Profil";
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar');
        $this->load->view('templates/menu', $data);
        $this->load->view('profile/profile', $data);
        $this->load->view('templates/footer');
        unset($_SESSION['msg'],
        $_SESSION['error'],
        $_SESSION['sukses'],
        $_SESSION['warning']);
    }

    public function ubah_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama tidak boleh kosong'
        ]);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username tidak boleh kosong'
        ]);


        if ($this->form_validation->run() == false) {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['title'] = "Edit Profil";
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/menu', $data);
            $this->load->view('profile/profile', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $username = $this->input->post('username');
            $email = $this->input->post('email');


            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto) {
                $config['upload_path']         = './assets/img/';  // foler upload 
                $config['allowed_types']        = 'gif|jpg|png'; // jenis file
                $config['max_size']             = 3000;
                // $config['max_width']            = 1024;
                // $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('foto')) {
                    $foto_lama = $data['user']['foto'];

                    if ($foto_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/' . $foto_lama);
                    }

                    $foto_baru = $this->upload->data('file_name');
                    $this->db->set('foto', $foto_baru);
                } else {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
                ' . $this->upload->display_errors() . '</div>');
                    redirect('profile');
                }
            }


            $this->db->set('name', $nama);
            $this->db->set('email', $email);
            // $this->db->set('password', $password);
            $this->db->where('username', $username);
            $this->db->update('user');
            $this->session->set_flashdata('msg', 'Data Berhasil Disimpan');
            redirect('profile');
        }
    }

    public function ubahPassword()
    {
        $this->form_validation->set_rules('psw_lama', 'Password Lama', 'required|trim', [
            'required' => 'Harap Isi Password Lama'
        ]);
        $this->form_validation->set_rules('psw_baru1', 'Password Baru', 'required|trim|min_length[5]|matches[psw_baru2]', [
            'required' => 'Harap Isi Password Baru',
            'min_length' => 'Password Terlalu Pendek, Masukkan Minimal 5 Karakter',
            'matches' => 'Password Tidak Sama'
        ]);
        $this->form_validation->set_rules('psw_baru2', 'Konfirmasi Password', 'required|trim|min_length[5]|matches[psw_baru1]', [
            'required' => 'Harap Konfirmasi Password',
            'matches' => 'Password Tidak Sama'
        ]);

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = "Ubah Password";
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar');
            $this->load->view('templates/menu', $data);
            $this->load->view('profile/ubah_pass', $data);
            $this->load->view('templates/footer');
            unset($_SESSION['msg'],
            $_SESSION['error'],
            $_SESSION['sukses'],
            $_SESSION['warning']);
        } else {
            $pass_lama = $this->input->post('psw_lama');
            $pass_baru = $this->input->post('psw_baru1');

            if (!password_verify($pass_lama, $data['user']['password'])) {
                $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password Lama Salah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('profile/ubahPassword');
            } else {
                if ($pass_lama == $pass_baru) {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password Baru Tidak Boleh Sama Dengan Password Baru!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                    redirect('profile/ubahPassword');
                } else {
                    $pass_hash = password_hash($pass_baru, PASSWORD_DEFAULT);

                    $this->db->set('password', $pass_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('error', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Password Berhasil Diubah ! Silakan Login Kembali</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>');
                    redirect('profile/ubahPassword');
                }
            }
        }
    }
}
