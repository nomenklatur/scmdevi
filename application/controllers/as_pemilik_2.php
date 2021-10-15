<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class As_pemilik_2 extends CI_Controller {

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
        $this->load->view("pemilik-penjualan-views", $data);
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

        $this->load->view("pemilik-penjualan-add-form");
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

        $this->load->view("pemilik-distribusi-add-form");
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
        
        $this->load->view("pemilik-penjualan-edit-form", $data);
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
        $data["produk"] = $product->getById($id);
        if (!$data["produk"]) show_404();
        
        $this->load->view("pemilik-distribusi-edit-form", $data);
    }

    public function delete($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pjl_model->delete($id)) {
            redirect(site_url('as_pemilik_2'));
        }
    }

    public function delete2($id=null)
    {
        if (!isset($id)) show_404();
        
        if ($this->pjl_model2->delete($id)) {
            redirect(site_url('as_pemilik_2'));
        }
    }

    public function tambah(){
        $this->load->view("pemilik-penjualan-add-form");
    }

    public function tambah2(){
        $this->load->view("pemilik-distribusi-add-form");
    }

    public function kehabisan($id = null)
    {
        if (!isset($id)) redirect('as_pemilik_2');
        if ($this->pjl_model2->habis($id)){
            redirect(site_url('as_pemilik_2'));
        }
        $data["produk"] = $product->getById($id);
       
    }
    public function logout()
    {
        // hancurkan semua sesi
        $this->session->sess_destroy();
        redirect(site_url('login'));
    }
}
