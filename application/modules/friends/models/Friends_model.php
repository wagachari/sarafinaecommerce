<?php
Class Friends_model extends CI_Model{
   public function add_friend($friend_image){
$data=array(
    "friend_name"=>$this->input->post("first_name"),
    "friend_age"=>$this->input->post("age"),
    "friend_gender"=>$this->input->post("gender"),
    "friend_hobby"=>$this->input->post("hobby"),
    "friend_phone"=>$this->input->post("phone"),
    //"friend_image"=>$this->input->post("userfile"),
    "friend_image"=>$friend_image,
);
//var_dump($data);die();
$this->db->insert("friend",$data);
   } 
   public function get_friend(){
       $this->db->order_by("created","DESC");
       return $this->db->get('friend');
   }
   public function get_single($friend_id){
    $this->db->where("friend_id",$friend_id);
    return $this->db->get("friend");
   }
   public function get_results($search_term='default')
{
// Use the Active Record class for safer queries.
$this->db->select('*');
$this->db->from('friend');
$this->db->like('friend_name',$search_term);
 
// Execute the query.
$query = $this->db->get();
 
// Return the results.
return $query->result_array();
}
 

}
?>