<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("lprn_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
        $this->load->view("pencarian");
	}

	public function search(){
            $keyword = $this->input->post('keyword');
            $data['products']=$this->product_m->get_product_keyword($keyword);
            $this->load->view('search',$data);
        }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
