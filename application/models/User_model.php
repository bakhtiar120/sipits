<?php

class User_model extends CI_Model
{
    // private $_table = "user";

    function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', true);
    }

    public function menu()
    {
        $query = $this->db->query("select * from user_menu");
        return $query->result();
    }

    public function doLogin()
    {
        $post = $this->input->post();

        // cari user berdasarkan email dan username
        // var_dump($post['username']);
        $this->db->where('username', $post['username']); // Produces: WHERE name = 'Joe'
        $user = $this->db->get('user')->row();
        // var_dump($user);
        // jika user terdaftar
        if ($user) {
            // periksa password-nya
            $isPasswordTrue = password_verify($post['password'], $user->password);


            // jika password benar dan dia admin
            if ($isPasswordTrue) {
                // login sukses yay!
                $this->session->set_userdata('id_user', $user->id_user);
                $this->session->set_userdata('user_level', $user->user_level);
                $this->session->set_userdata(['user_logged' => $user]);
                // $this->_updateLastLogin($user->user_id);
                return true;
            }
        }

        // login gagal
        return false;
    }

    public function isNotLogin()
    {
        return $this->session->userdata('user_logged') === null;
    }

    private function _updateLastLogin($user_id)
    {
        $sql = "UPDATE {$this->_table} SET last_login=now() WHERE user_id={$user_id}";
        $this->db->query($sql);
    }

    function user()
    {
        $query = $this->db->query("select * from user");
        return $query->result();
    }

    function users_all($id)
    {
        $query = $this->db->query("select * from user where id_user = '$id'");
        return $query->row();
    }

    function role()
    {
        $query = $this->db->query("select * from user_akses");
        return $query->result();
    }

    function simpanUser()
    {
        $username = $this->input->post("username");
        $password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
        $hash = $this->input->post("password");
        $insert = $this->db->query("insert into user values (null,'$username','$password','$hash')");
        if ($insert) {
            $id_user = $this->db->query("select id_user from user order by id_user desc limit 0,1")->row()->id_user;
            foreach ($this->input->post("id_menu") as $key) {
                $kode_menu = $this->db->query("select kode_menu from user_menu where id = '$key'")->row()->kode_menu;
                $create = 0;
                if ($this->input->post("create" . $key) == 1) {
                    $create = $this->input->post("create" . $key);
                }
                $read = 0;
                if ($this->input->post("read" . $key) == 1) {
                    $read = $this->input->post("read" . $key);
                }
                $update = 0;
                if ($this->input->post("update" . $key) == 1) {
                    $update = $this->input->post("update" . $key);
                }
                $delete = 0;
                if ($this->input->post("delete" . $key) == 1) {
                    $delete = $this->input->post("delete" . $key);
                }
                if ($create != 0 || $read != 0 || $update != 0 || $delete != 0) {
                    $query = $this->db->query("insert into user_akses values (null,'$id_user','$kode_menu','$create','$read','$update','$delete')");
                }
            }
            return 1;
        } else {
            return 0;
        }
    }

    function simpanEdit()
    {
        $username = $this->input->post("username");
        $id_user = $this->input->post("id_user");
        $password = password_hash($this->input->post("password"), PASSWORD_DEFAULT);
        $hash = $this->input->post("password");
        $insert = $this->db->query("update user set username = '$username', password = '$password', hash = '$hash' where id_user = '$id_user'");
        if ($insert) {
            $hapus = $this->db->query("delete from user_akses where id_user = '$id_user'");
            foreach ($this->input->post("id_menu") as $key) {
                $kode_menu = $this->db->query("select kode_menu from user_menu where id = '$key'")->row()->kode_menu;
                $create = 0;
                if ($this->input->post("create" . $key) == 1) {
                    $create = $this->input->post("create" . $key);
                }
                $read = 0;
                if ($this->input->post("read" . $key) == 1) {
                    $read = $this->input->post("read" . $key);
                }
                $update = 0;
                if ($this->input->post("update" . $key) == 1) {
                    $update = $this->input->post("update" . $key);
                }
                $delete = 0;
                if ($this->input->post("delete" . $key) == 1) {
                    $delete = $this->input->post("delete" . $key);
                }
                if ($create != 0 || $read != 0 || $update != 0 || $delete != 0) {
                    $query = $this->db->query("insert into user_akses values (null,'$id_user','$kode_menu','$create','$read','$update','$delete')");
                }
            }
            return 1;
        } else {
            return 0;
        }
    }

    function cekRole($id_user, $kode_menu, $role)
    {
        $query = $this->db->query("select $role from user_akses where id_user = '$id_user' and kode_menu = '$kode_menu'");
        if (!empty($query->row())) {
            return $query->row()->$role;
        } else {
            return "";
        }
    }

    function cek_akses($id_user)
    {
        $sql = "SELECT COUNT(*) AS hasil FROM user_akses WHERE user_akses.id_user= '$id_user'";
        $hasil = $this->db->query($sql)->row()->hasil;

        return $hasil;
    }

    function get_parent_menu($child_menu)
    {
        $sql = 'SELECT `user_menu`.`kode_menu` FROM user_menu WHERE `user_menu`.`kode_menu`="' . $child_menu . '"';
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $hasil = $query->row()->kode_menu;
        } else {
            $hasil = 'KOSONG';
        }
        return $hasil;
    }

    function get_menu_detail($kode_menu)
    {
        $sql = 'SELECT `user_menu`.* FROM user_menu WHERE `user_menu`.`kode_menu`="' . $kode_menu . '" LIMIT 1';
        return $this->db->query($sql);
    }

    function get_menu($kode_menu, $id_user)
    {
        $sql = 'SELECT user_menu.* FROM `user_akses` 
            INNER JOIN `user_menu` ON (`user_akses`.`kode_menu` = `user_menu`.`kode_menu`) WHERE user_akses.`id_user`="' . $id_user . '" 
            ORDER BY user_menu.`id` ASC';
        $result = $this->db->query($sql);
        $parent_kode_menu = $this->get_parent_menu($kode_menu);

        $menu = '';

        if ($result->num_rows() > 0) {
            foreach ($result->result() as $temp) {
                $parent_active = '';
                if (empty($temp->parent)) {
                    $parent = $this->get_menu_detail($temp->kode_menu)->row();

                    if ($parent->kode_menu == $parent_kode_menu) {
                        $parent_active = ' active ';
                    }
                } else {
                    $parent = $this->get_menu_detail($temp->parent)->row();
                    if ($parent->kode_menu == $parent_kode_menu) {
                        $parent_active = ' active ';
                    }
                }

                $sql_child = 'SELECT user_menu.* FROM `user_akses` 
                    INNER JOIN `user_menu` ON (`user_akses`.`kode_menu` = `user_menu`.`kode_menu`) WHERE user_akses.`id_user`="' . $id_user . '" 
                    AND user_menu.`tipe`=1 AND user_menu.parent="' . $parent->kode_menu . '" ORDER BY user_menu.`urutan` ASC';
                $result_child = $this->db->query($sql_child);

                $menu_child = '';
                $menu_child_count = 0;
                if ($result_child->num_rows() > 0) {
                    $menu_child = $menu_child . '<ul class="nav-item has-treeview ">';
                    foreach ($result_child->result() as $child) {
                        $child_active = '';
                        if ($kode_menu == $child->kode_menu) {
                            $child_active = 'active';
                        }
                        $menu_child = $menu_child . '
                            <li class="' . $child_active . '"><a href="' . site_url() . '' . $child->url . '"><i class="fa fa-circle-o"></i> ' . $child->nama_menu . '</a></li>
                        ';

                        $menu_child_count++;
                    }
                    $menu_child = $menu_child . '</ul>';
                }

                $menu = $menu . '
                    <li class="nav-item ">
                        <a href="' . site_url() . '' . $parent->url . '" class="nav-link ' . $parent_active . '"><i class="' . $parent->icon . '"></i><p>' . $parent->nama_menu . '</p>';
                if ($menu_child_count > 0) {
                    $menu = $menu . '<i class="fa fa-angle-left pull-right"></i>';
                }

                $menu = $menu . '</a>';

                $menu = $menu . '
                    ' . $menu_child;

                $menu = $menu . '</li>';
            }
        }

        return $menu;
    }
}
