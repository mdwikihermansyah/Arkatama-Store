<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mfilter', 'M_heroUnit');
    }

    public function index()
    {
        $data['hero'] = $this->M_heroUnit->getAllHero();
        $data['title'] = 'Aneka Hijau - Admin';
        $data['products'] = $this->Mfilter->getAllProduct();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('admin/index', $data);
    }

    public function setuju($id)
    {
        $data = array(
            'id' => $id,
            'status' => '1'
        );
        $this->M_heroUnit->acc($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Hero berhasil disetujui dan ditampilkan!</div>');
        redirect('admin/index');
    }

    public function tolak($id)
    {
        $data = array(
            'id' => $id,
            'status' => '2'
        );
        $this->M_heroUnit->acc($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hero telah ditolak!</div>');
        redirect('admin/index');
    }
    public function hapus($id)
    {
        $data = array(
            'id' => $id
        );
        $this->M_heroUnit->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Hero telah dihapus!</div>');
        redirect('admin/index');
    }
    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $this->Mfilter->delete($data);
        $this->session->set_flashdata('message_prod', '<div class="alert alert-danger" role="alert">Produk telah dihapus!</div>');
        redirect('admin/index');
    }
    public function setujuprod($id)
    {
        $data = array(
            'id' => $id,
            'product_status' => '1'
        );
        $this->Mfilter->acc($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Produk berhasil disetujui dan ditampilkan!</div>');
        redirect('admin/index');
    }

    public function tolakprod($id)
    {
        $data = array(
            'id' => $id,
            'product_status' => '2'
        );
        $this->Mfilter->acc($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Produk telah ditolak!</div>');
        redirect('admin/index');
    }
}
