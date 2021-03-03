<?php
class Petugas extends CI_Controller
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
        $this->data['title'] = "Atur Petugas";
        $this->data['petugas'] = $this->Petugas_model->get();
        $this->load->view('template/admin/header', $this->data);
        $this->load->view('admin/petugas/index', $this->data);
        $this->load->view('template/admin/footer');
    }



    public function register()
    {
        $this->data['title'] = "register petugas";
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_petugas',
                'nama petugas',
                'required',
                ['required' => 'nama petugas wajib di isi']
            );
            $this->form_validation->set_rules(
                'email',
                'Email',
                'required|valid_email|is_unique[tb_petugas.email]',
                [
                    'required' => 'email wajib di isi',
                    'valid_email' => 'email yang anda masukan harus valid',
                    'is_unique' => 'email yang anda masukan sudah ada',
                ]
            );
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required|is_unique[tb_petugas.username]',
                [
                    'required' => 'username wajib di isi',
                    'is_unique' => "username yang anda masukan sudah ada"
                ]
            );
            $this->form_validation->set_rules(
                'password',
                'Password',
                'required',
                [
                    'required' => "password wajib di isi",
                ]
            );
            $this->form_validation->set_rules(
                'passconf',
                'Password Konfirmasi',
                'required|matches[password]',
                [
                    'required' => "password konfirmasi wajib di isi",
                    'matches' => "password konfirmasi harus sama dengan password",
                ]
            );
            if ($this->form_validation->run() != false) {
                $this->data = [
                    'nama_petugas' => $this->input->post('nama_petugas', true),
                    'email' => $this->input->post('email', true),
                    'username' => $this->input->post('username', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    'id_level' => 3
                ];

                $this->Petugas_model->register($this->data);

                $this->session->set_flashdata('message', 'anda berhasil mendaftarkan petugas');
                redirect('dashboard/admin/petugas/');
            } else {

                $this->load->view('template/admin/header', $this->data);
                $this->load->view('admin/petugas/register', $this->data);
                $this->load->view('template/admin/footer');
            }
        } else {

            $this->load->view('template/admin/header', $this->data);
            $this->load->view('admin/petugas/register', $this->data);
            $this->load->view('template/admin/footer');
        }
    }
    public function delete($id)
    {
        $this->Petugas_model->delete($id);
        $this->session->set_flashdata('message', 'Data berhasil di hapus');
        redirect('dashboard/admin/petugas/');
    }
}
