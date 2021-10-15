<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Bahanbaku_model extends CI_Model
{
    private $_table = "bahan_baku";

    public $kode;
    public $nama;
    public $stok;
    public $tanggal;

    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required'],

            ['field' => 'stok',
            'label' => 'Stok',
            'rules' => 'required'],

            ['field' => 'tanggal',
            'label' => 'tanggal',
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
        $this->stok = $post["stok"];
        $this->tanggal= $post["tanggal"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode = $post["kode"];
        $this->nama = $post["nama"];
        $this->stok = $post["stok"];
        $this->tanggal= $post["tanggal"];
        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }
}