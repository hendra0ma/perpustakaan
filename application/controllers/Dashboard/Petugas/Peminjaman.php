<?php

class Peminjaman extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->autenticated();
        $this->data['petugas'] = $this->Petugas_model->getUserByUsername($this->session->userdata('username'));
    }
    private function autenticated()
    {
        if (!$this->session->userdata("autentikasi") || $this->session->userdata("id_level") != 3) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect("auth");
        }
    }
    public function index()
    {
        $this->data['title'] = "Request Pinjam";
        $this->data['acc'] = $this->Peminjaman_model->getPinjam(null);

        // var_dump($this->data['dipinjam']);die;
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/index", $this->data);
        $this->load->view("template/petugas/footer");
    }
    public function diPinjam()
    {
        $this->data['title'] = "petugas Pages";
        $this->data['dipinjam'] = $this->Peminjaman_model->getPinjams('dipinjam');
        $this->data['dipinjamByAdmin'] = $this->Peminjaman_model->getPinjam("dipinjam");
        // var_dump($this->data['dipinjam']);die;
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/dipinjam", $this->data);
        $this->load->view("template/petugas/footer"); # code...
    }
    public function diKembalikan()
    {
        $this->data['title'] = "petugas Pages";
        $this->data['dikembalikan'] = $this->Peminjaman_model->getPinjamAll('dikembalikan');
        // var_dump($this->data['dikembalikan']);die;
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/dikembalikan", $this->data);
        $this->load->view("template/petugas/footer"); # code...
    }
    public function waktuTenggang()
    {

        $this->data['title'] = "Admin Pages";
        $this->data['lewatWaktuTenggang'] = $this->Peminjaman_model->getPinjam('lewatTenggangWaktu', $this->data['petugas']->id_petugas);
        error_reporting(0);
        // var_dump($this->data['lewatWaktuTenggang']);die;

        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/lewatWaktuTenggang", $this->data);
        $this->load->view("template/petugas/footer"); # code...
    }
    public function acc($id, $status, $id_buku)
    {

        $buku = $this->Buku_models->getByIdJoin($id_buku);
        $stock = $buku->stock_buku - 1;

        $tgl = date('Y-m');
        $tambahhari =  date('d') + 3;
        $this->data['status'] = [
            'status_peminjaman' => $status,
            "id_petugas" => $this->data['petugas']->id_petugas,
            'tanggal_harus_kembali' => $tgl . '-' . $tambahhari,
            'tanggal_pinjam' => date('Y-m-d'),
        ];
        $this->Buku_models->updateBuku($id_buku, ['stock_buku' => $stock]);
        $this->Peminjaman_model->update($id, $this->data['status']);
        redirect('dashboard/petugas/peminjaman');
    }
    public function actKembalikan($id, $status, $id_buku = null)
    {
        // if ($status) {

        // }

        $this->data['kembali'] = $this->Peminjaman_model->getPinjamWhere($id);
        $hariIni =  date("Y-m-d");
        $expiredDay =  $this->data['kembali']->tanggal_harus_kembali;
        if ($id_buku != null) {
            $buku = $this->Buku_models->getByIdJoin($id_buku);
            $stock = $buku->stock_buku + 1;
            $this->Buku_models->updateBuku($id_buku, ['stock_buku' => $stock]);
        }
        if ($hariIni > $expiredDay) {
            $this->data['status'] = [
                'status_peminjaman' => "lewatTenggangWaktu",
                'tanggal_kembali' => date('Y-m-d'),
                'id_petugas' => $this->data['petugas']->id_petugas
            ];
            $this->session->set_flashdata("error", 'Buku yang dipinjam telah lewat waktu tenggang');
        } else {
            $this->data['status'] = [
                'status_peminjaman' => $status,
                'tanggal_kembali' => date('Y-m-d'),
                'id_petugas' => $this->data['petugas']->id_petugas
            ];
            $this->session->set_flashdata("message", 'Buku telah dikembalikan');
        }

        $this->Peminjaman_model->update($id, $this->data['status']);
        redirect('dashboard/petugas/peminjaman/dipinjam');
    }
    public function kembalikanLewatWaktuTenggang($id_peminjaman, $status)
    {
        $this->data['status'] = [
            'status_peminjaman' => $status,
            'tanggal_kembali' => date('Y-m-d'),
            'id_petugas' => $this->data['petugas']->id_petugas
        ];
        $this->Peminjaman_model->update($id_peminjaman, $this->data['status']);
        $this->session->set_flashdata("message", 'Buku telah dikembalikan');
        redirect('dashboard/petugas/peminjaman/waktuTenggang');
    }
    public function delete($id)
    {
        $this->db->where('id_peminjaman', $id);
        $this->db->delete('tb_peminjaman');
        redirect('dashboard/petugas/peminjaman/diKembalikan');
    }
}
