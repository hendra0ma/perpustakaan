<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{
    private $data;
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
        $this->data['buku'] = $this->Buku_models->getBukuLimit(10);
        $this->data['jumlah_jenis_buku'] = $this->db->get('tb_jenis')->num_rows();
        $this->data['jumlah_user'] = $this->db->get('tb_user')->num_rows();
        $this->data['jumlah_petugas'] = $this->db->get('tb_petugas')->num_rows();
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/index", $this->data);
        $this->load->view("template/petugas/footer");
    }




    // PENGELOLAAN BUKU


    public function dataBuku()
    {
        $this->data['title'] = "Pendataan Buku";
        $this->data['buku'] = $this->Buku_models->getBuku();
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/data_buku/index", $this->data);
        $this->load->view("template/petugas/footer");
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
                $this->load->view("template/petugas/header", $this->data);
                $this->load->view("petugas/data_buku/tambahBuku", $this->data);
                $this->load->view("template/petugas/footer");
            } else {

                $config['upload_path'] = './assets/dashboard/docs/assets/img/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = 2000;
                $config['file_name'] = "buku-" . time() . $_FILES["gambar_buku"]['name'];
                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('gambar_buku')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('dashboard/petugas/petugas/tambahBuku');
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
                redirect('dashboard/petugas/petugas/dataBuku');
            }
        } else {
            $this->load->view("template/petugas/header", $this->data);
            $this->load->view("petugas/data_buku/tambahBuku", $this->data);
            $this->load->view("template/petugas/footer");
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
        redirect('dashboard/petugas/petugas/dataBuku');
        die;
    }

    private function getJenisNotIn($data)
    {
        $this->db->where_not_in('id_jenis', $data);
        return $this->db->get("tb_jenis")->result();
        // var_dump($this->db->get("tb_jenis")->result());
        // die;
    }

    public function editBuku($id)
    {
        $this->data['title'] = "Edit Buku";
        $this->data['buku'] = $this->Buku_models->getByIdJoin($id);
        $this->data['jenis_buku'] = $this->getJenisNotIn([$this->data['buku']->id_jenis]);
        if ($this->input->post()) {
            if ($this->input->post('nama_buku') ==  $this->data['buku']->nama_buku || $this->input->post('nama_buku') != "") {
            } else {
                $this->form_validation->set_rules(
                    'nama_buku',
                    'nama buku',
                    'required|is_unique[tb_buku.nama_buku]',
                    [
                        'required' => 'nama buku wajib di isi',
                        'is_unique' => "nama buku sudah pernah di masukan"
                    ]
                );
            }


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
                $this->load->view("template/petugas/header", $this->data);
                $this->load->view("petugas/data_buku/editBuku", $this->data);
                $this->load->view("template/petugas/footer");
            } else {
                $gambar = $_FILES['gambar_buku']['name'];
                if ($gambar == '') {
                    $datas = [
                        'nama_buku' => $this->input->post('nama_buku'),
                        'id_jenis' => $this->input->post('id_jenis'),
                        'stock_buku' => $this->input->post('stock_buku'),
                        'deskripsi_buku' => $this->input->post('deskripsi_buku'),
                    ];
                } else {
                    unlink('./assets/dashboard/docs/assets/img/upload/' . $this->data['buku']->gambar_buku);
                    $config['upload_path'] = './assets/dashboard/docs/assets/img/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2000;
                    $config['file_name'] = "buku-" . time() . $_FILES["gambar_buku"]['name'];
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('gambar_buku')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('dashboard/petugas/petugas/editBuku');
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
                }

                $this->Buku_models->updateBuku($id, $datas);
                redirect('dashboard/petugas/petugas/dataBuku');
            }
        } else {
            $this->load->view("template/petugas/header", $this->data);
            $this->load->view("petugas/data_buku/editBuku", $this->data);
            $this->load->view("template/petugas/footer");
        }
    }
    //jenis buku
    public function jenisBuku()
    {
        $this->data['title'] = "Pendataan Buku";
        $this->data['jenis_buku'] = $this->db->get("tb_jenis")->result();
        $this->load->view("template/petugas/header", $this->data);
        $this->load->view("petugas/data_buku/jenisBuku", $this->data);
        $this->load->view("template/petugas/footer");
    }
    public function deleteJenis($id)
    {

        $this->db->where('id_jenis', $id);
        $this->db->delete('tb_jenis');
        redirect('dashboard/petugas/petugas/jenisBuku');
        die;
    }
    public function tambahJenis()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_jenis',
                'nama jenis',
                'required|is_unique[tb_jenis.nama_jenis]',
                [
                    'required' => 'nama jenis buku wajib di isi',
                    'is_unique' => "nama jenis tidak boleh sama dengan yang lain"
                ]
            );
            if ($this->form_validation->run() == FALSE) {
                $this->data['title'] = "Pendataan Buku";
                $this->data['jenis_buku'] = $this->db->get("tb_jenis")->result();
                $this->load->view("template/petugas/header", $this->data);
                $this->load->view("petugas/data_buku/jenisBuku", $this->data);
                $this->load->view("template/petugas/footer");
            } else {
                $datas = [
                    'nama_jenis' => $this->input->post('nama_jenis'),

                ];
                $this->db->insert('tb_jenis', $datas);
                redirect('dashboard/petugas/petugas/jenisBuku');
            }
        } else {
            $this->data['title'] = "Pendataan Buku";
            $this->data['jenis_buku'] = $this->db->get("tb_jenis")->result();
            $this->load->view("template/petugas/header", $this->data);
            $this->load->view("petugas/data_buku/jenisBuku", $this->data);
            $this->load->view("template/petugas/footer");
        }
    }
    public function getJenisPerIdAjax()
    {

        $this->db->where('id_jenis', $this->input->post('ids'));
        $datas = $this->db->get('tb_jenis')->result();
        echo json_encode($datas);
    }
    public function getJenisById($id)
    {
        $this->db->where('id_jenis', $id);
        return $this->db->get('tb_jenis')->row();
    }
    public function updateJenis()
    {
        $this->data['jenis_buku'] = $this->getJenisById($this->input->post('id'));

        if ($this->input->post()) {
            if ($this->input->post('nama_jenis') ==  $this->data['jenis_buku']->nama_jenis && $this->input->post('nama_jenis') != "") {
                $this->session->set_flashdata('error', "Anda tidak mengedit buku ini");
                redirect('dashboard/petugas/petugas/jenisBuku');
                die;
            } else {
                $this->form_validation->set_rules(
                    'nama_jenis',
                    'nama jenis',
                    'required|is_unique[tb_jenis.nama_jenis]',
                    [
                        'required' => 'nama jenis wajib di isi',
                        'is_unique' => "nama jenis sudah ada"
                    ]
                );
            }
            if ($this->form_validation->run() == FALSE) {
                $this->data['title'] = "Pendataan Buku";
                $this->data['jenis_buku'] = $this->db->get("tb_jenis")->result();
                $this->load->view("template/petugas/header", $this->data);
                $this->load->view("petugas/data_buku/jenisBuku", $this->data);
                $this->load->view("template/petugas/footer");
            } else {
                $datas = [
                    'nama_jenis' => $this->input->post('nama_jenis'),

                ];
                $this->db->where("id_jenis", $this->input->post('id'));
                $this->db->update('tb_jenis', $datas);
                redirect('dashboard/petugas/petugas/jenisBuku');
            }
        } else {
            $this->data['title'] = "Pendataan Buku";
            $this->data['jenis_buku'] = $this->db->get("tb_jenis")->result();
            $this->load->view("template/petugas/header", $this->data);
            $this->load->view("petugas/data_buku/jenisBuku", $this->data);
            $this->load->view("template/petugas/footer");
        }
    }
}
