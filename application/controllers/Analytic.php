<?php
defined('BASEPATH') or exit('No direct script access allowed');
include_once __DIR__ . '/../models/analytic_model.php';


class Analytic extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('analytic_model');
        $this->load->helper('date');
        $this->load->helper('form');
        set_time_limit(0);
    }


    public function log_widget()
    {
        $model = new analytic_model;
        $browser_type = $this->input->user_agent();
        $widget_name = $this->input->post('widget');

        $model->log_widget($widget_name, $browser_type);
    }

    public function index()
    {
        $model = new analytic_model;
        // $model->create_table();
        $data['count'] = $model->count_analytic_rows();
        return $data;
        // $this->load->view('Analytic/analytic_view', $data);
    }
    public function start_timer()
    {
        while (true) {
            $this->index();
            sleep(60);
        }
    }

    public function export_xml()
    {
        $model = new analytic_model;

        // echo $post_reqst;
        $data = $model->get_data();
        $xml_data = $this->convert_to_xml($data);

        $this->output->set_header("Content-Type: text/xml");
        $this->output->set_header("Content-Disposition: attachment; filename=analytic.xml");
        $this->output->set_output($xml_data);
        return ['export' => $this->output->set_output($xml_data)];
    }

    public function convert_to_xml($data)
    {
        $xml = new SimpleXMLElement('<root/>');
        $this->array_to_xml($data, $xml);

        return $xml->asXML();
    }

    public function array_to_xml($data, &$xml)
    {
        foreach ($data as $key => $value) {

            if (is_array($value) || is_object($value)) {
                if (!is_numeric($key)) {
                    $subnode = $xml->addChild("$key");
                    $this->array_to_xml($value, $subnode);
                } else {
                    $subnode = $xml->addChild("item$key");
                    $this->array_to_xml($value, $subnode);
                }
            } else {
                // echo json_encode($key);
                // echo json_encode($value);
                $xml->addChild($key, $value);
                // $xml->addChild(json_encode($key)"$key", "$value");
            }
        }
    }
}
// $model = new Analytic;
// $model->start_timer();
