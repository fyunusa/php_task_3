<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../core/task_Model.php';


class image_model extends Task3_Model
{
    protected $table = 'imagehouse';

    public function get_latest_image()
    {
        // $this->db->select($this->table);
        // $this->db->order_by('time_upload', 'DESC');
        // $this->db->limit(1);
        // $query = $this->db->get();
        // return $query->row();

        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get();

        return $query->row();
    }
}
