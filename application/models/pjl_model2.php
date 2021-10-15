<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pjl_model2 extends CI_Model
{
    private $_table = "distribusi";

    public $kode;
    public $nama;
    public $jlhcake;
    public $harga;
    public $total;
    public $tglorder;
    public $status;


    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'nama',
            'label' => 'nama',
            'rules' => 'required'],

            ['field' => 'jlhcake',
            'label' => 'jlhcake',
            'rules' => 'required'],

            ['field' => 'harga',
            'label' => 'harga',
            'rules' => 'required'],

             ['field' => 'total',
            'label' => 'total',
            'rules' => 'required'],

            ['field' => 'tglorder',
            'label' => 'tglorder',
            'rules' => 'required']

            
        ];
    }

    public function getEmpty(){
        return $this->db->get_where($this->_table, ["status" => 'habis'])->result();
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
        $this->jlhcake = $post["jlhcake"];
        $this->harga = $post["harga"];
        $this->total = $post["total"];
        $this->tglorder = $post["tglorder"];
        $this->status = "tersedia";
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
       $this->kode = $post["kode"];
        $this->nama = $post["nama"];
        $this->jlhcake = $post["jlhcake"];
        $this->harga = $post["harga"];
        $this->total = $post["total"];
        $this->tglorder = $post["tglorder"];
        $this->status = "tersedia";
        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }

    public function habis($kode)
    {
        $id = $kode;
        $data = array(
            'kode' => $id,
            'status' => 'habis'
        );
        $this->db->where('kode',$id);
       return $this->db->update($this->_table, $data) ;
    }
}