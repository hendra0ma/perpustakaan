<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $data['buku'] = $this->Buku_models->getBukuWhereStockHabisLimit(8);
        $data['bukuTrending'] = $this->Buku_models->getBukuDescStockHabis(4);
        $data['jenis_buku'] = $this->Jenis_model->getJenisLimit(6);
        $this->load->view('template/header');
        $this->load->view('home/index', $data);
        $this->load->view('template/footer');
    }
    public function gallery()
    {
        $data['buku'] = $this->Buku_models->getBukuWhereStockHabis();
        $data['jenis_buku'] = $this->Jenis_model->getJenisLimit(10);
        $this->load->view('template/header');
        $this->load->view('home/gallery', $data);
        $this->load->view('template/footer');
    }
    public function contactUs()
    {
        $this->load->view('template/header');
        $this->load->view('home/contact');
        $this->load->view('template/footer');
    }
    public function daftarBukuPerJenis($id)
    {
        $data['buku'] = $this->Buku_models->getBukuWhereStockHabisByJenis($id);
        $data['jenis'] = $this->db->get_where('tb_jenis', ['id_jenis', $id])->row();
        $this->load->view('template/header');
        $this->load->view('home/BukuJenis', $data);
        $this->load->view('template/footer');
    }
}
