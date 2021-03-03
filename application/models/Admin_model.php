<?php
class Admin_model extends CI_Model
{
    public function getUserByUsername($data)
    {
        $this->db->select('*');
        $this->db->from('tb_administrator');
        $this->db->join('tb_level', 'tb_level.id_level = tb_administrator.id_level');
        $this->db->where('tb_administrator.username', $data);
        $query = $this->db->get();
        return $query->row();
    }
    public function update($data, $id)
    {
        $this->db->where('id_admin', $id);
        $this->db->update('tb_administrator', $data);
    }
}
