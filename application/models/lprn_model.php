<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Lprn_model extends CI_Model
{
    private $_table = "pesan_bb";

    public $kode;
    public $suppliers;
    public $bahanbaku;
    public $jumlah;
    public $harga;
    public $total;
    public $tanggalorder;


    public function get_product_keyword($keyword,$keyword2){
            $this->db->select('*');
            $this->db->from('pesan_bb');
            $this->db->where('tanggalorder >=',$keyword);
            $this->db->where('tanggalorder <=',$keyword2);
            return $this->db->get()->result();
        }

    public function get_product_keyword2($key,$key2){
            $this->db->select('*');
            $this->db->from('penjualan');
            $this->db->where('tglorder >=',$key);
            $this->db->where('tglorder <=',$key2);
            return $this->db->get()->result();
        }
}