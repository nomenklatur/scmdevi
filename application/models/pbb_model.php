<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pbb_model extends CI_Model
{
    private $_table = "pesan_bb";

    public $kode;
    public $suppliers;
    public $bahanbaku;
    public $jumlah;
    public $harga;
    public $total;
    public $tanggalorder;


    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'suppliers',
            'label' => 'suppliers',
            'rules' => 'required'],

            ['field' => 'bahanbaku',
            'label' => 'bahanbaku',
            'rules' => 'required'],

            ['field' => 'jumlah',
            'label' => 'jumlah',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'harga',
            'rules' => 'required'],

             ['field' => 'total',
            'label' => 'total',
            'rules' => 'required'],

            ['field' => 'tanggalorder',
            'label' => 'tanggalorder',
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
        $this->suppliers = $post["suppliers"];
        $this->bahanbaku = $post["bahanbaku"];
        $this->jumlah = $post["jumlah"];
        $this->harga = $post["harga"];
        $this->total = $post["total"];
        $this->tanggalorder = $post["tanggalorder"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
       $this->kode = $post["kode"];
        $this->suppliers = $post["suppliers"];
        $this->bahanbaku = $post["bahanbaku"];
        $this->jumlah = $post["jumlah"];
        $this->harga = $post["harga"];
        $this->total = $post["total"];
        $this->tanggalorder = $post["tanggalorder"];
        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }
}