<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppcontroller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("prosesproduksi_model");
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
		$data["products"] = $this->prosesproduksi_model->getAll();
        $this->load->view("ppviews", $data);
	}

     
	public function add()
    {
        $product = $this->prosesproduksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());
       
        

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');

        }
        $this->load->view("ppnew_form");
    }

    public function detail($id = null)
    {
        if (!isset($id)) redirect('ppcontroller');
       
        $product = $this->prosesproduksi_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        

        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("ppdetail", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->prosesproduksi_model->delete($id)) {
            redirect(site_url('ppcontroller'));
        }
    }

    public function tambah(){
        $data["products"] = $this->prosesproduksi_model->getBahanBaku();
        $this->load->view("ppnew_form",$data);
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
