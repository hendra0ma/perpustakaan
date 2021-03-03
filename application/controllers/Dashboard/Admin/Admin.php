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
        $this->data['buku'] = $this->Buku_models->getBukuLimit(10);
        $this->data['jumlah_jenis_buku'] = $this->db->get('tb_jenis')->num_rows();
        $this->data['jumlah_user'] = $this->db->get('tb_user')->num_rows();
        $this->data['jumlah_petugas'] = $this->db->get('tb_petugas')->num_rows();
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/index", $this->data);
        $this->load->view("template/admin/footer");
    }
    public function dataBuku()
    {
        $this->data['title'] = "Pendataan Buku";
        $this->data['buku'] = $this->Buku_models->getBuku();
        $this->load->view("template/admin/header", $this->data);
        $this->load->view("admin/data_buku/index", $this->data);
        $this->load->view("template/admin/footer");
    }
    public function tambahBuku()
    {
        $this->data['title'] = "Pendataan Buku";
        $this->data['jenis_buku'] = $this->db->get('tb_jenis')->result();
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_buku',
                'nama buku',
                'required|is_unique[tb_buku.nama_buku]',
                [
                    'required' => 'nama buku wajib di isi',
                    'is_unique' => "nama buku sudah pernah di masukan"
                ]
            );

            $this->form_validation->set_rules(
                'stock_buku',
                'stock buku',
                'required|numeric',
                [
                    'required' => 'stock buku wajib di isi',
                    'numeric' => "stock buku wajib di isi dengan angka"
                ]
            );
            $this->form_validation->set_rules(
                'deskripsi_buku',
                'deskripsi buku',
                'required',
                ['required' => 'deskripsi buku wajib di isi']
            );
            if ($this->form_validation->run() == FALSE) {
                $this->load->view("template/admin/header", $this->data);
                $this->load->view("admin/data_buku/tambahBuku", $this->data);
                $this->load->view("template/admin/footer");
            } else {

                $config['upload_path'] = './assets/dashboard/docs/assets/img/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2000;
                $config['file_name'] = "buku-" . time() . $_FILES["gambar_buku"]['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar_buku')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('dashboard/admin/admin/tambahBuku');
                    die;
                }
                $gambar = $this->upload->data('file_name');
                $datas = [
                    'nama_buku' => $this->input->post('nama_buku'),
                    'id_jenis' => $this->input->post('id_jenis'),
                    'stock_buku' => $this->input->post('stock_buku'),
                    'deskripsi_buku' => $this->input->post('deskripsi_buku'),
                    'gambar_buku' => $gambar
                ];
                $this->Buku_models->insertBuku($datas);
                redirect('dashboard/admin/admin/dataBuku');
            }
        } else {
            $this->load->view("template/admin/header", $this->data);
            $this->load->view("admin/data_buku/tambahBuku", $this->data);
            $this->load->view("template/admin/footer");
        }
    }
    public function getBukuById()
    {
        $id = $_GET['id'];
        $get = $this->Buku_models->getById($id);
        echo json_encode($get);
    }
    public function deleteBuku($id)
    {
        $get = $this->Buku_models->getById($id);
        unlink('./assets/dashboard/docs/assets/img/upload/' . $get->gambar_buku);
        $this->Buku_models->deleteBuku($id);
        redirect('dashboard/admin/admin/dataBuku');
        die;
    }
}
