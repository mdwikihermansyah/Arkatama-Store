<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mfilter', 'M_heroUnit');
    }

    function index()
    {
        $data['hero'] = $this->M_heroUnit->getHero();
        $data['kategori_data'] = $this->Mfilter->fetch_filter_type('kategori');
        $this->load->view('pages/page', $data);
    }

    function fetch_data()
    {
        sleep(1);
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $kategori = $this->input->post('kategori');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = "#";
        $config["total_rows"] = $this->Mfilter->count_all($minimum_price, $maximum_price, $kategori);
        $config["per_page"] = 20;
        $config["uri_segment"] = 3;
        $config["use_page_numbers"] = TRUE;
        $config["full_tag_open"] = '<ul class="pagination">';
        $config["full_tag_close"] = '</ul>';
        $config["first_tag_open"] = '<li>';
        $config["first_tag_close"] = '</li>';
        $config["last_tag_open"] = '<li>';
        $config["last_tag_close"] = '</li>';
        $config['next_link'] = '&gt;';
        $config["next_tag_open"] = '<li>';
        $config["next_tag_close"] = '</li>';
        $config["prev_link"] = "&lt;";
        $config["prev_tag_open"] = "<li>";
        $config["prev_tag_close"] = "</li>";
        $config["cur_tag_open"] = "<li class='active'><a href='#'>";
        $config["cur_tag_close"] = "</a></li>";
        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";
        $config["num_links"] = 3;
        $this->pagination->initialize($config);
        $page = $this->uri->segment('3');
        $start = ($page - 1) * $config["per_page"];

        $output = array(
            'pagination_link'        =>    $this->pagination->create_links(),
            'product_list'            =>    $this->Mfilter->fetch_data($config["per_page"], $start, $minimum_price, $maximum_price, $kategori)
        );
        echo json_encode($output);
    }
}
