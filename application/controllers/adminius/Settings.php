<?php
/**
 * Created by PhpStorm.
 * User: bdaler
 * Date: 12.05.16
 * Time: 12:22
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminius/settings_model');
    }

    public function index(){
        if($this->myfunctions->islogon()){
            $this->load->view('adminius/headerius');
            $this->load->view('adminius/settings');
            $this->load->view('adminius/footerius');
        }

    }
    public function seo() {
        if($this->myfunctions->islogon()){
            //настройки сайта часть SEO
            $this->form_validation->set_rules('sitedescription','Site Description','trim|required');
            $this->form_validation->set_rules('sitekeywords','Site Keywords','trim|required');
            $this->form_validation->set_rules('copyright','Copyright','trim|required');
            $this->form_validation->set_rules('robots','Robots','trim|required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/settings');
                $this->load->view('adminius/footerius');
            }else {
                $data['sitedescription'] = $this->input->post('sitedescription');
                $data['sitekeywords'] = $this->input->post('sitekeywords');
                $data['copyright'] = $this->input->post('copyright');
                $data['robots'] = $this->input->post('robots');
                $data['result'] = $this->settings_model->seoSettings($data);
                //$this->myfunctions->print_arr($data);
                $this->session->set_flashdata('msgSeo',
                    '<div class="alert alert-success text-center">Settings updateed successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/settings');
                $this->load->view('adminius/footerius');

            }
        }
    }

    public function site() {
        if($this->myfunctions->islogon()){
            //настройки сайта часть siteSettings
            $this->form_validation->set_rules('sitename', 'Site Name', 'trim|required');
            $this->form_validation->set_rules('message', 'Message on site off', 'trim|required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/settings');
                $this->load->view('adminius/footerius');
            }else {
                $data['sitename'] = $this->input->post('sitename');
                $data['message'] = $this->input->post('message');
                $data['sitestate'] = $this->input->post('sitestate');
                if(isset($data['sitestate'])&& $data['sitestate'] == 1){
                    $data['sitestate'] = 1;
                }else {
                    $data['sitestate'] = 0;
                }
                $data['result'] = $this->settings_model->siteSettings($data);
                $this->session->set_flashdata('msg',
                    '<div class="alert alert-success text-center">Settings updateed successfully!</div>');
                $this->load->view('adminius/headerius');
                $this->load->view('adminius/settings');
                $this->load->view('adminius/footerius');
            }
        }
    }
}