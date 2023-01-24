<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../models/news_model.php';

class News extends CI_Controller
{

    public function index()
    {
        $model = new news_model;
        // $this->load->model('news_model');
        // echo json_encode($model->getNews());
        $data = [
            'news' => [(array)$model->getNews()],
            'title' => 'News archive',
        ];


        $this->load->view('templates/header', $data);
        $this->load->view('news/overview', $data);
        $this->load->view('templates/footer');
    }

    public function view($slug = null)
    {

        $model = new news_model();
        $data['news'] = [$model->getNews($slug)];
        if (empty($data['news'])) {
            throw new Exception('News Page accessing Failed');
        }

        $data['title'] = $data['news']['title'];
        $this->load->view('templates/header', $data);
        $this->load->view('news/view', $data);
        $this->load->view('templates/footer');
    }
}
