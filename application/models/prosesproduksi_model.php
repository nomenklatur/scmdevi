<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Prosesproduksi_model extends CI_Model
{
    private $_table = "proses_produksi";

    public $kode;
    public $tanggal_produksi;
    public $tanggal_selesai;
    public $hasil;
    public $stok;
    public $nama_bahan;

    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'tanggal_produksi',
            'label' => 'tanggal_produksi',
            'rules' => 'required'],

            ['field' => 'tanggal_selesai',
            'label' => 'tanggal_selesai',
            'rules' => 'required'],

             ['field' => 'hasil',
            'label' => 'Hasil',
            'rules' => 'required'],

            ['field' => 'stok',
            'label' => 'stok',
            'rules' => 'required'],

            ['field' => 'nama_bahan',
            'label' => 'nama_bahan',
            'rules' => 'required']

            
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }

    public function getBahanBaku()
    {
        $this->db->select('*');
        $this->db->from('proses_produksi');
        return $this->db->get()->result();
    }
    
    public function getById($kode)
    {
        return $this->db->get_where($this->_table, ["kode" => $kode])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->kode = $post["kode"];
        $this->nama_bahan = $post["nama_bahan"];
        $this->tanggal_produksi = $post["tanggal_produksi"];
        $this->tanggal_selesai = $post["tanggal_selesai"];
        $this->hasil = $post["hasil"];
        $this->stok = $post["stok"];

        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->kode = $post["kode"];
        $this->nama_bahan = $post["nama_bahan"];
        $this->tanggal_produksi = $post["tanggal_produksi"];
        $this->tanggal_produksi = $post["tanggal_selesai"];
        $this->hasil = $post["hasil"];
        $this->stok = $post["stok"];
        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }
}