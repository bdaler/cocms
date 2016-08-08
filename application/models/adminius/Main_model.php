<?php

/**
 * Created by PhpStorm.
 * User: bdaler
 * Date: 18.04.16
 * Time: 13:54
 */
class Main_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertMenu($data)
    {
        if (isset($data)) {
            //если в $data больше одного элемента то будем считать что  это запись с подменю, инечее это просто меню
            if(isset($data['submenuid'])){
                $arr = array('name' => $data['menu_name'],
                             'parent_id' => $data['submenuid'],
                             'url'  => $data['url']);
                $this->db->insert('menu', $arr);
            } else {
                $arr = array('name' => $data['menu_name'],
                            'url'  => $data['url']);
                $this->db->insert('menu', $arr);

            }
        }
    }

    public function getMenu($limit = NULL, $offset = NULL)
    {
        //выборка пунктов меню
        $this->db->limit($limit, $offset);
        $query = $this->db->get('menu');
        if ($query->num_rows() > 0) {
            $menu = array();
            foreach ($query->result_array() as $row) {
                $menu[] = $row;
            }
            //$this->myfunctions->print_arr($menu);
            return $menu;
        }

    }

    public function countMenu(){
        return $this->db->count_all("menu");
    }

    public function insertCategoria($data)
    {
        if (isset($data)) {
            //если в $data больше одного элемента то будем считать что  это запись с подкатигории, инечее это просто категория
            if (count($data) > 1) {
                $arr = array('name' => $data[0],
                    'parent_id' => $data[1]);
                $this->db->insert('categoria', $arr);
            } else {
                $arr = array('name' => $data[0]);
                $this->db->insert('categoria', $arr);
            }
        }
    }

    public function getCategoria($limit = NULL, $offset = NULL)
    {
        //выборка всех категории
        $this->db->limit($limit, $offset);
        $query = $this->db->get('categoria');
        if ($query->num_rows() > 0) {
            $categoria = array();
            foreach ($query->result_array() as $row) {
                $categoria[] = $row;
            }
            return $categoria;
        }

    }

    public function countCategoria(){
        return $this->db->count_all("categoria");
    }

    public function insertContent($data)
    {
        //добавление контента
        if (isset($data) && is_array($data)) {
            $arr = array('categoria_id' => $data['catid'],
                'menu_id' => $data['menuid'],
                'status' => $data['content_state'],
                'text' => $data['text'],
                'title' => $data['title'],
                'url' => $data['url'],
                'keywords' => $data['keywords'],
                'description' => $data['descr'],
                'author' => $data['author'],
                'added_date' => date("Y-m-d H:i:s"));
            $this->db->insert('content', $arr);
        }
    }

    public function updateContent($data)
    {
        //обновления конкретного контента
        if (isset($data) && is_array($data)) {
            $arr = array('author' => $data['author'],
                'description' => $data['descr'],
                'keywords' => $data['keywords'],
                'url' => $data['url'],
                'title' => $data['title'],
                'text' => $data['content'],
                'status' => $data['content_state'],
                'menu_id' => $data['menuid'],
                'categoria_id' => $data['catid'],
                'added_date' => date("Y-m-d H:i:s"));
            $this->db->where('id', $data['updateid']);
            $this->db->update('content', $arr);
        }
    }

    public function countContent(){
        return $this->db->count_all("content");
    }

    public function getContent($limit = NULL, $offset = NULL)
    {
        //список контента
        $this->db->limit($limit, $offset);
        $query = $this->db->get('content');
        if ($query->num_rows() > 0) {
            $content = array();
            foreach ($query->result_array() as $row) {
                $Content = new Content();
                $Content->setCid($row['id']);
                $Content->setCtitle($row['title']);
                $Content->setCurl($row['url']);
                $Content->setCtext($row['text']);
                $Content->setCmenuid($row['menu_id']);
                $Content->setCcategotyid($row['categoria_id']);
                $Content->setCstatus($row['status']);
                $Content->setCauthor($row['author']);
                $Content->setCkeywords($row['keywords']);
                $Content->setCdescr($row['description']);
                $Content->setCaddeddate($row['added_date']);
                $content[] = $Content;
                unset($Content);
            }
            return $content;
        }
    }

    public function getContentToEdit($id)
    {
        //редактирования контента
        $query = $this->db->get_where('content', array('id' => $id));
//        $data[] = array();
//        $data = $query->result_array();
//        //print_r($data);
//        return ($data);
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data['contentById'] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getContentByUrl($url)
    {
        //одиночный показ контента по юрл
        $query = $this->db->get_where('content', array('url' => $url, 'status' => 1));
        if($query->num_rows() > 0){
            foreach($query->result() as $row){
                $data['onecontent'] = $row;
            }
            return $data;
        }
        return false;
    }

    public function getContentByMenuUrl($menuUrl, $limit = NULL, $offset = NULL){
        // показ контента по menuid
        //выборка контента по заданому урл. По заданному уру берем идшник меню и по менюайди делаем выборку.
        $sql = "select id from menu where url=?";
        $query = $this->db->query($sql, $menuUrl);
        $menuid = '';
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $menuid = $result[0]->id;
        }
        $this->db->limit($limit, $offset);
        $this->db->where('menu_id', $menuid);
        $this->db->where('status', 1);
        $query = $this->db->get('content');
        if ($query->num_rows() > 0) {
            $content = array();
            foreach ($query->result_array() as $row) {
                $Content = new Content();
                $Content->setCid($row['id']);
                $Content->setCtitle($row['title']);
                $Content->setCurl($row['url']);
                $Content->setCtext($row['text']);
                $Content->setCmenuid($row['menu_id']);
                $Content->setCcategotyid($row['categoria_id']);
                $Content->setCstatus($row['status']);
                $Content->setCauthor($row['author']);
                $Content->setCkeywords($row['keywords']);
                $Content->setCdescr($row['description']);
                $Content->setCaddeddate($row['added_date']);
                $content[] = $Content;
                unset($Content);
            }
            return $content;
        }
    }

    public function countContentByMenuUrl($menuUrl){
        //количество контента по заданому урл. По заданному уру берем идшник меню и по менюайди делаем выборку.
        $sql = "select id from menu where url=?";
        $query = $this->db->query($sql, $menuUrl);
        $menuid = '';
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $menuid = $result[0]->id;
        }
        ///echo $menuid;
        $this->db->where('menu_id',$menuid);
        $num_rows = $this->db->count_all_results('content');
        return $num_rows;
    }

    public function getContentByCategoryUrl($menuUrl, $limit = NULL, $offset = NULL){
        // показ контента по menuid
        $sql = "select id from categoria where url=?";
        $query = $this->db->query($sql, $menuUrl);
        $menuid = '';
        if ($query->num_rows() > 0) {
            $result = $query->result();
            $menuid = $result[0]->id;
        }
        $this->db->limit($limit, $offset);
        $this->db->where('categoria_id', $menuid);
        $query = $this->db->get('content');
        if ($query->num_rows() > 0) {
            $content = array();
            foreach ($query->result_array() as $row) {
                $Content = new Content();
                $Content->setCid($row['id']);
                $Content->setCtitle($row['title']);
                $Content->setCurl($row['url']);
                $Content->setCtext($row['text']);
                $Content->setCmenuid($row['menu_id']);
                $Content->setCcategotyid($row['categoria_id']);
                $Content->setCstatus($row['status']);
                $Content->setCauthor($row['author']);
                $Content->setCkeywords($row['keywords']);
                $Content->setCdescr($row['description']);
                $Content->setCaddeddate($row['added_date']);
                $content[] = $Content;
                unset($Content);
            }
            return $content;
        }
    }

    public function doLogin($data)
    {
        //авторизация
        if (isset($data) && is_array($data)) {
            $email = $data['email'];
            $password = $data['password'];

            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $this->db->where('state', '1');
            $query = $this->db->get('users');
            if ($query->num_rows() == 1) {
                $uinfo = array();
                $rows = $query->result_array();
                foreach ($rows as $row) {
                    $uinfo['id'] = $row['id'];
                    $uinfo['email'] = $row['email'];
                    $uinfo['login'] = $row['login'];
                    $uinfo['password'] = $row['password'];
                    $uinfo['state'] = $row['state'];
                }
                //проверка на не выключен ли пользователь 1 включен, 0 выключен
                if ($uinfo['state'] == 1) {
                    $this->session->set_userdata('access', 1);
                    $this->myfunctions->set_uinfo_session($uinfo);
                    // $this->myfunctions->print_arr($uinfo);
                    return $uinfo;
                } else {
                    $uinfo = '<div class="alert alert-danger">invalid username or password</div>';
                    return $uinfo;
                }

            }
        }
    }

    public function getUsers($limit = NULL, $offset = NULL)
    {
        //получение списка всех пользователей
        $this->db->limit($limit, $offset);
        $query = $this->db->get('users');
        if ($query->num_rows() > 0) {
            $users = array();
            foreach ($query->result_array() as $row) {
                $Users = new Users();
                $Users->setUid($row['id']);
                $Users->setUemail($row['email']);
                $Users->setUlogin($row['login']);
                $Users->setUpassword($row['password']);
                if ($row['state'] == 1) {
                    $Users->setUstate('Active');
                } else {
                    $Users->setUstate('Deactivated');
                };
                $users[] = $Users;
                unset($Users);
            }
            return $users;
        }

    }

    public function countUsers(){
        return $this->db->count_all("users");
    }


    public function addUser($data)
    {
        //добавление пользователей
        if (isset($data) && is_array($data)) {
            //$this->myfunctions->print_arr($data);
            $arr = array('email' => $data['email'],
                'login' => $data['login'],
                'password' => $data['password'],
                'passconfirm' => $data['passconfirm'],
                'state' => '1',
                'added_date' => date("Y-m-d H:i:s"));
            $this->db->insert('users', $arr);
        }
    }

    public function editUser($data)
    {
        //edit user profile
        //$this->myfunctions->print_arr($data);
        if (isset($data) && is_array($data)) {
            $arr = array('email' => $data['email'],
                'login' => $data['login'],
                'password' => $data['password'],
                'passconfirm' => $data['passconfirm']);

            $this->db->where('id', $data['uid']);
            $this->db->update('users', $arr);
        }
    }
}