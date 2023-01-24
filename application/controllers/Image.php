<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
include_once __DIR__ . '/../models/image_model.php';


class Image extends CI_Controller
{
    public function index($post_data)
    {
        // load base_url  
        $this->load->helper('url');

        // Check form submit or not 
        if ($post_data != NULL) {
            $data = array();
            if (!empty($_FILES['file']['name'])) {
                // Set preference 
                $config['upload_path'] = 'uploads/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['max_size'] = '100'; // max_size in kb 
                $config['file_name'] = $_FILES['file']['name'];

                // Load upload library 
                $this->load->library('upload', $config);

                // File upload
                if ($this->upload->do_upload('file')) {
                    // Get data about the file
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $data['response'] = 'successfully uploaded ' . $filename;
                } else {
                    $data['response'] = 'failed';
                }
            } else {
                $data['response'] = 'failed';
            }

            $image_data = array(
                'img_name' => $filename,
                'time_upload' => time()
            );

            // Save image data to database
            $this->db->insert('imagehouse', $image_data);


            $itm_img['img_upload_status'] = 'successful';
            $itm_img['last_image'] = $this->last_img();


            return $data;
        } else {

            $itm_img['img_upload_status'] = 'Error';
            $itm_img['last_image'] = $this->last_img();
            return $itm_img;
        }
    }
    public function last_img()
    {
        $img_model = new image_model;
        $latest_image = $img_model->get_latest_image();
        $itm_img['last_image'] = $latest_image;
        // echo json_encode($latest_image['img_name']);
        // echo json_decode($json, true);
        return $itm_img;
    }
}
