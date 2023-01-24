<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function showme($page = 'home')
    {

        if (!is_file(APPPATH . 'views/pages/' . $page . '.php')) {
            throw new Exception('Page accessing Failed');
        }

        $data['title'] = ucfirst($page);

        echo json_encode($this->load->view('templates/header', $data));
        echo json_encode($this->load->view('pages/' . $page, $data));
        echo json_encode($this->load->view('templates/footer', $data));
    }
}
