<?php
/**
 * Created by PhpStorm.
 * User: bdaler
 * Date: 12.05.16
 * Time: 12:24
 */
class Settings_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     */

    public function siteSettings($data){
        //настройки сайта часть site Settings
        if(isset($data) && is_array($data)){
            $arr = array('site_name' => $data['sitename'],
                        'message' => $data['message'],
                        'site_state' => $data['sitestate']);
            $this->db->update('settings',$arr);
        }
    }

    /**
     * @param $data
     */
   public function seoSettings($data){
       //настройки сайта часть Seo
        if(isset($data) && is_array($data)){
            $arr = array('description' => $data['sitedescription'],
                        'keywords' => $data['sitekeywords'],
                        'copyright' => $data['copyright'],
                        'robots' => $data['robots']);
            $this->db->update('settings',$arr);
        }
    }
}