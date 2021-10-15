<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class As_gudang_2 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("pc_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
		$data["products"] = $this->pc_model->getAll();
        $this->load->view("gudang-cake-views", $data);
	}

	public function add()
    {
        $product = $this->pc_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("gudang-cake-add-form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('as_gudang_2');
       
        $product = $this->pc_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("gudang-cake-edit-form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pc_model->delete($id)) {
            redirect(site_url('as_gudang_2'));
        }
    }

    public function tambah(){
        $this->load->view("gudang-cake-add-form");
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
