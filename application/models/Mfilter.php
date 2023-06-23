<?php

class Mfilter extends CI_Model
{
    function fetch_filter_type($type)
    {
        $this->db->distinct();
        $this->db->select($type);
        $this->db->from('product');
        $this->db->where('product_status', '1');
        return $this->db->get();
    }

    function make_query($minimum_price, $maximum_price, $kategori)
    {
        $query = " 
        SELECT * FROM product WHERE product_status = '1' ";

        if (isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price)) {
            $query .= "
            AND harga BETWEEN '" . $minimum_price . "' AND '" . $maximum_price . "'
            ";
        }

        if (isset($kategori)) {
            $kategori_filter = implode("','", $kategori);
            $query .= "
            AND kategori IN('" . $kategori_filter . "')
            ";
        }
        return $query;
    }


    function fetch_data($limit, $start, $minimum_price, $maximum_price, $kategori)
    {
        $query = $this->make_query($minimum_price, $maximum_price, $kategori);

        $query .= ' LIMIT ' . $start . ', ' . $limit;

        $data = $this->db->query($query);

        $output = '';
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $prod) {
                $output .= '
                <div class="col my-3">
                    <div class="card h-100">
                    <img src="' . base_url() . 'assets/img/product/' . $prod['image'] . '" class="card-img-top" alt="foto">
                        <div class="card-body">
                            <h5 class="card-title my-0">' . $prod['nama'] . '</h5>
                            <span class="badge bg-success text-dark bg-opacity-25 my-0">' . $prod['kategori'] . '</span>
                            <p class="card-text my-0 text-success text-bold">Rp. ' . $prod['harga'] . ',-</p>
                            <small class="card-text">' . $prod['deskripsi'] . '</small>
                        </div>
                        <div class="card-footer d-grid">
                            <a href="https://wa.me/?6282229337599?text=Saya%20mengunjungi%20halaman%20web%20AnekaHijau.%20Saya%20ingin%20memesan%20tanaman." class="btn btn-success"><i class="fa-brands fa-whatsapp"></i> Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
                ';
            }
        } else {
            $output = '<h3 class="py-4">Mohon maaf, data Tidak ditemukan!</h3>';
        }
        return $output;
    }
    function count_all($minimum_price, $maximum_price, $kategori)
    {
        $query = $this->make_query($minimum_price, $maximum_price, $kategori);
        $data = $this->db->query($query);
        return $data->num_rows();
    }

    public function getAllProduct()
    {
        $this->db->select("*");
        $this->db->from('product');
        $get = $this->db->get();
        return $get->result_array();
    }

    public function delete($data)
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where('id', $data['id']);
        $this->db->delete('product', $data);
    }

    public function getProd($id)
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where('id', $id);
        $get = $this->db->get();
        return $get->row_array();
    }

    public function acc($data)
    {
        $this->db->select("*");
        $this->db->from('product');
        $this->db->where('id', $data['id']);
        $this->db->update('product', $data);
    }
}
