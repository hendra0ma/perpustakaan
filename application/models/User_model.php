<?php
class User_model extends CI_Model
{
    public function getUserByUsername($data)
    {

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level', 'tb_level.id_level = tb_user.id_level');
        $this->db->where('tb_user.username', $data);
        $query = $this->db->get();
        return $query->row();
    }
    public function getUserById($data)
    {

        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->join('tb_level', 'tb_level.id_level = tb_user.id_level');
        $this->db->where('tb_user.id_user', $data);
        $query = $this->db->get();
        return $query->row();
    }
    public function register($data)
    {
        $this->db->insert('tb_user', $data);
    }
    public function update($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update("tb_user", $data);
    }
}
