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
        $this->data['dipinjam'] = $this->Peminjaman_model->getPinjam('dipinjam');
        // var_dump($this->data['dipinjam']);die;
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/dipinjam", $this->data);
        $this->load->view("template/petugas/footer"); # code...
    }
    public function diKembalikan()
    {
        $this->data['title'] = "petugas Pages";
        $this->data['dikembalikan'] = $this->Peminjaman_model->getPinjam('dikembalikan');
        // var_dump($this->data['dikembalikan']);die;
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/dikembalikan", $this->data);
        $this->load->view("template/petugas/footer"); # code...
    }
    public function waktuTenggang()
    {

        $this->data['title'] = "petugas Pages";
        $this->data['lewatWaktuTenggang'] = $this->Peminjaman_model->getPinjam('lewatTenggangWaktu');
        // var_dump($this->data['lewatWaktuTenggang']);die;
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/peminjaman/lewatWaktuTenggang", $this->data);
        $this->load->view("template/petugas/footer"); # code...
    }
    public function acc($id, $status)
    {
        $tgl = date('Y-m');
        $tambahhari =  date('d') + 3;
        $this->data['status'] = [
            'status_peminjaman' => $status,
            "id_petugas" => $this->data['petugas']->id_petugas,
            'tanggal_harus_kembali' => $tgl . '-' . $tambahhari,
            'tanggal_pinjam' => date('Y-m-d'),
        ];
        $this->Peminjaman_model->update($id, $this->data['status']);
        redirect('dashboard/petugas/peminjaman');
    }
    public function actKembalikan($id, $status)
    {
        // if ($status) {

        // }

        $this->data['kembali'] = $this->Peminjaman_model->getPinjamWhere($id);
        $hariIni =  date("Y-m-d");
        $expiredDay =  $this->data['kembali']->tanggal_harus_kembali;

        if ($hariIni > $expiredDay) {
            $this->data['status'] = [
                'status_peminjaman' => "lewatTenggangWaktu",
                'tanggal_kembali' => date('Y-m-d'),
            ];
            $this->session->set_flashdata("error", 'Buku yang dipinjam telah lewat waktu tenggang');
        } else {
            $this->data['status'] = [
                'status_peminjaman' => $status,
                'tanggal_kembali' => date('Y-m-d'),
            ];
            $this->session->set_flashdata("message", 'Buku telah dikembalikan');
        }

        $this->Peminjaman_model->update($id, $this->data['status']);
        redirect('dashboard/petugas/peminjaman/dipinjam');
    }
}
