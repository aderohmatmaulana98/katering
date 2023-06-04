<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['title'] = 'Dashboard';
        $data['user'] = json_decode($result);

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('template/footer');
    }
    public function produk()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        // var_dump($authorization);
        // die;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['title'] = 'Produk';
        $data['user'] = json_decode($result);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/produk");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result1 = curl_exec($ch);
        curl_close($ch);
        $produk = json_decode($result1);
        $data['produk'] = $produk;

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/paket");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result2 = curl_exec($ch1);
        curl_close($ch1);
        $paket = json_decode($result2);
        $data['paket'] = $paket;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/produk', $data);
        $this->load->view('template/footer');
    }
    public function insert_product()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $cfile = new CURLFile($_FILES['gambar']['tmp_name'], $_FILES['gambar']['type'], $_FILES['gambar']['name']);
        $data = [
            'namaProduk' => $this->input->post('namaProduk'),
            'harga' => $this->input->post('harga'),
            'keterangan' => $this->input->post('keterangan'),
            'idPaket' => $this->input->post('paket'),
            'gambar' => $cfile,
            'stok' => $this->input->post('stok'),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://katering.eastbluetechnology.com/api/produk');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', $authorization));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $result = curl_exec($ch);
        $hasil = json_decode($result);


        if ($hasil->status == 'success') {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Produk berhasil ditambahkan !
          </div>');
            redirect('admin/produk');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan produk !
          </div>');
            redirect('admin/produk');
        }
    }
    public function update_produk()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $id = $this->input->post('id');

        $cfile = new CURLFile($_FILES['gambar']['tmp_name'], $_FILES['gambar']['type'], $_FILES['gambar']['name']);

        $post = [
            'namaProduk' => $this->input->post('namaProduk'),
            'harga' => $this->input->post('harga'),
            'gambar' => $cfile,
            'keterangan' => $this->input->post('keterangan'),
            'idPaket' => $this->input->post('paket'),
            'stok' => $this->input->post('stok'),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/produk/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: multipart/form-data', $authorization));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $result = curl_exec($ch);

        $hasil = json_decode($result);
        if ($hasil->status == 'success') {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data produk berhasil diubah !
          </div>');
            redirect('admin/produk');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah data produk !
          </div>');
            redirect('admin/produk');
        }
    }
    public function delete_product($id)
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/produk/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        curl_close($ch);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data produk berhasil dihapus !
          </div>');
        redirect('admin/produk');
    }
    public function paket()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['title'] = 'Paket';
        $data['user'] = json_decode($result);

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/paket");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result2 = curl_exec($ch1);
        curl_close($ch1);
        $paket = json_decode($result2);
        $data['paket'] = $paket;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/paket', $data);
        $this->load->view('template/footer');
    }
    public function insert_paket()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $post = [
            'namaPaket' => $this->input->post('namaPaket'),
            'harga' => $this->input->post('harga'),
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/paket");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post));
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);

        curl_close($curl);

        $hasil = json_decode($result);

        if ($hasil->status == 'success') {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Paket berhasil ditambahkan !
          </div>');
            redirect('admin/paket');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan paket !
          </div>');
            redirect('admin/paket');
        }
    }
    public function update_paket()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $id = $this->input->post('id');

        $post = [
            'nama_paket' => $this->input->post('namaPaket'),
            'harga' => $this->input->post('harga'),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/paket/$id");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        $result = curl_exec($ch);

        $hasil = json_decode($result);
        if ($hasil->status == 'success') {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data paket berhasil diubah !
          </div>');
            redirect('admin/paket');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah data paket !
          </div>');
            redirect('admin/paket');
        }
    }
    public function delete_paket($id)
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/paket/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        curl_close($ch);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data paket berhasil dihapus !
          </div>');
        redirect('admin/paket');
    }
    public function produk_by_paket($id)
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['title'] = 'Produk by paket';
        $data['user'] = json_decode($result);

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/produk/paket_id/$id");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result2 = curl_exec($ch1);
        curl_close($ch1);
        $produk_by_paket = json_decode($result2);
        $data['produk_by_paket'] = $produk_by_paket->data;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/produk_by_paket', $data);
        $this->load->view('template/footer');
    }
    public function status()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $data['title'] = 'Status';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['user'] = json_decode($result);

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/status");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result2 = curl_exec($ch1);
        curl_close($ch1);
        $paket = json_decode($result2);
        $data['status'] = $paket;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/status', $data);
        $this->load->view('template/footer');
    }
    public function insert_status()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $post = [
            'namaStatus' => $this->input->post('namastatus'),
        ];

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/status");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($post));
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);

        curl_close($curl);

        $hasil = json_decode($result);

        if ($hasil->status == 'success') {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Status berhasil ditambahkan !
          </div>');
            redirect('admin/status');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal menambahkan Status !
          </div>');
            redirect('admin/status');
        }
    }
    public function delete_status($id)
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/status/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        curl_close($ch);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data status berhasil dihapus !
          </div>');
        redirect('admin/status');
    }
    public function update_status()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $id = $this->input->post('id');

        $post = [
            'nama_status' => $this->input->post('nama_status'),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/status/$id");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        $result = curl_exec($ch);

        $hasil = json_decode($result);

        if ($hasil->status == 'success') {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data status berhasil diubah !
          </div>');
            redirect('admin/status');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah data paket !
          </div>');
            redirect('admin/status');
        }
    }
    public function my_profile()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $data['title'] = 'My Profile';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['user'] = json_decode($result);

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view('template/footer');
    }
    public function pemesanan()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $data['title'] = 'Pemesanan';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result = curl_exec($curl);
        curl_close($curl);
        $data['user'] = json_decode($result);

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/pemesanan");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result2 = curl_exec($ch1);
        curl_close($ch1);
        $pemesanan = json_decode($result2);
        $data['pemesanan'] = $pemesanan;

        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch1, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/status");
        curl_setopt($ch1, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch1, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $result2 = curl_exec($ch1);
        curl_close($ch1);
        $status = json_decode($result2);
        $data['status'] = $status;
        // var_dump($data['pemesanan']);
        // die;

        $this->load->view('template/header', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('admin/pemesanan', $data);
        $this->load->view('template/footer');
    }
    public function update_status_pemesanan()
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";
        $id = $this->input->post('id');

        $post = [
            'id_status_pemesanan' => $this->input->post('nama_status'),
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/pemesanan/$id");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post));
        $result = curl_exec($ch);

        $hasil = json_decode($result);
        if ($hasil->status == 'success') {

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Status pemesanan berhasil diubah !
          </div>');
            redirect('admin/pemesanan');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Gagal mengubah status pemesanan !
          </div>');
            redirect('admin/pemesanan');
        }
    }
    public function delete_pemesanan($id)
    {
        $token = $this->session->userdata('token');
        $authorization = "Authorization: Bearer $token";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/pemesanan/$id");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        $result = curl_exec($ch);
        curl_close($ch);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data pemesanan berhasil dihapus !
          </div>');
        redirect('admin/pemesanan');
    }
    
}