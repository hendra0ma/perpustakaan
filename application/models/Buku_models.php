<?php
class Buku_models extends CI_Model
{

    public function getBuku()
    {
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_buku.id_jenis');
        $query = $this->db->get();
        return $query->result();
    }
    public function getBukuByidJenis($id_jenis)
    {
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->where('id_jenis', $id_jenis);
        $query = $this->db->get();
        return $query->result();
    }
    public function getBukuLimit($data)
    {
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_buku.id_jenis');
        $this->db->limit($data);
        $query = $this->db->get();
        return $query->result();
    }
    public function insertBuku($data)
    {
        $this->db->insert('tb_buku', $data);
    }
    public function getById($id)
    {
        $this->db->where('id_buku', $id);
        return $this->db->get('tb_buku')->row();
    }
    public function getByIdJoin($id)
    {
        $this->db->select('*');
        $this->db->from('tb_buku');
        $this->db->join('tb_jenis', 'tb_jenis.id_jenis = tb_buku.id_jenis');
        $this->db->where('tb_buku.id_buku', $id);
        $query = $this->db->get();
        return $query->row();
    }

    public function deleteBuku($id)
    {
        $this->db->where('id_buku', $id);
        $this->db->delete('tb_buku');
    }
    public function updateBuku($id, $data)
    {
        $this->db->where("id_buku", $id);
        $this->db->update("tb_buku", $data);
    }
}
