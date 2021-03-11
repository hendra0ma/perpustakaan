<?php
class Peminjaman extends CI_Controller
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
    public function getBuku($id)
    {
        if ($this->cart->total_items() >= 3) {
            $this->session->set_flashdata('message', 'Anda tidak boleh meminjam lebih dari 3 buku');
        } else {
            $buku = $this->Buku_models->getByIdJoin($id);
            $data = array(
                'id'      => uniqid(),
                'qty'     => 1,
                'price' => 0,
                'name'    => $buku->nama_buku,
                'option' => ['gambar_buku' => $buku->gambar_buku, 'id_buku' => $buku->id_buku]
            );
            $this->cart->insert($data);
            $this->session->set_flashdata('message', 'Berhasil menambahkan buku ke keranjang');
        }
        redirect('home/gallery');
    }
    public function checkout()
    {
        $this->data['title']  = 'Checkout';
        $this->load->view("template/user/header", $this->data);
        $this->load->view("user/checkout", $this->data);
        $this->load->view("template/user/footer");
    }
    public function submitCheckout()
    {
        $insert = [];
        foreach ($this->cart->contents() as $data) {
            array_push($insert, [
                'id_buku' => $data['option']['id_buku'],
                'jumlah_pinjam' => $data['qty'],
                'id_user' => $this->data['user']->id_user,
                'id_petugas' => 0,

            ]);
        }
        $this->cart->destroy();
        $this->db->insert_batch('tb_peminjaman', $insert);
        redirect('dashboard/user/peminjaman/checkout');
    }
}
