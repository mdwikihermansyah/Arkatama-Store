<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

    public function index()
    {
        $this->load->model('M_heroUnit', 'Mfilter');
        $data['title'] = 'Aneka Hijau - Staff';
        $data['hero'] = $this->M_heroUnit->getAllHero();
        $data['products'] = $this->Mfilter->getAllProduct();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('staff/index', $data);
    }

    public function do_upload()
    {
        $config['upload_path']          = FCPATH . '/assets/img/hero/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 1000;
        $config['max_width']            = 2048;
        $config['max_height']           = 1080;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('file_foto')) {
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>');
            redirect('staff');
        } else {
            $data = $this->upload->data();

            $input = $this->input->post();

            $foto['nama'] = $input['nama'];
            $foto['file_foto'] = $data['file_name'];
            $foto['status'] = '0';

            $this->db->insert('hero', $foto);
            if ($this->db->affected_rows() > 0) {
                // echo 'data berhasil disimpan';
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil diajukan!</div>');
                redirect('staff');
            } else {
                // echo 'data gagal disimpan';
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data gagal diajukan, mohon periksa kembali!</div>');
                redirect('staff');
            }
        }
    }

    public function do_upload_prod()
    {
        $config['upload_path']          = FCPATH . '/assets/img/product/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 2048;
        $config['max_height']           = 2048;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('image')) {
            $data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>');
            redirect('staff');
        } else {
            $data = $this->upload->data();

            $input = $this->input->post();

            $prod['nama'] = $input['nama'];
            $prod['kategori'] = $input['kategori'];
            $prod['harga'] = $input['harga'];
            $prod['image'] = $data['file_name'];
            $prod['deskripsi'] = $input['deskripsi'];
            $prod['product_status'] = '0';

            $this->db->insert('product', $prod);
            if ($this->db->affected_rows() > 0) {
                // echo 'data berhasil disimpan';
                $this->session->set_flashdata('message_prod', '<div class="alert alert-success" role="alert">Data berhasil diajukan!</div>');
                redirect('staff');
            } else {
                // echo 'data gagal disimpan';
                $this->session->set_flashdata('message_prod', '<div class="alert alert-danger" role="alert">Data gagal diajukan, mohon periksa kembali!</div>');
                redirect('staff');
            }
        }
    }
    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $this->Mfilter->delete($data);
        $this->session->set_flashdata('message_prod', '<div class="alert alert-danger" role="alert">Produk telah dihapus!</div>');
        redirect('staff/index');
    }

    public function update($id)
    {
        $this->load->model('M_heroUnit', 'Mfilter');
        $title = 'Aneka Hijau - Staff';
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $product = $this->Mfilter->getProd($id);
        $data = array(
            'id' => $id,
            'product' => $product,
            'user' => $user,
            'title' => $title
        );
        $this->load->view('staff/edit', $data);
    }

    public function update_prod()
    {
        if ($_FILES['image'] != "") {
            $config['upload_path']          = FCPATH . '/assets/img/product/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 10000;
            $config['max_width']            = 5000;
            $config['max_height']           = 5000;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('image')) {
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('message_prod', '<div class="alert alert-danger" role="alert">' . $data['error'] . '</div>');
                redirect('staff');
            } else {
                $data = $this->upload->data();

                $input = $this->input->post();
                $prod['nama'] = $input['nama'];
                $prod['kategori'] = $input['kategori'];
                $prod['harga'] = $input['harga'];
                $prod['image'] = $data['file_name'];
                $prod['deskripsi'] = $input['deskripsi'];
                $prod['product_status'] = '0';

                $this->db->where('id', $input['id']);
                $this->db->update('product', $prod);
                if ($this->db->affected_rows() > 0) {
                    // echo 'data berhasil disimpan';
                    $this->session->set_flashdata('message_prod', '<div class="alert alert-success" role="alert">Data berhasil diajukan!</div>');
                    redirect('staff');
                } else {
                    // echo 'data gagal disimpan';
                    $this->session->set_flashdata('message_prod', '<div class="alert alert-danger" role="alert">Data gagal diajukan, mohon periksa kembali!</div>');
                    redirect('staff');
                }
            }
        } else {
            $data = $this->upload->data();

            $input = $this->input->post();
            // $prod['id'] = $input['id'];
            $prod['nama'] = $input['nama'];
            $prod['kategori'] = $input['kategori'];
            $prod['harga'] = $input['harga'];
            $prod['image'] = $data['file_name'];
            $prod['deskripsi'] = $input['deskripsi'];
            $prod['product_status'] = '0';

            $this->db->where('id', $input['id']);
            $this->db->update('product', $prod);
            if ($this->db->affected_rows() > 0) {
                // echo 'data berhasil disimpan';
                $this->session->set_flashdata('message_prod', '<div class="alert alert-success" role="alert">Data berhasil diajukan!</div>');
                redirect('staff');
            } else {
                // echo 'data gagal disimpan';
                $this->session->set_flashdata('message_prod', '<div class="alert alert-danger" role="alert">Data gagal diajukan, mohon periksa kembali!</div>');
                redirect('staff');
            }
        }
    }
}
