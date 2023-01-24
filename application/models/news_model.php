<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../core/task_Model.php';


class news_model extends Task3_Model
{
    protected $table = 'news';

    public function getNews($slug = false)
    {
        if ($slug === false) {
            $this->load->database();
            $db_result = $this->db->get($this->table);
            return $db_result->row();
            // return [$db_result, 'boys'];
        }
        $this->load->database();
        $db_result = $this->db->get($this->table);
        return $db_result->row();
    }
}
