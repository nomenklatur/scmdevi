<?php

class User_model extends CI_Model
{
    private $_table = "users";

    public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"])
                ->or_where('username', $post["email"]);
        $user = $this->db->get($this->_table)->row();

        // jika user terdaftar
        if($user){
            // periksa password-nya
            $isPasswordTrue = password_verify($post["password"], $user->password);
            // periksa role-nya
            $isAdmin = $user->role == $post["status"];

            // jika password benar dan dia admin
            if($isPasswordTrue && $isAdmin){ 
                // login sukses yay!
                $this->session->set_userdata(['user_logged' => $user]);
                $this->_updateLastLogin($user->user_id);
                return true;
            }
        }
        
        // login gagal
		return false;
    }
    public function isAdmin(){
        $post = $this->input->post();
        $user = $this->db->get($this->_table)->row();
        if($user){
            $imAdmin = $post['status'] == 'admin';
            if($imAdmin) return true;
        }
    return false;
    }
     public function isSupp(){
        $post = $this->input->post();
        $user = $this->db->get($this->_table)->row();
        if($user){
            $imSupp = $post['status'] == 'supplier';
            if($imSupp) return true;
        }
    return false;
    }
    public function isGudang(){
        $post = $this->input->post();
        $user = $this->db->get($this->_table)->row();
        if($user){
            $imGudang = $post['status'] == 'manufaktur';
            if($imGudang) return true;
        }
    return false;
    }
    public function isPemilik(){
        $post = $this->input->post();
        $user = $this->db->get($this->_table)->row();
        if($user){
            $imPemilik = $post['status'] == 'pemilik';
            if($imPemilik) return true;
        }
    return false;
    }
    public function isNotLogin(){
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id){
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

}