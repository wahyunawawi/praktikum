<?php
class User_model extends CI_Model
{
    protected $primary = 'id';
    protected $_table = 'user';

    public function getAll()
    {
        return $this->db->where('is_active', 1)->get($this->_table)->result();
    }


    public function save()
    {
        $password = $this->input->post('password');

        // Memeriksa apakah password tidak kosong
        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = null;
        }

        $data = array(
            'nik' => htmlspecialchars($this->input->post('nik'), true),
            'username' => htmlspecialchars($this->input->post('username'), true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email'), true),
            'full_name' => htmlspecialchars($this->input->post('full_name'), true),
            'phone' => htmlspecialchars($this->input->post('phone'), true),
            'role' => htmlspecialchars($this->input->post('role'), true),
            'is_active' => 1,
        );

        return $this->db->insert($this->_table, $data);
    }

    public function getById($id)
    {
        return $this->db->where($this->primary, $id)->get($this->_table)->row();
    }

    public function editData()
    {
        $id = $this->input->post('id');
        $password = $this->input->post('password');


        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = null;
        }

        $data = array(
            'username' => htmlspecialchars($this->input->post('username'), true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'email' => htmlspecialchars($this->input->post('email'), true),
            'full_name' => htmlspecialchars($this->input->post('full_name'), true),
            'phone' => htmlspecialchars($this->input->post('phone'), true),
            'role' => htmlspecialchars($this->input->post('role'), true),
            'is_active' => 1,
        );

        return $this->db->where($this->primary, $id)->update($this->_table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete($this->_table);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata("success", "Data user Berhasil Dihapus");
        }
    }
}



