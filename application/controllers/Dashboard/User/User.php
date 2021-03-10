<?php
class User extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->autenticated();
        $this->data['user'] = $this->User_model->getUserById($this->session->userdata('id_user'));
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
        $this->data['buku'] = $this->Peminjaman_model->getPinjamByUserLimit(null, $this->data['user']->id_user, 10);
        // var_dump($this->data['buku']);
        // die;
        $this->data['jumlah_dipinjam'] = count($this->Peminjaman_model->getPinjamByUser(null, $this->data['user']->id_user));

        $this->load->view("template/user/header", $this->data);
        $this->load->view("user/index", $this->data);
        $this->load->view("template/user/footer");
    }
    public function bukuDipinjam()
    {
        $this->data['buku'] = $this->Peminjaman_model->getPinjamByUser(null, $this->data['user']->id_user);
        $this->data['title']  = 'Buku Yang Dipinjam';
        $this->load->view("template/user/header", $this->data);
        $this->load->view("user/bukuDipinjam", $this->data);
        $this->load->view("template/user/footer");
    }
    public function getBukuById()
    {
        $id = $_GET['id'];
        $get = $this->Buku_models->getById($id);
        echo json_encode($get);
    }
}
