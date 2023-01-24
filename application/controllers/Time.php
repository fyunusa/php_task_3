<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Time extends CI_Controller
{
    public function current_time()
    {
        date_default_timezone_set('UTC');
        $utc_time = time();

        // London
        date_default_timezone_set('Europe/London');
        $london_time = date('H:i:s', $utc_time);

        // EST
        date_default_timezone_set('America/New_York');
        $est_time = date('H:i:s', $utc_time);

        // Nigeria
        date_default_timezone_set('Africa/Lagos');
        $nigeria_time = date('H:i:s', $utc_time);

        // Pakistan
        date_default_timezone_set('Asia/Karachi');
        $pakistan_time = date('H:i:s', $utc_time);

        // $data['utc_time'] =  date('H:i:s', $utc_time);
        // $data['london_time'] =  date('H:i:s', $london_time);
        // $data['est_time'] =  date('H:i:s', $est_time);
        // $data['pakistan_time'] =  date('H:i:s', $pakistan_time);
        // $data['nigeria_time'] =  date('H:i:s', $nigeria_time);

        $data = [
            'utc_time' => date('H:i:s', $utc_time),
            'london_time' => date('H:i:s', $london_time),
            'est_time' => date('H:i:s', $est_time),
            'pakistan_time' => date('H:i:s', $pakistan_time),
            'nigeria_time' => date('H:i:s', $nigeria_time),
        ];


        // $this->load->view('Time/time_view', $data);
        return $data;
    }
}
