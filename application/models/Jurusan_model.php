<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurusan_model extends CI_Model
{

    public function getById($id)
    {
        $this->db->from('jurusan');
        $this->db->where('jurusan_id', $id);
        return $this->db->single();
    }

    public function tampilData()
    {
        return $this->db->get('jurusan');
    }

    public function add($post)
    {
        $params = [
            'kode_jurusan' => htmlspecialchars($post['kode_jurusan']),
            'nama_jurusan' => htmlspecialchars($post['nama_jurusan'])
        ];
        $this->db->insert('jurusan', $params);
    }

    public function ubah($post)
    {
        $params = [
            'kode_jurusan' => htmlspecialchars($post['kode_jurusan']),
            'nama_jurusan' => htmlspecialchars($post['nama_jurusan'])
        ];
        $this->db->where('jurusan_id', $post['id']);
        $this->db->update('jurusan', $params);
    }

    public function hapus($id)
    {
        $this->db->where('jurusan_id', $id);
        $this->db->delete('jurusan');
    }
    
}