<?php

class Export extends CI_Controller
{

    private $data;

    public function __construct()
    {
        parent::__construct();
        $this->autenticated();
        $this->data['petugas'] = $this->Admin_model->getUserByUsername($this->session->userdata('username'));
    }
    private function autenticated()
    {
        if (!$this->session->userdata("autentikasi") || $this->session->userdata("id_level") != 3) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect("auth");
        }
    }
    public function generateListBuku()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-list-buku.pdf";
        $this->data['buku'] = $this->Buku_models->getBuku();
        $this->pdf->load_view('laporan/buku', $this->data);
    }
    public function generateJenis()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-jenis-buku.pdf";
        $this->data['jenis'] = $this->db->get('tb_jenis')->result();
        $this->pdf->load_view('laporan/jenis', $this->data);
    }
    public function generatePinjamRequest()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-request-peminjam.pdf";
        $this->data['request'] = $this->Peminjaman_model->getPinjam();
        $this->pdf->load_view('laporan/requestPeminjam', $this->data);
    }
    public function generateBukuDipinjam()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-request-peminjam.pdf";
        $this->data['dipinjam'] = $this->Peminjaman_model->getPinjam('dipinjam');
        $this->data['dipinjamBypetugas'] = $this->Peminjaman_model->getPinjams('dipinjam');
        $this->pdf->load_view('laporan/dipinjam', $this->data);
    }
    public function generateBukuDikembalikan()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-request-peminjam.pdf";
        $this->data['dikembalikan'] = $this->Peminjaman_model->getPinjamAll('dikembalikan');
        $this->pdf->load_view('laporan/dikembalikan', $this->data);
    }
    public function generateBukuLewatWaktuTenggang()
    {
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan-request-peminjam.pdf";
        $this->data['lewatWaktuTenggang'] = $this->Peminjaman_model->getPinjam('lewatWaktuTenggang');
        $this->pdf->load_view('laporan/lewatwaktutenggang', $this->data);
    }
}
