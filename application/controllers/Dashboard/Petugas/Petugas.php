<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
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

        $this->data['title'] = "Halaman Petugas";
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/index", $this->data);
        $this->load->view("template/admin/footer");
    }
}
