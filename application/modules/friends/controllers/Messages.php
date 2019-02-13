<?php
class Messages extends MX_Controller
{
     function __construct(){
        parent:: __construct();
        $this->load->model("messages_model");
        $this->load->model("site/site_model");
        $this->load->view("site/layouts/layout");
      
     }

    public function index()
    {
        // $this->load->library('pagination');
        // $this->load->library('table');
        // $this->db->select('friend_name, friend_age,friend_gender,friend_hobby');
        // $data['base_url']='http://localhost/ecommerce/friends/hello/index';
        // $data['total_rows']=$this->db->get('friend')->num_rows();
        // $data['per_page']=10;
        // $data['num links']=15;
        // $data['records']=$this->db->select('friend_name,friend_age,friend_gender,friend_hobby')->get('friend',$data['per_page'],$this->uri->segment(3));
        // $this->pagination->initialize($data);
        $data = array(
            "all_messages" => $this->messages_model->get_message_info(),
        );
        // $this->load->view("site/layouts/includes/navigation");
        // $this->load->view("site/layouts/includes/header");
       
        
        $this->load->view("friends/all_messages", $data);
        // $this->load->view("friends/sidebar");
        
        
    }
// public function welcome($friend_id)
//     {
//         $my_group = $this->groups_model->get_single($friend_id);
//         //form validation
//         if ($my_group->num_rows() > 0) {
//             $row = $my_group->row();
//             $group = $row->group_name;
//             $validation_errors='';
//             $data = array(
//                 "group_name" => $group_name,
                
//                 "validation_errors" => $validation_errors,
//             );
//             $this->load->view("site/layouts/includes/navigation");
//             $this->load->view("site/layouts/includes/header");
//             $this->load->view("group/welcome_here", $data);
//         }
        
//         else{

//             $this->session->set_flashdata("error_message","could not find you friend");
//             redirect('group/groups');
//         }
        //     }
    public function new_message()
    {
        //form validation
        $this->form_validation->set_rules("message", 'Message', "required");
       
        
        $validation_errors = '';
        if ($this->form_validation->run()) {
          
            $message_id =            
            $this->messages_model->add_message(); 
            if ($message_id > 0) {
                $this->session->set_flashdata("success_message", " New friend ID".  $message_id  ."has been added");
                redirect("friends/messages");
            }
            else{
                $this->session->set_flashdata("error_message","unable to add friend");
            }
        }
        $data["validation_errors"] = validation_errors();
        
        $this->load->view("add_message", $data);
         
    }
}


?>