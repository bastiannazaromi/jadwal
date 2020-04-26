<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Login extends CI_Model {

    function cek_login($u, $p)
    {
        // $data        = $this->db->get_where('user',array('email_user' => $u,'password_user' => MD5($p)))->result();
        $user = $this->db->get_where('tbuser', ['email' => $u])->row_array();

        if ($user)
		{
			if(password_verify($p, $user['password']))
				{
					$login        =    array(
                        'is_logged_in'    =>     true,
                        'log_email'    =>    $u,
                        'log_id'        =>    $user['id'],
                        'log_nama'        =>    $user['nama']
                    );
                    if ($login) {
                        $this->session->set_userdata('data_login', $login);
                        $this->session->set_userdata($login);
                        return 'valid';
                    }
				}
				else
				{
					$this->session->set_flashdata('flash-error', 'Password salah');
                    return 'tidak valid';
				}
		}
		else
		{
            $this->session->set_flashdata('flash-error', 'Email tidak terdaftar');
            return 'tidak valid';
        }
    }    

}

/* End of file M_Login.php */
/* Location: ./application/models/M_Login.php */