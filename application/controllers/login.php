<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("user_model");
        $this->load->library('form_validation');
    }

    public function index()
    {
        // jika form login disubmit
        if($this->input->post()){
            if($this->user_model->doLogin()) {
                if($this->user_model->isAdmin()){
                redirect(site_url('home'));
            }
                if($this->user_model->isSupp()){
                redirect(site_url('as_supplier_1'));
            }
                if($this->user_model->isGudang()){
                redirect(site_url('as_gudang_1'));
            }
                if($this->user_model->isPemilik()){
                redirect(site_url('as_pemilik_1'));
            }
            }
        }

        // tampilkan halaman login
        $this->load->view("login_page.php");
    }

    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}