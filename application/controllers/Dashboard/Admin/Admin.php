<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->autenticated();
        $this->data['admin'] = $this->Admin_model->getUserByUsername($this->session->userdata('username'));
    }
    private function autenticated()
    {
        if (!$this->session->userdata("autentikasi") || $this->session->userdata("id_level") != 2) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect("auth");
        }
    }
    public function index()
    {
        $this->data['title'] = "Admin Pages";
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/index", $this->data);
        $this->load->view("template/admin/footer");
    }
}
