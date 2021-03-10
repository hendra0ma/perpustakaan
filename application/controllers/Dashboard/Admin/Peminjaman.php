<?php 

class Peminjaman extends CI_Controller{
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
        $this->data['title'] = "Request Pinjam";
        $this->data['acc'] = $this->Peminjaman_model->getPinjam();
        // var_dump($this->data['dipinjam']);die;
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/peminjaman/index", $this->data);
        $this->load->view("template/admin/footer");
    }
    public function diPinjam()
    {
        $this->data['title'] = "Admin Pages";
        $this->data['dipinjam'] = $this->Peminjaman_model->getPinjam('dipinjam');
        // var_dump($this->data['dipinjam']);die;
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/peminjaman/dipinjam", $this->data);
        $this->load->view("template/admin/footer");# code...
    }
    public function diKembalikan()
    {
        $this->data['title'] = "Admin Pages";
        $this->data['dikembalikan'] = $this->Peminjaman_model->getPinjam('dikembalikan');
        // var_dump($this->data['dikembalikan']);die;
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/peminjaman/dikembalikan", $this->data);
        $this->load->view("template/admin/footer");# code...
    }
    public function waktuTenggang()
    {
        
        $this->data['title'] = "Admin Pages";
        $this->data['lewatWaktuTenggang'] = $this->Peminjaman_model->getPinjam('lewatWaktuTenggang');
        // var_dump($this->data['lewatWaktuTenggang']);die;
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/peminjaman/lewatWaktuTenggang", $this->data);
        $this->load->view("template/admin/footer");# code...
    }
    public function acc($id,$status)
    {
        $this->data['status'] = [
            'status_peminjaman'=>$status
        ];
        $this->Peminjaman_model->update($id,$this->data['status']);
        redirect('dashboard/admin/peminjaman');
    }
    public function actKembalikan($id,$status)
    {
        $this->data['status'] = [
            'status_peminjaman'=>$status
        ];
        $this->Peminjaman_model->update($id,$this->data['status']);
        redirect('dashboard/admin/peminjaman/dipinjam');
    }
    
}