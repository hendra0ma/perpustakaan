<?php
class Jenis_model extends CI_Model
{

    public function getJenisLimit($limit)
    {
        $this->db->limit($limit);
        return $this->db->get("tb_jenis")->result();
    }
    public function getJenis()
    {
        return $this->db->get("tb_jenis")->result();
    }
}
