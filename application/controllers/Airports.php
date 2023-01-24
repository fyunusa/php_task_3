<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../models/airport_model.php';


class Airports extends CI_Controller
{
    protected $table = 'airlines';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('airport_model');
    }

    public function search()
    {
        $search_term = $this->input->get('search');

        $this->db->select(array('name', 'longitude_deg', 'latitude_deg'));
        $this->db->from('airports');
        $this->db->like('name', $search_term);

        $query = $this->db->get();
        // $airports = array_column($query->result_array(), 'name');
        $airports = $query->result();

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($airports));
    }
}
