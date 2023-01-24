<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../core/task_Model.php';


class airport_model extends Task3_Model
{
    protected $table = 'airlines';

    public function insert_db()
    {
        $xml_data = file_get_contents('http://www.openaip.org/data');
        //    parse the XML data:
        $xml = simplexml_load_string($xml_data);

        $this->load->database();

        // try loop through the elements of the XML data and insert them into the database using the CodeIgniter database library:
        foreach ($xml->waypoint as $waypoint) {
            $data = array(
                'ident' => (string) $waypoint->ident,
                'type' => (string) $waypoint->type,
                'name' => (string) $waypoint->name,

            );

            $this->db->insert($this->table, $data);
        }
    }

    public function getAirport($airline)
    {
        $query = $this->db->select('name')->like('name', $airline)->get($this->table);
        echo json_encode($query->result());
    }
}
