<?php

require 'vendor/autoload.php';

class AWSBucket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('uploadFile');
    }

    public function uploadFile() {
        $config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('upload_form', $error);
        }
        else
        {
                $data = array('upload_data' => $this->upload->data());

                $this->load->view('upload_success', $data);
        }
    }
}
