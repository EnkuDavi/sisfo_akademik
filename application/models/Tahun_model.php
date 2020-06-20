<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tahun_model extends CI_Model
{
    public function getBy()
    {
        $date = date('Y');
        $this->db->where('tahun_ajaran', $date);
        $this->db->from('thn_ajaran');
    }

    public function tampilData()
    {
        return $this->db->get('thn_ajaran');
    }
    public function add($post)
    {
        $params = [
            "tahun_ajaran" => htmlspecialchars($post['thn']),
        ];
        $this->db->insert('thn_ajaran',$params);

    }

    public function hapus($id)
    {
        $this->db->where('thn_id', $id);
        $this->db->delete('thn_ajaran');
    }
}