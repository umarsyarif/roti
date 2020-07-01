<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
  
  public function __construct(){
    parent::__construct();
    $this->load->model('LoginModel');
  }

  public function index(){
    if($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
      redirect('index.php/main'); // Redirect ke halaman main
    $this->load->view('login'); // Load view login.php
  }

  public function login(){
    $username = $this->input->post('username'); // Ambil isi dari inputan username pada form login
    $password = md5($this->input->post('password')); // Ambil isi dari inputan password pada form login dan encrypt dengan md5
    $login = $this->LoginModel->get($username); // Panggil fungsi get yang ada di LoginModel.php
    if(empty($login)){ // Jika hasilnya kosong / user tidak ditemukan
      $this->session->set_flashdata('pesan', 'Email atau password salah'); // Buat session flashdata
      redirect('login'); // Redirect ke halaman welcome
    }else{
      if($password == $login->password){ // Jika password yang diinput sama dengan password yang didatabase
        if($login->level=='0'){
          $nama = 'Admin';
          $id_user = $login->id_user;
        }else{
          $get = $this->LoginModel->get_pelanggan($login->username);
          $nama = 'Member';
          $id_user = $get->id_pelanggan;
        }
        $session = array(
          'authenticated'=>true, // Buat session authenticated dengan value true
          'id'=>$id_user,  // Buat session id
          'level'=>$login->level,  // Buat session level
          'nama'=>$nama,  // Buat session level
        );
        
        $this->session->set_userdata($session); // Buat session sesuai $session
        redirect('main'); // Redirect ke halaman welcome
      }else{
        $this->session->set_flashdata('pesan', 'Email atau password salah'); // Buat session flashdata
        redirect('login'); // Redirect ke halaman welcome
      }
    }
  }

  public function register(){
    $this->load->view('register');
  }

  public function daftar(){
    $cek_pelanggan = $this->LoginModel->get_pelanggan($this->input->post('username'));
    if($cek_pelanggan==0){
      $data = array(
            'nama_pelanggan'   => $this->input->post('nama_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
            'no_hp'            => $this->input->post('no_hp'),
            'email'            => $this->input->post('username'),
            'kategori'         => $this->input->post('kategori'),
            );
      $this->LoginModel->save('pelanggan', $data);

      $data1 = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'level'    => "1",
            );
      $this->LoginModel->save('user', $data1);
      $this->session->set_flashdata('daftar', 'Register Telah Berhasil ! Silahkan Sign In.'); // Buat session flashdata
      redirect('login');
    }else{
      $this->session->set_flashdata('pesan', 'Register Gagal !'); // Buat session flashdata
      redirect('login/register');
    }
  }

  public function logout(){
    $this->session->sess_destroy(); // Hapus semua session
    redirect('login'); // Redirect ke halaman login
  }
}