<?php
class Messages extends MX_Controller
{
     function __construct(){
        parent:: __construct();
        $this->load->model("messages_model");
        $this->load->model("site/site_model");
       
      
     }

    public function index()
    {
        
               

        $v_data = array("all_messages" => $this->messages_model->get_message_info(),
        );
                

        $data = array(
            "title" => "ecommerce",
            "content" =>$this->load->view("friends/all_messages", $v_data, TRUE)
        );
        $this->load->view("site/layouts/layout", $data);

       
        
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