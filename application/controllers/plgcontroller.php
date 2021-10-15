<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Plgcontroller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("plg_model");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
		$data["products"] = $this->plg_model->getAll();
        $this->load->view("plgviews", $data);
	}

	public function add()
    {
        $product = $this->plg_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("plgnew_form");
    }

    public function edit($id = null)
    {
        if (!isset($id)) redirect('plgcontroller');
       
        $product = $this->plg_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("plgedit_form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->plg_model->delete($id)) {
            redirect(site_url('plgcontroller'));
        }
    }

    public function tambah(){
        $this->load->view("plgnew_form");
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
