<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Myfunctions
{

    public function getDateYYMMDD($date)
    {
        return strftime("%y-%m-%d", strtotime($date));
    }

    public function print_arr($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }


    public function islogon()
    {
        //проверка залогинин ли пользователь, проверка по сессии
        $CI =& get_instance();
        if ($CI->session->userdata('access') && $CI->session->userdata('access') == 1)
            return TRUE;
        else {
            $CI->load->helper('url');
            redirect('adminius/main/login', 'refresh');
            exit();
        }
    }

    public function set_uinfo_session($data)
    {
        //set инфо по залогининему пользоваетлю в сессиию
        $CI =& get_instance();
        $newsession = array();
        $oldsession = $CI->session->userdata('uinfo');

        foreach ($data as $key => $val) {
            if (isset($data["$key"])) {
                $newsession['uinfo']["$key"] = $data["$key"];
            }
        }

        $CI->session->set_userdata('uinfo', $newsession);
    }

    public function get_uinfo_session()
    {
        //info about logined user, from session
        $CI =& get_instance();
        return $CI->session->userdata('uinfo');
    }

    public function getUinfo($data)
    {
        //get User info by data
        $CI =& get_instance();
        $uinfo = $CI->session->userdata('uinfo');
        $value = ' - ';
        switch ($data) {
            case 'email':
                $value = $uinfo['uinfo']['email'];
                break;
            case 'login':
                $value = $uinfo['uinfo']['login'];
                break;
            case 'uid':
                $value = $uinfo['uinfo']['id'];
                break;
            default:
                $value;
                break;
        }
        return $value;
    }

    public function getMenuNameById($id)
    {
        //getting menu name by id from db
        $CI =& get_instance();
        if (isset($id) && is_numeric($id) && $id != 0) {
            $sql = "select name from menu where id=?";
            $query = $CI->db->query($sql, $id);
            if ($query->num_rows() > 0) {
                $result = $query->result();
                return ($result[0]->name);
            }
        } else {
            return '-';
        }
    }

    public function getMenuNameByParentId($id)
    {
        //getting menu name by setting parentID from db
        $CI =& get_instance();
        if (isset($id) && is_numeric($id) && $id != 0) {
            $sql = "select name from menu where parent_id=?";
            $query = $CI->db->query($sql, $id);
            if ($query->num_rows() > 0) {
                $result = $query->result();
                return ($result[0]->name);
            }
        } else {
            return '-';
        }
    }

    public function getCategoriaNameById($id)
    {
        //getting category name by id from db
        $CI =& get_instance();
        if (isset($id) && is_numeric($id) && $id != 0) {
            $sql = "select name from categoria where id=?";
            $query = $CI->db->query($sql, $id);
            if ($query->num_rows() > 0) {
                $result = $query->result();
                return ($result[0]->name);
            }
        } else {
            return '-';
        }
    }

    public function getStateName($id)
    {
        //get content state name by id
        if (isset($id) && is_numeric($id)) {
            $name = '-';
            switch ($id) {
                case 1:
                    $name = 'Опубликован';
                    break;
                case 2:
                    $name = 'Не опубликован';
                    break;
                case 3:
                    $name = 'В архив';
                    break;
                case 4:
                    $name = 'В корзину';
                    break;
                default:
                    $name;
                    break;
            }
            return $name;
        }
    }
    public function getContentStateName($id)
    {
        //get content state name by id
        if (isset($id) && is_numeric($id)) {
            $class = '-';
            switch ($id) {
                case 1:
                    $class = '<span class="glyphicon glyphicon-ok-circle"></span>';
                    break;
                case 2:
                    $class = '<span class="glyphicon glyphicon-remove-circle"></span>';
                    break;
                case 3:
                    $class = '<span class="glyphicon glyphicon-briefcase"></span>';
                    break;
                case 4:
                    $class = '<span class="glyphicon glyphicon-trash"></span>';
                    break;
                default:
                    $class;
                    break;
            }
            return $class;
        }
    }

    public function generateMenu($menu)
    {
        //generating main menu to front page
        global $menus;
        global $parentMenuId;
        foreach ($menu as $parent_id) {
            $parentMenuId[] = $parent_id['parent_id'];
        }
        $menus = $menu;
        function generatemenu($parent)
        {
            global $menus;
            global $parentMenuId;
            $has_child = false;
            foreach ($menus as $value) {
                if ($value['parent_id'] == $parent) {
                    if ($has_child === false) {
                        $has_child = true;
                        if ($parent != 0) {
                            echo '<ul class="dropdown-menu" role="menu">';
                        }
                    }
                    if ($value['parent_id'] == 0 && in_array($value['id'], $parentMenuId)) {
                        echo '<ul class="nav navbar-nav navbar-left">';
                        echo '<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">'
                            . $value['name'] . '<b class="caret"></b></a>';
                    } else if ($value['parent_id'] != 0 && in_array($value['id'], $parentMenuId)) {
                        echo '<li class="dropdown-submenu"><a href="' . base_url('main/category/' . $value['url']) . '">' . $value['name'] . '</a>';
                    } else {
                        echo '<li class="dropdown-submenu"><a href="' . base_url('main/category/' . $value['url']) . '">' . $value['name'] . '</a>';
                    }
                    generatemenu($value['id']);
                    echo '</li>';
                }
            }
            if ($has_child === true) echo '</li></ul>';
        }

        generatemenu(0);
    }

    public function generateCategoria($data)
    {
        //generate main catigory to front page
        $n = 0;
        echo '<div class="col-md-6"><ul class="list-unstyled">';
        foreach ($data as $item) {
            echo '<li><a href="'.base_url('main/item/'. $item['url']).'">' . $item['name'] . '</a></li>';
            $n++;
            if ($n % 2 == 0) {
                echo '</ul></div><div class="col-md-6"><ul class="list-unstyled">';
            }
        }
        echo '</ul></div>';
    }

    public function getContent($data)
    {
        //printing setted content to front page
        foreach ($data as $item) {
            echo '<h2>
            <a href="' . base_url('main/articl/' . $item->getCurl()) . '">' . $item->getCTitle() . '</a>
            </h2>
            <p class="lead">
                by <a href="">' . $item->getCauthor() . '</a>
            </p>
            <p>
                <span class="glyphicon glyphicon-time"></span> Posted on ' . $item->getCaddeddate() . '
            </p>
            <hr>
                <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p>' . $item->getCtext() . '</p>
                <a class="btn btn-primary" href="' . base_url('main/articl/' . $item->getCurl()) . '">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>';
        }
    }


    public function getSiteSettings(){
        //get site settings from db
        $CI =& get_instance();
        $query = $CI->db->get('settings');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row) {
                $settings['settings'] = $row;
            }
            return $settings;
        }
    }

    public function getRobotsVal($id)
    {
        //get robots name by id for siteSettings Section
        if (isset($id) && is_numeric($id)) {
            $val = '-';
            switch ($id) {
                case 1:
                    $val = 'Index, Follow';
                    break;
                case 2:
                    $val = 'No index, Follow';
                    break;
                case 3:
                    $val = 'Index, No Follow';
                    break;
                case 4:
                    $val = 'No Index, No Follow';
                    break;
                default:
                    $val;
                    break;
            }
            return $val;
        }
    }

    public function test( $email )
    {
        //тестинг
        $CI =& get_instance();
        $query = $CI->db->select( 'u.id, u.email, u.login' )
            ->from( 'users' . ' u' )
            ->where( 'LOWER( u.email ) =', strtolower( $email ) )
            ->limit(1)
            ->get();

        if( $query->num_rows() == 1 )
            return $query->row();

        return FALSE;
    }

    public function checkSiteState()
    {
        //check site is off or on
        $CI =& get_instance();
        $CI->db->select('site_state');
        $siteState = $CI->db->from('settings')->get();
        if($siteState->num_rows() > 0){
            $row = $siteState->result();
            //state = 1 site is on , state = 0 site is off
            if($row[0]->site_state == 1){
                return FALSE;
            }else{
                return TRUE;
            }
        }
    }
    public function getMessageOffSite(){
        //show message when site is off
        $CI =& get_instance();
        $CI->db->select('message');
        $message = $CI->db->from('settings')->get();
        if($message->num_rows() > 0){
            $row = $message->result();
            return $row[0]->message;
        }
    }
}