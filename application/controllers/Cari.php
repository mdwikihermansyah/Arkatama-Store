<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cari extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mcari');
    }

    public function index()
    {
        redirect('Cari/loadRecord');
    }

    public function loadRecord()
    {
        $search_text = "";
        if ($this->input->post('submit') != NULL) {
            $search_text = $this->input->post('search');
            $this->session->set_userdata(array("search" => $search_text));
        } else {
            if ($this->session->userdata('search') != NULL) {
                $search_text = $this->session->userdata('search');
            }
        }

        // Get records
        $users_record = $this->Mcari->getData($search_text);

        // Pagination Configuration
        $config['base_url'] = base_url() . 'index.php/User/loadRecord';

        // Initialize
        $data['result'] = $users_record;
        $data['search'] = $search_text;

        // Load view
        $this->load->view('pages/cari', $data);
    }
}
