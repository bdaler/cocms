<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('adminius/main_model');
    }

    public function index() {
        if($this->myfunctions->islogon()){
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/mainius');
            $this->load->view('adminius/footerius');
        }
    }

    public function menu() {
        if($this->myfunctions->islogon()){
            //добавление пункт меню
            $this->form_validation->set_rules('menu', 'Menu Name', 'required');
            if($this->form_validation->run() === FALSE){
                $data['menu'] = $this->main_model->getMenu();
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/menu',$data);
                $this->load->view('adminius/footerius');
            } else {
                $data['menu_name'] = $this->input->post('menu');
                $data['submenuid'] = $this->input->post('selectsubmenu');
                $data['url'] = $this->input->post('url');
                $this->main_model->insertMenu($data);
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center">Menu  has been added successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/menu');
                $this->load->view('adminius/footerius');
            }
        }
    }

    public function getMenu(){
        if($this->myfunctions->islogon()){
            $data['menu'] = $this->main_model->getMenu();
            //print_r($data);
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/menu',$data);
            $this->load->view('adminius/footerius');
        }
    }

    public function menulist() {
        if($this->myfunctions->islogon()){
            $config['base_url'] = base_url('adminius/main/menulist');
            $config['total_rows'] = $this->main_model->countMenu();
            $config['per_page'] = 5;
            $config['first_link'] = 'First';
            $config['uri_segment'] = 4;
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';

            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['links'] = $this->pagination->create_links();

            $data['menu'] = $this->main_model->getMenu($config['per_page'],$page);
            //print_r($data);
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/menulist',$data);
            $this->load->view('adminius/footerius');
        }
    }

    public function categoria(){
        if($this->myfunctions->islogon()){
            //добавление категория
            $this->form_validation->set_rules('categoria', 'Categoria Name', 'required');
            if($this->form_validation->run() === FALSE){
                $config['base_url'] = base_url('adminius/main/categoria');
                $config['total_rows'] = $this->main_model->countCategoria();
                $config['per_page'] = 5;
                $config['first_link'] = 'First';
                $config['uri_segment'] = 4;
                //config for bootstrap pagination class integration
                $config['full_tag_open'] = '<ul class="pagination">';
                $config['full_tag_close'] = '</ul>';
                $config['first_link'] = false;
                $config['last_link'] = false;
                $config['first_tag_open'] = '<li>';
                $config['first_tag_close'] = '</li>';
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="prev">';
                $config['prev_tag_close'] = '</li>';
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li>';
                $config['next_tag_close'] = '</li>';
                $config['last_tag_open'] = '<li>';
                $config['last_tag_close'] = '</li>';
                $config['cur_tag_open'] = '<li class="active"><a href="#">';
                $config['cur_tag_close'] = '</a></li>';
                $config['num_tag_open'] = '<li>';
                $config['num_tag_close'] = '</li>';
                $this->pagination->initialize($config);
                $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
                $data['links'] = $this->pagination->create_links();

                $data['categoria'] = $this->main_model->getCategoria($config['per_page'],$page);
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/categoria',$data);
                $this->load->view('adminius/footerius');
            } else {
                $categoria_name = $this->input->post('categoria');
                $subcategoriaid = $this->input->post('selectsubcategoria');
                if(isset($subcategoriaid)){
                    $data = array($categoria_name,$subcategoriaid);
                } else {
                    $data = array($categoria_name);
                };
                $this->main_model->insertCategoria($data);
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center">Categoria has been added successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/categoria');
                $this->load->view('adminius/footerius');
            }
        }
    }

    public function categorialist() {
        if($this->myfunctions->islogon()){
            //список категории и пагинация
            $config['base_url'] = base_url('adminius/main/categorialist');
            $config['total_rows'] = $this->main_model->countCategoria();
            $config['per_page'] = 5;
            $config['first_link'] = 'First';
            $config['uri_segment'] = 4;
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['links'] = $this->pagination->create_links();

            $data['categoria'] = $this->main_model->getCategoria($config['per_page'],$page);
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/categorialist',$data);
            $this->load->view('adminius/footerius');
        }
    }

    public function editor($id=null){
        if($this->myfunctions->islogon()){
            //$updateid - hide field для обновления конкретного контента
            $updateid = $this->input->post('update');
            if(isset($updateid) && is_numeric($updateid)){
                //echo $update;
                $this->updateContent($updateid);
            } elseif(isset($id) && is_numeric($id)){ // $id - контента для редактирования, из контентЛиста
                $data['content'] = $this->main_model->getContentToEdit($id);
                $data['menu'] = $this->main_model->getMenu();
                $data['categoria'] = $this->main_model->getCategoria();
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/editorius',$data);
                $this->load->view('adminius/footerius');
            } else {
                //новая запись контента
                $this->form_validation->set_rules('categoriaid', 'Сategory', 'required');
                $this->form_validation->set_rules('menuid', 'Menu', 'required');
                $this->form_validation->set_rules('state', 'State', 'required');
                $this->form_validation->set_rules('ckeditor_full', 'Text', 'required');
                $this->form_validation->set_rules('title', 'Content Title', 'trim|required');
                $this->form_validation->set_rules('url', 'Translated Url', 'trim|required');
                $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
                $this->form_validation->set_rules('descr', 'Description', 'trim|required');

                if ($this->form_validation->run() === FALSE) {
                    //если проверка не прошла
                    $data['menu'] = $this->main_model->getMenu();
                    $data['categoria'] = $this->main_model->getCategoria();
                    $this->load->view('adminius/headerius');
                    $this->load->view('adminius/editorius',$data);
                    $this->load->view('adminius/footerius');
                } else {
                    $data['catid'] = $this->input->post('categoriaid');
                    $data['menuid'] = $this->input->post('menuid');
                    $data['content_state'] = $this->input->post('state');
                    $data['text'] = $this->input->post('ckeditor_full');
                    $data['title'] = $this->input->post('title');
                    $data['url'] = $this->input->post('url');
                    $data['keywords'] = $this->input->post('keywords');
                    $data['descr'] = $this->input->post('descr');
                    $data['author'] = $this->myfunctions->getUinfo('login');
                    $this->main_model->insertContent($data);
                    $this->session->set_flashdata('msg',
                        '<div class="alert alert-success text-center">Your text has been added successfully!</div>');
                    $data['menu'] = $this->main_model->getMenu();
                    $data['categoria'] = $this->main_model->getCategoria();
                    $this->load->view('adminius/headerius');
                    $this->load->view('adminius/editorius',$data);
                    $this->load->view('adminius/footerius');
                }
            }
        }
    }

    public function updateContent($updateid){
        if($this->myfunctions->islogon()){
            //для обновления конкретного контента
            $this->form_validation->set_rules('categoriaid', 'Сategory', 'required');
            $this->form_validation->set_rules('menuid', 'Menu', 'required');
            $this->form_validation->set_rules('state', 'State', 'required');
            $this->form_validation->set_rules('ckeditor_full', 'Text', 'required');
            $this->form_validation->set_rules('title', 'Content Title', 'trim|required');
            $this->form_validation->set_rules('url', 'Translated Url', 'trim|required');
            $this->form_validation->set_rules('keywords', 'Keywords', 'trim|required');
            $this->form_validation->set_rules('descr', 'Description', 'trim|required');
            
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/editorius');
                $this->load->view('adminius/footerius');

            } else {
                $data['catid'] = $this->input->post('categoriaid');
                $data['menuid'] = $this->input->post('menuid');
                $data['content_state'] = $this->input->post('state');
                $data['content'] = $this->input->post('ckeditor_full');
                $data['title'] = $this->input->post('title');
                $data['url'] = $this->input->post('url');
                $data['keywords'] = $this->input->post('keywords');
                $data['descr'] = $this->input->post('descr');
                $data['author'] = $this->myfunctions->getUinfo('login');
                $data['updateid'] = $updateid;

                $this->main_model->updateContent($data);
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center">Your text has been updated successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/editorius');
                $this->load->view('adminius/footerius');
            }
        }
    }

    public function contentList(){
        if($this->myfunctions->islogon()){
            //список контета из базы + pagination
            $config['base_url'] = base_url('adminius/main/contentList');
            $config['total_rows'] = $this->main_model->countContent();
            $config['per_page'] = 5;
            $config['first_link'] = 'First';
            $config['uri_segment'] = 4;
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['links'] = $this->pagination->create_links();

            $data['Content'] = $this->main_model->getContent($config['per_page'],$page);
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/contentlistius', $data);
            $this->load->view('adminius/footerius');
        }
    }

    public function login() {
        //точка входа, авторизация
        $this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required|min_length[3]');
        if ($this->form_validation->run() === FALSE){
            $this->load->view('adminius/login');
        } else {
            $data = array();
            $data['email'] = $this->input->post('email');
            $data['password'] = md5($this->input->post('password'));
            $result['userinfo'] = $this->main_model->doLogin($data);
            if($this->myfunctions->islogon()){
                $this->load->view('adminius/headerius',$result);
                $this->load->view('adminius/mainius');
                $this->load->view('adminius/footerius');
            }
        }
    }

    public function logout(){
        //выход
        $this->session->sess_destroy();
        $this->load->view('adminius/login');

    }

    public function userlist(){
        if($this->myfunctions->islogon()){
            //получение списка всех пользователей + pagination
            $config['base_url'] = base_url('adminius/main/userlist');
            $config['total_rows'] = $this->main_model->countUsers();
            $config['per_page'] = 5;
            $config['first_link'] = 'First';
            $config['uri_segment'] = 4;
            //config for bootstrap pagination class integration
            $config['full_tag_open'] = '<ul class="pagination">';
            $config['full_tag_close'] = '</ul>';
            $config['first_link'] = false;
            $config['last_link'] = false;
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li class="prev">';
            $config['prev_tag_close'] = '</li>';
            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['links'] = $this->pagination->create_links();

            $data['Users'] = $this->main_model->getUsers($config['per_page'],$page);
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/userlist',$data);
            $this->load->view('adminius/footerius');
        }
    }

    public function adduser(){
        if($this->myfunctions->islogon()){
            //добавление пользователей
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('login','Login','trim|required|min_length[3]');
            $this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
            $this->form_validation->set_rules('passconfirm','Confirm Password','trim|required|min_length[8]');
            if($this->form_validation->run() === FALSE){
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/adduser');
                $this->load->view('adminius/footerius');
            } else {
                $data['email'] = $this->input->post('email');
                $data['login'] = $this->input->post('login');
                $data['password'] = md5($this->input->post('password'));
                $data['passconfirm'] = md5($this->input->post('passconfirm'));

                $this->main_model->addUser($data);
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center">User added successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/adduser');
                $this->load->view('adminius/footerius');
            }
        }
    }

        public function userprofile(){
        if($this->myfunctions->islogon()){
            //UserProfile edit
            $this->form_validation->set_rules('email','Email','trim|required|valid_email');
            $this->form_validation->set_rules('login','Login','trim|required|min_length[3]');
            $this->form_validation->set_rules('password','Password','trim|required|min_length[8]');
            $this->form_validation->set_rules('passconfirm','Confirm Password','trim|required|min_length[8]');
            if($this->form_validation->run() === FALSE){
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/userprofile');
                $this->load->view('adminius/footerius');
            } else {
                $data['email'] = $this->input->post('email');
                $data['login'] = $this->input->post('login');
                $data['password'] = md5($this->input->post('password'));
                $data['passconfirm'] = md5($this->input->post('passconfirm'));
                $data['uid'] = $this->input->post('uid');
                
                $this->main_model->editUser($data);
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center">User profile updateed successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/userprofile');
                $this->load->view('adminius/footerius');
            }
        }
    }
}
