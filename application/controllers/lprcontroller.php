<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lprcontroller extends CI_Controller {

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
            $keyword2 = $this->input->post('keyword2');
            $data['products']=$this->lprn_model->get_product_keyword($keyword,$keyword2);
            $this->load->view('hasil',$data);
        }
    public function search2(){
            $key = $this->input->post('key');
            $key2 = $this->input->post('key2');
            $data['products']=$this->lprn_model->get_product_keyword2($key,$key2);
            $this->load->view('penjualan',$data);
        }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
