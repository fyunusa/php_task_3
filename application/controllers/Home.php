
<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(APPPATH . 'controllers/Airports.php');
require_once(APPPATH . 'controllers/Analytic.php');
// require_once(APPPATH . 'controllers/Coin.php');
require_once(APPPATH . 'controllers/Image.php');
require_once(APPPATH . 'controllers/Reddit.php');
require_once(APPPATH . 'controllers/Time.php');
require_once(APPPATH . 'controllers/Weather.php');


class Home extends CI_Controller
{
    public function Index()
    {
        $time_control = new Time;
        $click_control = new Analytic;
        $temperature_control = new Weather;
        $reddit_control = new Reddit;
        // $coin_control = new Coin;
        $image_control = new Image;


        if ($this->input->post('code')) {
            return $this->verify2fa();
        }

        if ($this->input->post('upload') != NULL) {
            $result = $image_control->index($this->input->post('upload'));
            $itm = ['img_upload_status' => $result['img_upload_status']];
            $itm = ['last_image' => $result['last_image']];
        }



        $itm = [
            'time' => $time_control->current_time(),
            'clicks' => $click_control->index()['count'],
            'weather_temperature' => $temperature_control->current_weather()['temperature'],
            'weather_condition' => $temperature_control->current_weather()['condition'],
            'img' => $temperature_control->current_weather()['img'],
            'reddit_post' => $reddit_control->reddit_data()['posts'],
            'last_image' => $image_control->last_img(),
        ];

        // $this->load->view('home', $data);
        $this->load->view('Main/home', $itm);
    }

    public function verify2fa()
    {
        $code = $this->input->post('code');

        //verify the code with the one stored in the database or the one generated via the library
        if ($code == 'UmarF@123456') {
            $response = array('success' => true);
        } else {
            $response = array('success' => false);
        }
        echo json_encode($response);
    }

    // public function dashboard()
    // {
    //     // Check if 2FA is verified, if not, show modal
    //     if (!$this->session->userdata('2fa_verified')) {
    //         $this->session->set_flashdata('2fa_required', true);
    //         redirect('home');
    //     }
    //     // If 2FA is verified, show dashboard
    //     $this->load;
    // }
}
