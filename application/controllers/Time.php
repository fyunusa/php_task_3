<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Time extends CI_Controller
{
    public function current_time()
    {
        date_default_timezone_set('UTC');
        $utc_time = time();
        // echo $utc_time;
        // $utc_time = date('h:i:s', time());

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

        // echo $utc_time . "---";
        // echo $london_time;
        $data = [
            'utc_time' => $utc_time,
            'london_time' => $london_time,
            'est_time' => $est_time,
            'pakistan_time' => $pakistan_time,
            'nigeria_time' => $nigeria_time,
        ];
        return $data;
        // echo json_encode($data);
    }
}
