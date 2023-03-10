<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weather extends CI_Controller
{
    public function current_weather()
    {
        $api_key = '6d641ac9e21b4590b7a140211232001';
        $city = 'Lagos';
        $units = 'no'; // Celsius
        // $url = 'http://api.weatherapi.com/v1/current.json?key=6d641ac9e21b4590b7a140211232001&q=Lagos&aqi=no';

        $weather_data = json_decode(file_get_contents('https://api.weatherapi.com/v1/current.json?key=' . $api_key . '&q=' . $city . '&units=' . $units), true);
        // echo json_encode($weather_data);

        if ((isset($weather_data['error']))) {
            // Error handling
            echo 'Error retrieving weather data';
        } else {
            $temperature = $weather_data['current']['temp_c'];
            $condition = $weather_data['current']['condition']['text'];



            if (strstr($condition, 'Sun')) {
                $img = 'sunny.png';
            } else if (strstr($condition, 'Rain')) {
                $img = 'rainy.jpg';
            } else if (strstr($condition, 'Snow')) {
                $img = 'snowy.jpg';
            } else if (strstr($condition, 'cloud')) {
                $img = 'cloud.png';
            }

            $data = [
                'temperature' => $temperature,
                'condition' => $condition,
                'img' => $img
            ];
            // echo json_encode($data);
            return $data;
            // $this->load->view('weather/weather_view', $data);
        }
    }
}
