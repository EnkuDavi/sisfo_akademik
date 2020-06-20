<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_model extends CI_Model
{
    public function tampilData()
    {
        return $this->db->get('guru');
    }

    public function add($post)
    {
        $params = [
            "nip" => htmlspecialchars($post['nip']),
            "nama_guru" => htmlspecialchars($post['nama']),
            "gender" => htmlspecialchars($post['gender']),
            "status" => htmlspecialchars($post['status']),
            "telp" => htmlspecialchars($post['telp'])
        ];
        $this->db->insert('guru',$params);
    }

    public function ubah($post)
    {
        $params = [
            "nip" => htmlspecialchars($post['nip']),
            "nama_guru" => htmlspecialchars($post['nama_guru']),
            "gender" => htmlspecialchars($post['gender']),
            "status" => htmlspecialchars($post['status']),
            "telp" => htmlspecialchars($post['telp'])
        ];
        $this->db->where('guru_id', $post['id']);
        $this->db->update('guru', $params);        
    }

    public function hapus($id)
    {
        $this->db->where('guru_id', $id);
        $this->db->delete('guru');
    }
}