<?php
class Auth extends CI_Controller
{
    private $data;
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
    public function updateProfile()
    {
        $this->data['title'] = "Edit Profile";
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_lengkap',
                'nama lengkap',
                'required|trim',
                ['required' => 'nama lengkap wajib di isi']
            );
            if ($this->input->post("username") ==  $this->data['user']->username && $this->input->post('username') != '') {
                $this->form_validation->set_rules(
                    'username',
                    'username',
                    'required|trim|min_length[5]',
                    ['required' => 'username wajib di isi']
                );
            } else {
                $this->form_validation->set_rules(
                    'username',
                    'username',
                    'required|trim|min_length[5]|is_unique[tb_user.username]',
                    ['required' => 'username wajib di isi']
                );
            }
            if ($this->input->post("email") ==  $this->data['user']->email && $this->input->post('email') != '') {
                $this->form_validation->set_rules(
                    'email',
                    'email',
                    'required|trim|min_length[5]',
                    ['required' => 'email wajib di isi']
                );
            } else {
                $this->form_validation->set_rules(
                    'email',
                    'email',
                    'required|trim|min_length[5]|is_unique[tb_user.email]',
                    ['required' => 'email wajib di isi']
                );
            }

            $this->form_validation->set_rules(
                'telp',
                'Telephone',
                'required|trim',
                ['required' => 'Nomor Telephone wajib di isi']
            );
            $this->form_validation->set_rules(
                'alamat',
                'alamat',
                'required|trim',
                ['required' => 'alamat wajib di isi']
            );


            if ($this->form_validation->run() != false) {
                $gambar = $_FILES['gambar']['name'];
                if ($gambar == '') {
                    $datas = [
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'telp' => $this->input->post('telp'),
                        'alamat' => $this->input->post('alamat'),
                    ];
                } else {
                    unlink('./assets/dashboard/docs/assets/img/upload/' . $this->data['user']->gambar);
                    $config['upload_path'] = './assets/dashboard/docs/assets/img/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size'] = 2000;
                    $config['file_name'] = "U-" . time() . $_FILES["gambar"]['name'];
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('gambar')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('dashboard/user/auth/updateProfile');
                    }
                    $gambar = $this->upload->data('file_name');
                    $datas = [
                        'nama_lengkap' => $this->input->post('nama_lengkap'),
                        'email' => $this->input->post('email'),
                        'username' => $this->input->post('username'),
                        'telp' => $this->input->post('telp'),
                        'alamat' => $this->input->post('alamat'),
                        'gambar' => $gambar
                    ];
                }

                $this->User_model->update($this->input->post('id'), $datas);
                $this->session->set_flashdata('message', 'anda berhasil Mengedit Profile');

                redirect('dashboard/user/auth/updateProfile');
            } else {

                $this->load->view("template/user/header", $this->data);
                $this->load->view("user/profile/updateProfile", $this->data);
                $this->load->view("template/user/footer");
            }
        } else {

            $this->load->view("template/user/header", $this->data);
            $this->load->view("user/profile/updateProfile", $this->data);
            $this->load->view("template/user/footer");
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
            if (!password_verify($this->input->post('passlatest'), $data['user']->password) && $this->input->post('passlatest') != '') {
                $this->session->set_flashdata('error', 'password anda tidak cocok dengan password anda yang sekarang');
                redirect('Dashboard/user/auth/updatePass');
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
                $this->User_model->update($this->input->post('id'), $data);
                $this->session->set_flashdata('message', 'anda berhasil Mengganti password');

                redirect('Dashboard/user/auth/updatePass');
            } else {

                $this->load->view("template/user/header", $data);
                $this->load->view("user/profile/updatePassword", $data);
                $this->load->view("template/user/footer");
            }
        } else {

            $this->load->view("template/user/header", $data);
            $this->load->view("user/profile/updatePassword", $data);
            $this->load->view("template/user/footer");
        }
    }
}
