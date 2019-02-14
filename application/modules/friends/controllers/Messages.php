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
    public function welcome()
    {
        
        $my_messages = $this->messages_model->get_message_info();
       
        //form validation
        if ($my_messages->num_rows() > 0) {
            $row = $my_messages->row();
            $message = $row->message;
            //
            $validation_errors='';
              
        $v_data = array("all_messages" => $this->messages_model->get_message_info(),
        "validation_errors" => validation_errors()
        );
        

        $data = array(
        "title" => "New message",
        "content" =>$this->load->view("friends/all_messages", $v_data, TRUE)
        );
        
        $this->load->view("site/layouts/layout", $data);
    //         $data = array(
    //             "message" => $message,
    //             "validation_errors" => $validation_errors,
    //         );
           
    //         $this->load->view("friends/all_messages", $data);
            
    // $data = array(
    //     "title" => "ecommerce",
    //            );
    // $this->load->view("site/layouts/layout", $data);
        }
        
        else{

            $this->session->set_flashdata("No messages found");
            redirect('friends/messages/index');
        }
        
    }
    public function new_message()
    {
        //form validation
        $this->form_validation->set_rules("message", 'Message', "required");
             
        $validation_errors = '';
        if ($this->form_validation->run()) {
          
            $message_id =            
            $this->messages_model->add_message(); 
              
            if ($message_id > 0) {
                $this->session->set_flashdata("success_message". $message_id  ."has been added");
                redirect("friends/messages");
            }
            else{
                $this->session->set_flashdata("error_message","unable to add friend");
            }
        }
     
        
        $v_data = array(
                        "validation_errors" => validation_errors()
        );
                

        $data = array(
            "title" => "New message",
            "content" =>$this->load->view("friends/add_message", $v_data, TRUE)
        );
        $this->load->view("site/layouts/layout", $data);
         
    }
}


?>