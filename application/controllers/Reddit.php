
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reddit extends CI_Controller
{
    public function reddit_data()
    {


        $url = 'https://www.reddit.com/r/programming.json';
        $data = json_decode(file_get_contents($url), true);
        $res = array();
        $i = 0;
        foreach ($data['data']['children'] as $post) {
            if ($i % 2 == 0) {
                $res['posts'][] = $post;
            }
            $i++;
        }
        $res['posts'] = array_slice($res['posts'], 0, 4);
        return $res;
        // echo json_encode($res['posts']);
        // foreach ($json->data->children as $post) {
        //     if ($i % 2 == 0) {
        //         $data['posts'][] = $post->data;
        //     }
        //     $i++;
        // }
        // $data['posts'] = array_slice($data['posts'], 0, 4);


        // $this->load->library('curl');

        // $url = 'https://www.reddit.com/r/programming.json';
        // $json = json_decode($this->curl->simple_get($url));
        // $data = array();
        // $i = 0;
        // foreach ($json->data->children as $post) {
        //     if ($i % 2 == 0) {
        //         $data['posts'][] = $post->data;
        //     }
        //     $i++;
        // }
        // $data['posts'] = array_slice($data['posts'], 0, 4);
        // $this->load->view('/Reddit/reddit_view', $data);
    }
}
