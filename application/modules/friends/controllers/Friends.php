<?php
class Friends extends MX_Controller
{
     function __construct(){
        parent:: __construct();
        $this->load->model("friends_model");
        $this->load->model("site/site_model");
        $this->load->view("site/layouts/includes/navigation");
        $this->load->view("site/layouts/includes/header");
      
        // $this->load->view("hello_world");
     }

    public function index()
    {
        $v_data["all_friends"]= $this->friends_model->get_friend();
       
        $data=array(
            "title"=>$this->site_model->display_page_title(),
            "content"=>$this->load->view("friends/all_friends",$v_data, TRUE)
        );
       
        //var_dump($data);die();
        $this->load->view("site/layouts/layout",$data);
        //$this->load->view("friends/sidebar");

        
    }
    
}?>