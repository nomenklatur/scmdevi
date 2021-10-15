<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class As_supplier_3 extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("supp_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));

    }


	public function index()
	{
		$data["products"] = $this->supp_model->getAll();
        $this->load->view("supplier_views_3", $data);
	}

	public function add()
    {
        $product = $this->supp_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("supplier_add_form_3");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('as_supplier_3');
       
        $product = $this->supp_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("supplier_edit_form_3", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->supp_model->delete($id)) {
            redirect(site_url('as_supplier_3'));
        }
    }

    public function tambah(){
        $this->load->view("supplier_add_form_3");
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
