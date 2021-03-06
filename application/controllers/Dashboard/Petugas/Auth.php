<?php
class Auth extends CI_Controller
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
    public function updateProfile()
    {
        $this->data['title'] = "Edit Profile";
        if ($this->input->post()) {


            $this->form_validation->set_rules(
                'nama_admin',
                'nama lengkap',
                'required',
                ['required' => 'nama lengkap wajib di isi']
            );


            if ($this->form_validation->run() != false) {
                $gambar = $_FILES['gambar']['name'];
                if ($gambar == '') {
                    $datas = [
                        'nama_petugas' => $this->input->post('nama_admin'),
                    ];
                } else {
                    unlink('./assets/dashboard/docs/assets/img/upload/' . $this->data['petugas']->gambar);
                    $config['upload_path'] = './assets/dashboard/docs/assets/img/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2000;
                    $config['file_name'] = "P-" . time() . $_FILES["gambar"]['name'];
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('gambar')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('dashboard/petugas/auth/updateProfile');
                    }
                    $gambar = $this->upload->data('file_name');
                    $datas = [
                        'nama_petugas' => $this->input->post('nama_admin'),
                        'gambar' => $gambar
                    ];
                }

                $this->Petugas_model->update($this->input->post('id'), $datas);
                $this->session->set_flashdata('message', 'anda berhasil Mengedit Profile');

                redirect('dashboard/petugas/auth/updateProfile');
            } else {

                $this->load->view("template/petugas/header", $this->data);
                $this->load->view("petugas/profile/updateProfile", $this->data);
                $this->load->view("template/petugas/footer");
            }
        } else {

            $this->load->view("template/petugas/header", $this->data);
            $this->load->view("petugas/profile/updateProfile", $this->data);
            $this->load->view("template/petugas/footer");
        }
    }

    public function updatePass()
    {
        $this->data['title'] = "edit password";
        $this->updatePassword($this->data);
    }

    private function updatePassword($data)
    {



        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'passlatest',
                'Password lama',
                'required',
                ['required' => 'Password lama wajib di isi']
            );
            if (!password_verify($this->input->post('passlatest'), $data['petugas']->password) && $this->input->post('passlatest') != '') {
                $this->session->set_flashdata('error', 'password anda tidak cocok dengan password anda yang sekarang');
                redirect('Dashboard/petugas/auth/updatePass');
                die;
            }

            $this->form_validation->set_rules(
                'password',
                'password',
                'required',
                [
                    'required' => 'Password wajib di isi',
                ]
            );
            $this->form_validation->set_rules(
                'passconf',
                'password Konfirmasi',
                'required|matches[password]',
                [
                    'required' => "password konfirmasi wajib di isi",
                    'matches' => "password konfirmasi harus sama dengan password",
                ]
            );


            if ($this->form_validation->run() != false) {
                $data = [
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),

                ];
                $this->Petugas_model->update($this->input->post('id'), $data);
                $this->session->set_flashdata('message', 'anda berhasil Mengganti password');

                redirect('Dashboard/petugas/auth/updatePass');
            } else {

                $this->load->view("template/petugas/header", $data);
                $this->load->view("petugas/profile/updatePassword", $data);
                $this->load->view("template/petugas/footer");
            }
        } else {

            $this->load->view("template/petugas/header", $data);
            $this->load->view("petugas/profile/updatePassword", $data);
            $this->load->view("template/petugas/footer");
        }
    }
}
