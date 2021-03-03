<?php
class Petugas_model extends CI_Model
{
    public function getUserByUsername($data)
    {
        $this->db->select('*');
        $this->db->from('tb_petugas');
        $this->db->join('tb_level', 'tb_level.id_level = tb_petugas.id_level');
        $this->db->where('tb_petugas.username', $data);
        $query = $this->db->get();
        return $query->row();
    }
    public function register($data)
    {
        $this->db->insert('tb_petugas', $data);
    }
    public function get()
    {

        return $this->db->get('tb_petugas')->result();
    }
    public function delete($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('tb_petugas');
    }
    public function getCount()
    {
        $this->db->select('id_petugas');
        $query = $this->db->get('tb_petugas')->result_array();
        return count($query);
    }
}
