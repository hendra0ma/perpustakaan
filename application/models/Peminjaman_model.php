<?php

class Peminjaman_model extends CI_Model
{
    public function getPinjam($whereStatus = NULL)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');
        // $this->db->join('tb_petugas', 'tb_petugas.id_petugas =  tb_peminjaman.id_petugas');
        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        $this->db->where('tb_peminjaman.id_petugas', 0);
        if ($whereStatus != null)
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        else
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        return $this->db->get()->result();
    }
    public function getPinjams($whereStatus = NULL)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_petugas', 'tb_petugas.id_petugas =  tb_peminjaman.id_petugas');
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');
        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        if ($whereStatus != null)
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        else
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        return $this->db->get()->result();
    }
    public function getPinjamAll($whereStatus = NULL)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');
        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        if ($whereStatus != null)
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        else
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        return $this->db->get()->result();
    }
    public function getPinjamByUser($whereStatus = NULL, $id)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');
        $this->db->join('tb_petugas', 'tb_petugas.id_petugas =  tb_peminjaman.id_petugas');
        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        $this->db->where('tb_peminjaman.id_user', $id);
        if ($whereStatus != null || $whereStatus == "")
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        else
            $this->db->where('tb_peminjaman.status_peminjaman', $whereStatus);
        return $this->db->get()->result();
    }
    public function getPinjamByUserDipinjam($id)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');

        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        $this->db->where('tb_peminjaman.status_peminjaman', "dipinjam");
        // $this->db->where('tb_peminjaman.id_petugas >', 0);
        $this->db->where('tb_peminjaman.id_user', $id);
        // $this->db->where('tb_peminjaman.id_petugas', 0);

        return $this->db->get()->result();
    }

    public function getPinjamByUserLimit($whereStatus = NULL, $id, $limit)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');
        $this->db->join('tb_petugas', 'tb_petugas.id_petugas =  tb_peminjaman.id_petugas');
        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        $this->db->where('tb_peminjaman.id_user', $id);
        $this->db->where('tb_peminjaman.status_peminjaman', "dipinjam");
        $this->db->where('tb_peminjaman.id_petugas >', 0);
        $this->db->order_by('tb_peminjaman.status_peminjaman', 'ASC');
        $this->db->limit($limit);
        return $this->db->get()->result();
    }
    public function getPinjamBelumAcc($id)
    {
        $this->db->select("*");
        $this->db->from("tb_peminjaman");
        $this->db->join('tb_user', 'tb_user.id_user =  tb_peminjaman.id_user');
        // $this->db->join('tb_petugas', 'tb_petugas.id_petugas =  tb_peminjaman.id_petugas');
        $this->db->join('tb_buku', 'tb_buku.id_buku =  tb_peminjaman.id_buku');
        $this->db->where('tb_peminjaman.id_user', $id);
        $this->db->where('tb_peminjaman.id_petugas', 0);

        $this->db->order_by('tb_peminjaman.status_peminjaman', 'ASC');

        return $this->db->get()->result();
    }

    public function update($id, $data)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->update('tb_peminjaman', $data);
    }
    public function getPinjamWhere($id)
    {
        $this->db->where('id_peminjaman', $id);
        return $this->db->get('tb_peminjaman')->row();
    }
    public function delete($id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('tb_peminjaman');
    }
}
