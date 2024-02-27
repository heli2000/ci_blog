<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;

class AWSBucket extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->s3 = new S3Client([
            'version' => 'latest',
            'region' => $this->config->item('region'),
            'scheme' => 'http',
            'credentials' => [
                'key' => $this->config->item('accessKeyId'),
                'secret' => $this->config->item('secretAccessKey'),
            ],
        ]);
    }

    public function index()
    {
        $imageList = $this->s3->listObjects(['Bucket' => $this->config->item('bucket')]);

        $data = [
            'awsImage' => $imageList['Contents']
        ];
        $this->load->view('uploadFile', $data);
    }

    public function uploadFile()
    {
        $fileName = $_FILES['userfile']['name'];
        $fileData = file_get_contents($_FILES['userfile']['tmp_name']);

        try {
            if ($fileData !== false) {
                $this->s3->putObject([
                    'Bucket' => $this->config->item('bucket'),
                    'Key' => $fileName,
                    'Body' => $fileData,
                ]);
                $this->session->set_flashdata('success', 'File Uploaded successfully');
            }
        } catch (\Throwable $th) {
            $this->session->set_flashdata('error', $th->getMessage());
        }

        redirect(base_url("/AWSBucket"));

        /**$config['upload_path']          = 'uploads/';
        $config['allowed_types']        = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('upload_form', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
        } */
    }

    public function deleteFile()
    {
        $key = $_GET["delete"];

        try {
            $this->s3->deleteObject([
                "Bucket" => $this->config->item("bucket"),
                "Key" => $key
            ]);
            $this->session->set_flashdata('success', 'File Deleted successfully');
        } catch (\Throwable $th) {
            $this->session->set_flashdata('error', $th->getMessage());
        }

        redirect(base_url("/AWSBucket"));
    }

    public function previewImage()
    {
        $key = $_GET["id"];

        $data = [
            'key' => $key
        ];
        $this->load->view('previewFile', $data);
    }

    public function previewVideo()
    {
        $key = $_GET["id"];
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '   ';
        $allowedReferer = 'http://localhost:8595';
        if (strpos($referer, $allowedReferer) === 0) {
            try {
                $command = $this->s3->getCommand('GetObject', [
                    'Bucket' => $this->config->item('bucket'),
                    'Key' => $key,
                ]);

                $presignedUrl = $this->s3->createPresignedRequest($command, '+15 minutes')->getUri()->__toString();

                $videoContent = file_get_contents($presignedUrl);

                // Encode the binary data as base64
                // $base64Encoded = base64_encode($videoContent);
                $this->output->set_content_type('video/mp4');
                $this->output->set_output($videoContent);
            } catch (\Throwable $th) {
                $this->session->set_flashdata('error', $th->getMessage());
            }
        } else {
            echo 'Forbidden';
            exit;
        }
    }
}
