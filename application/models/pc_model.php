<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Pc_model extends CI_Model
{
    private $_table = "produk_cake";

    public $kode;
    public $tglmasuk;
    public $jlhcake;
    public $stkcake;
    public $terjual;
    public $varian_rasa;

    public function rules()
    {
        return [
            ['field' => 'kode',
            'label' => 'Kode',
            'rules' => 'required'],

            ['field' => 'tglmasuk',
            'label' => 'tglmasuk',
            'rules' => 'required'],

            ['field' => 'jlhcake',
            'label' => 'jlhcake',
            'rules' => 'required'],

            ['field' => 'stkcake',
            'label' => 'stkcake',
            'rules' => 'required'],

            ['field' => 'terjual',
            'label' => 'terjual',
            'rules' => 'required'],

            ['field' => 'varian_rasa',
            'label' => 'varian_rasa',
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
        $this->tglmasuk = $post["tglmasuk"];
        $this->jlhcake = $post["jlhcake"];
        $this->stkcake = $post["stkcake"];
        $this->terjual = $post["terjual"];
        $this->varian_rasa = $post["varian_rasa"];
        return $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
       $this->kode = $post["kode"];
        $this->tglmasuk = $post["tglmasuk"];
        $this->jlhcake = $post["jlhcake"];
        $this->stkcake = $post["stkcake"];
        $this->terjual = $post["terjual"];
        $this->varian_rasa = $post["varian_rasa"];

        return $this->db->update($this->_table, $this, array('kode' => $post['kode']));
    }

    public function delete($kode)
    {
        return $this->db->delete($this->_table, array("kode" => $kode));
    }
}