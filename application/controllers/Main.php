<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminius/main_model');
    }

    public function index()
    {
        //главная страница со всеми менющками и контентами + pagination
        $config['base_url'] = base_url('main/index');
        $config['total_rows'] = $this->main_model->countContent();
        $config['per_page'] = 5;
        $config['first_link'] = 'First';
        $config['uri_segment'] = 3;
        //крастототень
        $config['next_link'] = false;
        $config['prev_link'] = false;
        $config['full_tag_open'] = '<ul class="pager">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li class="previous">';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="next">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['categorai'] = $this->main_model->getCategoria();
        $data['menu'] = $this->main_model->getMenu();
        $data['content'] = $this->main_model->getContent($config['per_page'],$page);
        $data['links'] = $this->pagination->create_links();

        $this->load->view('front/header', $data);
        $this->load->view('front/main', $data);
        $this->load->view('front/footer');

    }


public function articl($url = NULL)
{
    //выборка конкретного контета по заданому url
    //для одиночного показа контетна
    $url = $this->uri->segment(3);
    if (isset($url)) {
        $data['categorai'] = $this->main_model->getCategoria();
        $data['menu'] = $this->main_model->getMenu();
        $data['articl'] = $this->main_model->getContentByUrl($url);

        $this->load->view('front/header', $data);
        $this->load->view('front/content_view', $data);
        $this->load->view('front/footer');

    } else {
        $this->index();
    }
}

    public function category($url = NULL){
        $url = $this->uri->segment(3);
        if(isset($url)){
            $data['cfm'] = $this->main_model->getContentByMenuUrl($url);
            $data['categorai'] = $this->main_model->getCategoria();
            $data['menu'] = $this->main_model->getMenu();
            $this->load->view('front/header',$data);
            $this->load->view('front/main',$data);
            $this->load->view('front/footer',$data);

        } else {
            $this->index();
        }
    }
    public function item($url = NULL){
        $url = $this->uri->segment(3);
        if(isset($url)){
            $data['item'] = $this->main_model->getContentByCategoryUrl($url);
            $data['categorai'] = $this->main_model->getCategoria();
            $data['menu'] = $this->main_model->getMenu();
            $this->load->view('front/header',$data);
            $this->load->view('front/main',$data);
            $this->load->view('front/footer',$data);

        } else {
            $this->index();
        }
    }

}
