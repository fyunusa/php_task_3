<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../core/task_Model.php';


class analytic_model extends Task3_Model
{
    protected $table = 'analytic';

    public function create_table()
    {
        $this->db->query("CREATE TABLE analytic (id INT AUTO_INCREMENT PRIMARY KEY, create_at TIMESTAMP, widget_name VARCHAR(255), browser_type VARCHAR(255))");
        $this->db->query("CREATE TABLE airline (id INT AUTO_INCREMENT PRIMARY KEY, airline_name VARCHAR(255), ident VARCHAR(255), air_type VARCHAR(255))");
        $this->db->query("CREATE TABLE imagehouse (id INT AUTO_INCREMENT PRIMARY KEY, img_name VARCHAR(255))");
    }


    public function log_widget($widget_name, $browser_type)
    {
        $data = array(
            'widget_name' => $widget_name,
            'browser_type' => $browser_type,
            'create_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert($this->table, $data);
    }

    public function count_analytic_rows()
    {
        return $this->db->count_all($this->table);
    }

    public function get_data()
    {
        return $this->db->get($this->table)->result();
    }
}
