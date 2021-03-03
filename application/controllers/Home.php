<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {

        $this->load->view('template/header');
        $this->load->view('home/index');
        $this->load->view('template/footer');
    }
    public function gallery()
    {
        $this->load->view('template/header');
        $this->load->view('home/gallery');
        $this->load->view('template/footer');
    }
    public function contactUs()
    {
        $this->load->view('template/header');
        $this->load->view('home/contact');
        $this->load->view('template/footer');
    }
}
