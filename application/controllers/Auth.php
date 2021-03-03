<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/auth/header');
        $this->load->view('auth/index');
        $this->load->view('template/footer');
    }
    public function doLogin()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required',
                ['required' => 'username wajib di isi']
            );
            $this->form_validation->set_rules(
                'password',
                'Password',
                'required',
                ['required' => 'password wajib di isi']
            );
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/auth/header');
                $this->load->view('auth/index');
                $this->load->view('template/footer');
            } else {
                $password = $this->input->post('password');
                $username = $this->input->post('username');
                if ($this->input->post('sebagai') == 'user') {
                    $user = $this->User_model->getUserByUsername($username);
                    if (!empty($user)) {
                        if ($user->id_level == 1) {
                            if (password_verify($password, $user->password)) {
                                $session = array(
                                    'id_user' => $user->id_user,
                                    'username' => $user->username,
                                    'nama' => $user->nama_lengkap,
                                    'autentikasi' => true,
                                    'email' => $user->email,
                                    'email' => $user->email,
                                    'alamat' => $user->alamat,
                                    'id_level' => $user->id_level
                                );
                                $this->session->set_userdata($session);
                                redirect("Home");
                            } else {
                                $this->session->set_flashdata('message', 'Password yang anda masukan salah');
                                redirect('auth/');
                            }
                        } else {
                            $this->session->set_flashdata('message',  'Anda tidak bisa login dengan level ini');
                            redirect('auth/');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Username tidak ditemukan');
                        redirect('auth/');
                    }
                } else if ($this->input->post('sebagai') == 'admin') {
                    $user = $this->Admin_model->getUserByUsername($username);
                    if (!empty($user)) {
                        if ($user->id_level == 2) {
                            if (password_verify($password, $user->password)) {
                                $session = array(
                                    'id_user' => $user->id_admin,
                                    'username' => $user->username,
                                    'autentikasi' => true,
                                    'id_level' => $user->id_level
                                );
                                $this->session->set_userdata($session);
                                redirect('Dashboard/Admin/admin');
                                // var_dump($_SESSION);
                            } else {
                                $this->session->set_flashdata('message',  'Password yang anda masukan salah');
                                redirect('auth/');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Anda tidak bisa login dengan level ini');
                            redirect('auth/');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Username tidak ditemukan');
                        redirect('auth/');
                    }
                } else if ($this->input->post('sebagai') == 'petugas') {

                    $user = $this->Petugas_model->getUserByUsername($username);
                    if (!empty($user)) {
                        if ($user->id_level == 3) {
                            if (password_verify($password, $user->password)) {
                                $session = array(

                                    'id_user' => $user->id_admin,
                                    'username' => $user->username,
                                    'nama' => $user->nama_admin,
                                    'autentikasi' => true,
                                    'email' => $user->email,
                                    'email' => $user->email,
                                    'alamat' => $user->alamat,
                                    'id_level' => $user->id_level
                                );
                                $this->session->set_userdata($session);
                                redirect('dashboard/petugas/petugas');
                            } else {
                                $this->session->set_flashdata('message', 'Password yang anda masukan salah');
                                redirect('auth/');
                            }
                        } else {
                            $this->session->set_flashdata('message', 'Password yang anda masukan salah');
                            redirect('auth/');
                        }
                    } else {
                        $this->session->set_flashdata('message', 'Anda tidak bisa login dengan level ini');
                        redirect('auth/');
                    }
                } else {
                    redirect('auth/');
                }
            }
        } else {
            $this->load->view('template/auth/header');
            $this->load->view('auth/index');
            $this->load->view('template/footer');
        }
    }
    public function register()
    {
        if ($this->input->post()) {
            $this->form_validation->set_rules(
                'nama_lengkap',
                'nama lengkap',
                'required',
                ['required' => 'nama lengkap wajib di isi']
            );
            $this->form_validation->set_rules(
                'username',
                'Username',
                'required|is_unique[tb_user.username]',
                [
                    'required' => 'username wajib di isi',
                    'is_unique' => "username yang anda masukan sudah ada"
                ]
            );
            $this->form_validation->set_rules('telp', 'nomor hp', 'required|numeric');
            $this->form_validation->set_rules(
                'email',
                'Email',
                'required|valid_email|is_unique[tb_user.email]',
                [
                    'required' => 'email wajib di isi',
                    'valid_email' => 'email yang anda masukan harus valid',
                    'is_unique' => 'email yang anda masukan sudah ada',
                ]
            );



            $this->form_validation->set_rules(
                'alamat',
                'alamat',
                'required',
                [
                    'required' => 'alamat wajib di isi'
                ]
            );
            $this->form_validation->set_rules('password', 'Password', 'required');
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
                $data = [
                    'nama_lengkap' => $this->input->post('nama_lengkap', true),
                    'email' => $this->input->post('email', true),
                    'telp' => $this->input->post('telp', true),
                    'username' => $this->input->post('username', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    'id_level' => 1
                ];
                $this->User_model->register($data);
                $this->session->set_flashdata('message', 'anda berhasil mendaftar');
                redirect('auth');
            } else {
                $this->load->view('template/auth/header');
                $this->load->view('auth/register');
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/auth/header');
            $this->load->view('auth/register');
            $this->load->view('template/footer');
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth');
    }
}
