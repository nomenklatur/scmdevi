<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notif_gudang extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model("pjl_model2");
        $this->load->library('form_validation');
        $this->load->model("user_model");
        if($this->user_model->isNotLogin()) redirect(site_url('login'));
    }


	public function index()
	{
        $data["produk"] = $this->pjl_model2->getEmpty();
        $this->load->view("gudang-notif", $data);
	}

	
}
