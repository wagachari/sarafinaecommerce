<?php
class Hello extends MX_Controller
{
     function __construct(){
        parent:: __construct();
        $this->load->model("friends_model");
        $this->load->model("site/site_model");
       
      
     }

    public function index()
    {
        
       
        $v_data = array("all_friends" =>$this->friends_model->get_friend());
        

        $data = array(
            "title" => "ecommerce",
            "content" =>$this->load->view("friends/hello_world", $v_data, TRUE)
        );
        $this->load->view("site/layouts/layout", $data);
        $this->load->library('pagination');
        $this->load->library('table');
        $this->db->select('friend_name, friend_age,friend_gender,friend_hobby');
        $data['base_url']='http://localhost/ecommerce/friends/hello/index';
        $data['total_rows']=$this->db->get('friend')->num_rows();
        $data['per_page']=10;
        $data['num links']=15;
        $data['records']=$this->db->select('friend_name,friend_age,friend_gender,friend_hobby')->get('friend',$data['per_page'],$this->uri->segment(3));
        $this->pagination->initialize($data);
        echo $this->pagination->create_links();
    }
    public function execute_search()
    {
        // Retrieve the posted search term.
        $search_term = $this->input->post('search');

        // Use a model to retrieve the results.
        ////$v_data['results'] = $this->friends_model->get_results($search_term);
        $v_data = array("results" =>$this->friends_model->get_results($search_term));
        

        $data = array(
            "title" => "ecommerce",
            "content" =>$this->load->view("friends/execute_search", $v_data, TRUE)
        );
        $this->load->view("site/layouts/layout", $data);
        // $v_data = array("results" =>$this->friends_model->get_results());

        // Pass the results to the view.
        ////$this->load->view("friends/execute_search",$v_data);
    }
    public function welcome($friend_id)
        {
            $my_friend = $this->friends_model->get_single($friend_id);
            //form validation
            if ($my_friend->num_rows() > 0) {
                $row = $my_friend->row();
                $friend = $row->friend_name;
                $age = $row->friend_age;
                $gender = $row->friend_gender;
                $hobby = $row->friend_hobby;
                $friend_phone =$row->friend_phone;
                $friend_image = $row->friend_image;
                $validation_errors='';
                $data = array(
                    "friend_name" => $friend,
                    "friend_age" => $age,
                    "friend_gender" => $gender,
                    "friend_hobby" => $hobby,
                    "friend_phone"=>$friend_phone,
                    "friend_image" => $friend_image,
                    "validation_errors" => $validation_errors,
                );
                $this->load->view("site/layouts/includes/navigation");
                $this->load->view("site/layouts/includes/header");
                $this->load->view("friends/welcome_here", $data);
            }
            
            else{

                $this->session->set_flashdata("error_message","could not find".$friend_id."your friend");
                redirect('friends/hello');
            }
            
        }
        public function new_friend()
        {
            //form validation
            $this->form_validation->set_rules("first_name", 'First Name', "required");
            $this->form_validation->set_rules("age", 'Age', "required|numeric");
            $this->form_validation->set_rules("gender", 'Gender', "required");
            $this->form_validation->set_rules("image", 'Image');
            $this->form_validation->set_rules("hobby", 'Hobby', "required");
            $this->form_validation->set_rules("age", 'Age', "required|numeric");
            $this->form_validation->set_rules("phone", 'Phone Number', "required|numeric");
            $validation_errors = '';
            if ($this->form_validation->run()) {
                
                $config['upload_path'] = './uploads/images';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '6000'; // max size in KB
                $config['max_width'] = '20000'; //max resolution width
                $config['max_height'] = '20000';  //max resolution height
                $config['image_library'] = 'gd2';
                // load CI libarary called upload
                $this->load->library('upload', $config);
                // body of if clause will be executed when image uploading is failed
                if(!$this->upload->do_upload()){
                $errors = array('error' => $this->upload->display_errors());
                // This image is uploaded by deafult if the selected image in not uploaded
                $friend_image = 'no_image.png';    
                }
                // body of else clause will be executed when image uploading is succeeded
                else{
                $data = array('upload_data' => $this->upload->data());
                $friend_image = $_FILES['userfile']['name'];  //name must be userfile
                //var_dump($friend_image);die();
                }   
                $this->friends_model->add_friend($friend_image); 
                
                    $this->session->set_flashdata ("success_message", "New item". $friend_id. "has been added");
                    redirect("friends/hello");
                    
                
                // $friend_id =
                // $this->friends_model->add_friend($friend_image);
                // if ($friend_id > 0) {
                //     $this->session->set_flashdata("success_message", " New friend ID". $friend_id ."has been added");
                //     redirect("friends/hello");
                // }
                // else{
                //     $this->session->set_flashdata("error_message","unable to add friend");
                // }
            }

            
            $data["validation_errors"] = validation_errors();
            $this->load->view("site/layouts/includes/navigation");
            $this->load->view("site/layouts/includes/header");
            $this->load->view("friends/add_friends", $data);
            
        }
}


?>