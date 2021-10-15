<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pjlcontroller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("pjl_model");
        $this->load->model("pjl_model2");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
		$data["products"] = $this->pjl_model->getAll();
        $data["produk"] = $this->pjl_model2->getAll();
        $this->load->view("pjlviews", $data);
	}

	public function add()
    {
        $product = $this->pjl_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pjlnew_form");
    }
public function add2()
    {
        $product = $this->pjl_model2;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->save();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }

        $this->load->view("pjlnew_form");
    }
    public function edit($id = null)
    {
        if (!isset($id)) redirect('bbcontroller');
       
        $product = $this->pjl_model;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("pjledit_form", $data);
    }
    public function kehabisan($id = null)
    {
        if (!isset($id)) redirect('bbcontroller');
       
        $product = $this->pjl_model2;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->habis();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("pjlviews");
    }
    public function edit2($id = null)
    {
        if (!isset($id)) redirect('bbcontroller');
       
        $product = $this->pjl_model2;
        $validation = $this->form_validation;
        $validation->set_rules($product->rules());

        if ($validation->run()) {
            $product->update();
            $this->session->set_flashdata('success', 'Berhasil disimpan');
        }
        $data["product"] = $product->getById($id);
        if (!$data["product"]) show_404();
        
        $this->load->view("pjledit_form2", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pjl_model->delete($id)) {
            redirect(site_url('pjlcontroller'));
        }
    }
     public function delete2($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pjl_model2->delete($id)) {
            redirect(site_url('pjlcontroller'));
        }
    }

    public function tambah(){
        $this->load->view("pjlnew_form");
    }
    public function tambah2(){
        $this->load->view("pjlnew_form2");
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
