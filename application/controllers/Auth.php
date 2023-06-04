<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if ($this->session->userdata('username')) {
            redirect('user');
        }

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth-header');
            $this->load->view('auth/index');
            $this->load->view('template/auth-footer');
        } else {
            $this->_login();
        }
    }
    public function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/auth/login");
        curl_setopt($ch, CURLOPT_POSTFIELDS, "username=$username&password=$password");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        curl_setopt($ch, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        $hasil = curl_exec($ch);
        curl_close($ch);
        $login = json_decode($hasil);

        if ($login->success == TRUE) {
            $data = [
                'username' => $login->data->username,
                'role_id' => $login->data->role_id,
                'token' => $login->token
            ];
            $this->session->set_userdata($data);
            // if ($login->data->role_id == 1) {
            redirect('admin');
            // }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username atau Password salah!</div>');
            redirect('auth');
        }

        // $authorization = "Authorization: Bearer $tampungan->token";

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        // curl_setopt($curl, CURLOPT_URL, "https://katering.eastbluetechnology.com/api/user");
        // curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $authorization));
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name.txt');
        // curl_setopt($curl, CURLOPT_COOKIEFILE, 'cookie-name.txt');
        // $result = curl_exec($curl);
        // curl_close($curl);
        // $verify = json_decode($result);

    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->session->unset_userdata('token');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
			Logout Berhasil !
		  </div>');
        redirect('auth');
    }
}
