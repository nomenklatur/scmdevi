<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pbbcontroller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("pbb_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
		$data["products"] = $this->pbb_model->getAll();
        $this->load->view("pbbviews", $data);
	}

	public function add()
    {
        $product = $this->pbb_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pbbnew_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('bbcontroller');
       
        $product = $this->pbb_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("pbbedit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pbb_model->delete($id)) {
            redirect(site_url('pbbcontroller'));
        }
    }

    public function tambah(){
        $this->load->view("pbbnew_form");
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
