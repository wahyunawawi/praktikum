<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'email', 'required|trim');
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        $this->load->view('login/index');
    }

    public function dologin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ];$userid = $user['id'];
                $this->session->set_userdata($data);
                if ($user['role'] == 'OWNER') {
                    redirect('menu');
                } else if ($user['role'] == 'ADMIN') {
                    redirect('user');
                } else if ($user['role'] == 'KASIR') {
                    redirect('kasir');
                } else {
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error :</b> Password Salah.</div>');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"><b>Error :</b> User tidak terdaftar.</div>');
            redirect('/');
        }}

    private function _updateLastLogin($userid){
        $sql = "UPDATE user SET last_login=now() WHERE id=$userid";
        $this->db->query($sql);
    }

    public function logout()
    {
        //hancurkan semua sesi
        $this->session->sess_destory();
        redirect(site_url('login'));
    }
    public function block()
    {
        $data = array(
            'user'=> infoLogin(),
            'title'=> 'Access Denied!'
        );
        $this->load->view('login/error404', $data);
    }
    
}
