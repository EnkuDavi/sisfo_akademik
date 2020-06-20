<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends CI_Model
{
    public function tampilData()
    {
        $this->db->select('user.user_id, user.username, user.email, level.role');
        $this->db->from('user');
        $this->db->join('level','user.level_id = level.level_id');
        $query = $this->db->get();
        return $query;
    }

    public function get($id = NULL)
    {
        $this->db->select();
        $this->db->from('user');
        if($id != null){
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            "nis" => htmlspecialchars($post["nisn"]),
            "username" => htmlspecialchars($post["username"]),
            "password" => sha1($post["password"]),
            "email" => htmlspecialchars($post["email"]),
            "level_id" => 3,
            "blokir" => "N"
        ];

        $this->db->insert('user',$params);
    }

    public function cek_nisn($post)
    {
        $this->db->where('nis',$post['nisn']);
        $this->db->from('siswa');
        $query = $this->db->get();
        return $query;
    }

    public function login($post)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function addUser($post)
    {
        $params = [
            "nis" => htmlspecialchars($post["id"]),
            "username" => htmlspecialchars($post["username"]),
            "password" => sha1($post["pass"]),
            "email" => htmlspecialchars($post["email"]),
            "level_id" => $post["level"],
            "blokir" => "N"
        ];

        $this->db->insert('user',$params);       
    }

    public function ubah($post)
    {
        $params = [
            "username" => htmlspecialchars($post["username"]),
            "email" => htmlspecialchars($post["email"]),
            "level_id" => $post["level"],
        ];
        $this->db->where('user_id',$post['id']);
        $this->db->update('user',$params);        
    }

    public function hapus($id)
    {
        $this->db->where('user_id',$id);
        $this->db->delete('user');
    }
}