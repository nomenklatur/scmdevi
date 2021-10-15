<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Supp_model extends CI_Model
{
    private $_table = "supplier";

    public $kode;
    public $nama;
    public $email;
    public $nohp;



    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'email',
            'label' => 'email',
            'rules' => 'required'],

            ['field' => 'nohp',
            'label' => 'nohp',
            'rules' => 'required']

            
        ];
    }
    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($kode)
    {
        return $this->db->get_where($this->_table, ["kode" => $kode])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode = $post["kode"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->nohp = $post["nohp"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
       $this->kode = $post["kode"];
        $this->nama = $post["nama"];
        $this->email = $post["email"];
        $this->nohp = $post["nohp"];

        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }
}