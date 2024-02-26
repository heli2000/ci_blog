<?php
defined('BASEPATH') or exit('No direct script access allowed');
final class Blog extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['page']      = 'post/index';
        $data['blog_data'] = $this->BlogModel->get_records();
        $this->load->view('hometemplate', $data);
    }

    public function create()
    {
        $data['page'] = 'post/create';
        $data['edit'] = false;
        $this->load->view('hometemplate', $data);
    }

    public function store()
    {
        $data['name']        = $this->input->post('name');
        $data['description'] = $this->input->post('description');
        $this->BlogModel->insert_blog($data);
        redirect(base_url('/blog'));
    }

    public function edit($id)
    {
        $data['page']      = 'post/create';
        $data['edit']      = true;
        $data['edit_data'] = $this->BlogModel->findby_id($id);
        $this->load->view('hometemplate', $data);
    }

    public function update($id)
    {
        $data['name']        = $this->input->post('name');
        $data['description'] = $this->input->post('description');

        $this->BlogModel->update($id, $data);
        redirect(base_url("/blog"));
    }

    public function delete($id)
    {
        $this->BlogModel->delete($id);
        redirect(base_url("/blog"));
    }
}


?>