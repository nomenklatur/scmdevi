<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Plg_model extends CI_Model
{
    private $_table = "pelanggan";

    public $kode;
    public $nama;
    public $nohp;
    public $alamat;
    
    

    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'nohp',
            'label' => 'nohp',
            'rules' => 'required'],

            ['field' => 'alamat',
            'label' => 'alamat',
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
        $this->nohp = $post["nohp"];
        $this->alamat = $post["alamat"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
       $this->kode = $post["kode"];
        $this->nama = $post["nama"];
        $this->nohp = $post["nohp"];
        $this->alamat = $post["alamat"];
        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }
}