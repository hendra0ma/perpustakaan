<?php
class USer extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->autenticated();
        $this->data['user'] = $this->User_model->getUserByUsername($this->session->userdata('username'));
    }
    private function autenticated()
    {
        if (!$this->session->userdata("autentikasi") || $this->session->userdata("id_level") != 1) {
            $this->session->set_flashdata('message', 'Anda harus login terlebih dahulu');
            redirect("auth");
        }
    }
    public function index()
    {
        $this->data['title']  = 'Halaman User';
        $this->load->view("template/user/header", $this->data);
        $this->load->view("user/index", $this->data);
        $this->load->view("template/user/footer");
    }
}
